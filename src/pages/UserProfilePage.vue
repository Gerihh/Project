<template>
<h1>profil</h1>
<div v-if="user">
  <p>Username: {{ user.username }}</p>
  <p>Email: {{ user.email }}</p>
  <p>Password: {{ user.password }}</p>
</div>
<div v-else>
  <p>User not logged in</p>
</div>

</template>

<script>
import useAuth from 'src/composables/useAuth';
export default {
  data() {
    return {
      user: null,
    };
  },
  mounted() {
    const storedUser = localStorage.getItem('user');
    this.user = storedUser ? JSON.parse(storedUser) : null;
    useAuth.isLoggedIn.value = true;
  },
};
</script>