<script>
import { ref } from 'vue';
import useAuth from 'src/composables/useAuth';

export default {
  setup() {
    const toggleDrawer = ref(false);
    return {
      useAuth,
      toggleDrawer,
    };
  },
  methods: {
    logout() {
      this.toggleDrawer = false;
      useAuth.isLoggedIn.value = false;
      localStorage.removeItem('token');
      localStorage.removeItem('user');
      this.user = null;
      this.$router.push('/login');
    }
  }
};
</script>
<template>
  <q-layout view="hHh Lpr lFf" >
    <div>
          <q-header class="bg-light-green text-white" elevated>
            <q-toolbar>
              <q-btn flat label="Főoldal" to="/" />
              <q-space />
              <q-tabs v-model="tab" shrink>
                <q-route-tab v-if="useAuth.isLoggedIn.value" label="Események" to="/events"/>
                <q-route-tab v-if="!useAuth.isLoggedIn.value" label="Regisztráció / Bejelentkezés" to="/register"/>
                <q-btn v-else flat icon="person" @click="toggleDrawer = !toggleDrawer"/>
              </q-tabs>
            </q-toolbar>
          </q-header>
      <q-drawer v-model="toggleDrawer" elevated side="right">
      <q-tabs inline-tabs vertical>
        <q-route-tab to="/profile" label="Profil" @click="toggleDrawer = !toggleDrawer" />
        <q-route-tab
          href="https://vuejs.org/"
          label="Vue.JS"
          no-caps
          target="_blank"
        />
        <q-item class="justify-center">
          <q-btn label="Kijelentkezés" color="red" @click="logout"/>
        </q-item>
        </q-tabs>
      </q-drawer>
    </div>
    <q-page-container>
      <router-view></router-view>
    </q-page-container>
  </q-layout>
</template>

