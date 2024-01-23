<template>
  <div class="q-ma-lg row" v-if="user">
    <q-card class="my-card" flat style="background-color: #fafafa;">
        <img src="https://i.pinimg.com/474x/82/08/fe/8208fe67a521fd3fd8af5902f7292ccc.jpg" style="border-radius: 50%;"/>
        <q-card-section>
          <div class="text-h6 text-center">{{ user.username }} #{{user.id}}</div>
        </q-card-section>
      </q-card>
  </div>
</template>

<script>
import { defineComponent } from 'vue';
import useAuth from 'src/composables/useAuth';
import Cookies from 'js-cookie';

export default defineComponent({
    name: "ProfilePresonalPage",

    data() {
    return {
      user: null,
    };
  },
  mounted() {
    const storedUser = Cookies.get('user')
    this.user = storedUser ? JSON.parse(storedUser) : null;
  },
  methods: {
    logout() {
      useAuth.isLoggedIn.value = false;
      Cookies.remove('token', {path: '/'});
      Cookies.remove('user', {path: '/'});
      this.user = null;
      this.$router.push('/login');
    }
  }
});
</script>