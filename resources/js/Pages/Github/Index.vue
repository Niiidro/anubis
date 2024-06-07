<template>
  <Head title="Github" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl text-gray-800 font-semibold leading-tight dark:text-gray-200">
        Github
      </h2>
    </template>
    <div class="py-12">
      <div class="mx-auto max-w-7xl space-y-6 lg:px-8 sm:px-6">
        <div class="bg-white p-4 shadow sm:rounded-lg dark:bg-gray-800 sm:p-8">
          <div v-for="pr, index in pullRequests" :key="index">
            {{ pr.title }}
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

interface Props {
  pullRequests: any[]
}
const props = defineProps<Props>()
</script>
