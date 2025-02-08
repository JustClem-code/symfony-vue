<script setup>
import { ref, onMounted } from 'vue';

const props = defineProps(['title'])

const data = ref(null);
const error = ref(null);

const fetchData = async () => {
  try {
    const response = await fetch('https://localhost/getproducts');
    data.value = await response.json();
  } catch (err) {
    error.value = 'erreur';
  }
};

onMounted(() => {
  fetchData();
  console.log('title', props.title);

});
</script>

<template>
  <div>
    <h1>{{ title }} ju</h1>
    <div v-if="data">
      {{ data }}
      <div v-for="dat in data" key="dat.titre">
        <p>{{ dat.titre }}</p>
        <p>{{ dat.age }}</p>
      </div>
    </div>
    <div v-else-if="error">Error: {{ error }}</div>
    <div v-else>Loading...</div>
  </div>
</template>
