<template>
  <div v-if="error">Error occured!: {{ error.message }}</div>
  <div v-else-if="userData">
    <h1>hello</h1>
    <div v-for="{ id, username, email } in userData" :key="id">
      <h2>
        {{ id }}
        {{ username }}
        {{ email }}
      </h2>
    </div>
  </div>
</template>

<script setup>
import { onMounted } from "vue";
import useUser from "../composables/userApi";
const { userData, error, getAllUser } = useUser();
onMounted(getAllUser);
</script>


