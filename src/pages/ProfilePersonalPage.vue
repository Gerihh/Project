<template>
<div v-if="user">
  <h1>Felhasználónév: {{ user.username }}</h1>
  <h1>Email: {{ user.email }}</h1>
  <h1>Azonosító: {{ user.id }}</h1>
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