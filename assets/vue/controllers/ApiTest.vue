<script setup>
import { ref, onMounted } from 'vue';

const data = ref(null);
const error = ref(null);

const fetchData = async () => {
  try {
    const response = await fetch('https://localhost/array');
    data.value = await response.json();
  } catch (err) {
    error.value = 'putainnnn';
  }
};

onMounted(() => {
  fetchData();
});
</script>

<template>
  <div v-if="data">
    {{ data }}
    <div v-for="dat in data" key="dat.titre">
      <p>{{ dat.titre }}</p>
      <p>{{ dat.age }}</p>
    </div>
  </div>
  <div v-else-if="error">Error: {{ error }}</div>
  <div v-else>Loading...</div>
</template>
