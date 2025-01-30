<template>
  <div>
    <h1>Hello {{ name }}!</h1>

    <h1>{{ message }}</h1>
    <h1>{{ now }}</h1>

    <!--
    Bind to a method/function.
    The @click syntax is short for v-on:click.
  -->
    <button @click="reverseMessage">Reverse Message</button>
  </div>
  <ApiTest />
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import ApiTest from './ApiTest.vue'

defineProps({
  name: String
});

onMounted(() => {
  console.log(`the component is now created.`)
})

const now = computed(() => Date.now() + 1)

const message = ref('Hello World!')

function reverseMessage() {
  // Access/mutate the value of a ref via
  // its .value property.
  message.value = message.value.split('').reverse().join('')
}


</script>
