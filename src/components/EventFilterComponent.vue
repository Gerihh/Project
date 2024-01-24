<template>
  <div class="q-ma-lg">
    <div class="q-gutter-lg row items-start" >
        <q-input v-model="searchTitle" filled clearable type="search" label="Esemény neve" style="width: 300px;"/>
        <q-input v-model="searchCity" clearable label="Város" filled style="width: 250px;"/>
        <q-input v-model.number="model" type="number" filled label="Min. résztvevők" :min="0" style="width: 150px;"/>
        <q-input v-model="date" type="date" filled label="Dátum"/>
        <q-btn @click="searchData" label="Keresés" color="green" style="margin-top: 30px; padding: 10px; width: 150px;"/>
        <q-btn @click="filterReset" label="Szűrők törlése" color="red" style="margin-top: 30px; padding: 10px; width: 150px;"/>
    </div>
  </div>
  <div v-if="filteredData.length > 0" class="q-ma-lg" style="margin-top: 80px;">
    <q-table
        :rows="filteredData"
        :columns="columns"
        row-key="id"
        class="q-mt-md"
      />
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      searchTitle: '',
      searchCity: '',
      model: 0,
      date: '',
      filteredData: [],
      columns: [
        { name: 'title', label: 'Esemény neve', align: 'left', field: 'title', sortable: true, headerStyle: 'font-weight: bold; font-size: 16px;' },
        { name: 'location', label: 'Város', align: 'left', field: 'location', sortable: true, headerStyle: 'font-weight: bold; font-size: 16px;' },
        { name: 'participants', label: 'Résztvevők száma', align: 'left', field: 'participants', sortable: true, headerStyle: 'font-weight: bold; font-size: 16px;' },
        { name: 'date', label: 'Dátum', align: 'left', field: 'date', sortable: true, headerStyle: 'font-weight: bold; font-size: 16px;' },
      ],
    };
  },

  methods: {
    async searchData() {
      try {
        const response = await axios.get('/api/events', {
          params: {
            title: this.searchTitle,
            location: this.searchCity,
            participants: this.model,
            date: this.date,
          },
        });


          this.filteredData = response.data.filter(item => {

            const lowerSearch = this.searchTitle.toLowerCase();
            const lowerCity = this.searchCity.toLowerCase();

            return (
        (item.title.toLowerCase().includes(lowerSearch) == true) &&
        (item.location.toLowerCase().includes(lowerCity) == true) &&
        (item.participants >= parseInt(this.model) == true) &&
        (this.date ? item.date === this.date : true)
      );
          });



      } catch (error) {
        console.error('Hiba a keresés során:', error);
      }
    },
    async filterReset() {
      this.searchTitle = '';
      this.searchCity = '';
      this.model = 0;
      this.date = '';
      this.filteredData = [];
      this.searchData();
    },
  },
};
</script>


