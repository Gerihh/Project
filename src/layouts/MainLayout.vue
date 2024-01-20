<script>
import useAuth from 'src/composables/useAuth';
import { ref } from 'vue';

export default {
  setup() {
    const auth = useAuth;

    return {
      useAuth,
      drawer: ref(false)
    };
  },
};
</script>

<template>
  <q-layout>
    <div class="q-pa-md">
      <q-toolbar class="bg-light-green text-white shadow-2 rounded-borders">
        <q-btn flat label="Főoldal" to="/" />
        <q-space />
        <q-tabs v-model="tab" shrink>
          <q-route-tab label="X" to="/profile"/>
          <q-route-tab label="Y" to="/a" />
          <q-route-tab v-if="!useAuth.isLoggedIn.value" label="Regisztráció / Bejelentkezés" to="/register" />
        </q-tabs>
      </q-toolbar>
    </div>
    <q-page-container>
      <router-view></router-view>
    </q-page-container>
  </q-layout>


</template>

