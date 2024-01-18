<template>
    <div class="absolute-center">
      <q-card square bordered class="q-pa-md shadow-1" style="width: 500px; height: 300px;">
              <q-card-section>
                <q-form class="q-gutter-md">
                  <q-input square filled clearable v-model="email" type="username" label="Felhasználónév" />
                  <q-input square filled clearable v-model="password" type="password" label="Jelszó" />
                </q-form>
              </q-card-section>
              <q-card-actions class="q-px-md">
                <q-btn unelevated color="light-green-7" size="lg" class="full-width" label="Login" />
              </q-card-actions>
              <q-card-section class="text-center q-pa-none">
                <p class="text-grey-6">Not reigistered? Create an Account</p>
              </q-card-section>
            </q-card>
    </div>
</template>

<script>
export default {
  name: 'LoginFormComponent',
  data () {
    return {
      email: '',
      password: ''
    }
  }
}
</script>

<style>
.q-card {
  width: 360px;
}
</style>