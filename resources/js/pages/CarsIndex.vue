<script setup lang="ts">
import { computed } from 'vue';

defineProps({ cars: Object })

</script>

<template>
   <select>
   <option v-for="(name, id) in cars" :key="id" :value="id">{{ name }}</option>
</select>
</template>