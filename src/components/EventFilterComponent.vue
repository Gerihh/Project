<template>
  <div class="q-ma-lg">
    <div class="q-gutter-lg row items-start" >
        <q-input v-model="search" filled clearable type="search" label="Keresés" style="width: 300px;"/>
        <q-select v-model="selectedItem" :options="items" label="Megye" filled style="width: 250px;"/>
        <q-input  v-model.number="model" type="number" filled label="Min. résztvevők" style="width: 150px;"/>
        <q-input v-model="date" type="date" filled label="Dátum"/>
        <q-btn label="Keresés" color="green" style="margin-top: 30px; padding: 10px; width: 150px;"/>
    </div>
  </div>
  <p>keresés: {{ search }}</p>
  <p>megye: {{ selectedItem }}</p>
  <p>résztvevők: {{ model }}</p>
  <p>dátum: {{ date }}</p>
</template>

<script>
export default {
  data() {
    return {
      selectedItem: null,
      items: ['Baranya', 'Bács-Kiskun', 'Békés', 'Borsod-Abaúj-Zemplén', 'Csongrád',
       'Fejér', 'Győr-Moson-Sopron', 'Hajdú-Bihar', 'Heves', 'Jász-Nagykun-Szolnok',
        'Komárom-Esztergom', 'Nógrád', 'Pest', 'Somogy', 'Szabolcs-Szatmár-Bereg',
         'Tolna', 'Vas', 'Veszprém', 'Zala'],
      search: '',
      model: '',
      date: '',
    };
  }
}
</script>


