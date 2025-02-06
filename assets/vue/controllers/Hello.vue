<template>
  <div>
    <h1>Hello {{ nom }}!</h1>

    <h1>{{ message }}</h1>
    <h1>{{ now }}</h1>
    <!-- <h1>{{ number }}</h1> -->

    <!--
    Bind to a method/function.
    The @click syntax is short for v-on:click.
  -->
    <button @click="reverseMessage">Reverse Message</button>
  </div>
  <ApiTest :title=title />
  <TestWatcher />
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import ApiTest from './ApiTest.vue'
import TestWatcher from './TestWatcher.vue';

const props = defineProps({
  nom: String,
  number: Number,
});


onMounted(() => {
  console.log(`the component is now created.`, props.nom)
  console.log(`number`, props.number)
})

const now = computed(() => Date.now() + 1)

const message = ref('Hello World!')
const title = ref('OOOOOOOOOO!')

function reverseMessage() {
  // Access/mutate the value of a ref via
  // its .value property.
  message.value = message.value.split('').reverse().join('')
  title.value = "AAAAAAAAAAAa!"
}


</script>
