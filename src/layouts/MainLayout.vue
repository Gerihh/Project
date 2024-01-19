<script setup></script>

<template>
  <q-layout>
    <div class="q-pa-md">
      <q-toolbar class="bg-light-green text-white shadow-2 rounded-borders">
        <q-btn flat label="Főoldal" to="/" />
        <q-space />
        <q-tabs v-model="tab" shrink>
          <q-route-tab label="X" to="/x" />
          <q-route-tab label="Y" to="/y" />
          <q-route-tab label="Regisztráció / Bejelentkezés" to="/register" />
        </q-tabs>
      </q-toolbar>
    </div>

    <q-page-container>
      <router-view></router-view>
    </q-page-container>
  </q-layout>
</template>
