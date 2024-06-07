<template>
  <Head title="Profile" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl text-gray-800 font-semibold leading-tight dark:text-gray-200">
        Profile
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl space-y-6 lg:px-8 sm:px-6">
        <div class="bg-white p-4 shadow sm:rounded-lg dark:bg-gray-800 sm:p-8">
          <UpdateProfileInformationForm
            :must-verify-email="mustVerifyEmail"
            :status="status"
            class="max-w-xl"
          />
        </div>

        <div class="bg-white p-4 shadow sm:rounded-lg dark:bg-gray-800 sm:p-8">
          <UpdatePasswordForm class="max-w-xl" />
        </div>

        <div class="bg-white p-4 shadow sm:rounded-lg dark:bg-gray-800 sm:p-8">
          <DeleteUserForm class="max-w-xl" />
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import DeleteUserForm from './Partials/DeleteUserForm.vue'
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue'
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

defineProps<{
  mustVerifyEmail?: boolean
  status?: string
}>()
</script>
