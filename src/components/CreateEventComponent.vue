<template>
  <div class="q-ma-lg">
    <q-btn label="Új esemény létrehozása" color="green" style="padding: 10px; width: 250px; margin-left: 550px;"/>
  </div>

  <div class="absolute-center">
      <q-card square bordered class="q-pa-md shadow-1" style="width: 500px; height: 400px;">
                <q-form class="q-gutter-md">
                  <q-input square filled clearable v-model="title" type="title" label="Cím" />
                  <q-input square filled clearable v-model="description" type="description" label="Leírás" />
                  <q-input square filled clearable v-model="location" type="location" label="Város" />
                  <q-input square filled clearable v-model="date" type="date" label="Dátum" />
                  <q-card-section>
                    <q-btn type="submit" unelevated color="green-7" size="lg" class="full-width" label="Esemény létrehozása" />
                  </q-card-section>
                </q-form>
            </q-card>
    </div>
</template>

<script>

export default {
  name: 'CreateEventComponent',
  data() {
    return {
      title: '',
      description: '',
      location: '',
      date: '',
    };
  },
};
</script>