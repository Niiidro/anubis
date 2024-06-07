<template>
  <label class="block text-sm text-gray-700 font-medium dark:text-gray-300">
    <span v-if="value">{{ value }}</span>
    <span v-else><slot /></span>
  </label>
</template>

<script setup lang="ts">
defineProps<{
  value?: string
}>()
</script>
