<template>
    <div class="absolute-center">
      <q-card square bordered class="q-pa-md shadow-1" style="width: 500px; height: 350px;">
                <q-form class="q-gutter-md" @submit="register">
                  <q-input square filled clearable v-model="email" type="email" label="Email" />
                  <q-input square filled clearable v-model="username" type="username" label="Felhasználónév" />
                  <q-input square filled clearable v-model="password" type="password" label="Jelszó" />
                  <q-card-section>
                    <q-btn type="submit" unelevated color="light-green-7" size="lg" class="full-width" label="Regisztrálás" />
                  </q-card-section>
                </q-form>
              <q-card-section class="text-center q-pa-none">
                <p class="text-grey-8">Van már felhasználód? Jelentkezz be itt!</p>
              </q-card-section>
            </q-card>
    </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'RegisterFormComponent',
  data () {
    return {
      email: '',
      username: '',
      password: ''
    };
  },
  methods: {
    async register() {
      try {
        const response = await axios.post('/api/auth/register', {
          email: this.email,
          username: this.username,
          password: this.password,
        });

        //Token és User elmentése
        localStorage.setItem('token', response.data.accessToken);
        localStorage.setItem('user', JSON.stringify(response.data.user));
      } catch (error) {
        console.error('Hibás regisztráció:', error);
      }
    }
  }
}
</script>

<style>
.q-card {
  width: 360px;
}
</style>