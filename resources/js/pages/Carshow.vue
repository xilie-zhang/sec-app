<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head,useForm, Link } from '@inertiajs/vue3';


const props = defineProps({ car: Object })

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Cars',
        href: '/cars/index',
    },
    {
        title: 'Edit',
        href: '/car/{car}',
    },
];
// console.log(props.car.name)
const form = useForm({
  name: props.car.name,
  color: props.car.color,
  price: props.car.price
});

function submit() {
  form.put('/cars/'+props.car.id)
};

</script>

<template>
     <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
      <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
         <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
            <form class="max-w-sm mx-auto" @submit.prevent="submit">
               <div class="mb-5">
                     <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome:</label>
                     <input type="text" id="name" v-model="form.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                     <div v-if="form.errors.name">{{ form.errors.name }}</div>
               </div>
               <div class="mb-5">
                     <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Colore:</label>
                     <input type="text" id="color" v-model="form.color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                     <div v-if="form.errors.color">{{ form.errors.color }}</div>
               </div>
               <div class="mb-5">
                     <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prezzo:</label>
                     <input type="text" id="price" v-model="form.price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                     <div v-if="form.errors.price">{{ form.errors.price }}</div>
               </div>
               <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>           
            </form>
         </div>
           
      </div>
  </AppLayout>
</template>