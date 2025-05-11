<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { reactive } from 'vue'
import { Head,router,useForm, Link } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import { ref, onMounted } from 'vue';
import axios from 'axios';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Cars',
        href: '/cars/index',
    },
];

defineProps({ cars : Array });

const form = useForm({
  name: null,
  color: null,
  price: null,
});

function submit() {
  form.post('/cars')
};
	
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';
DataTable.use(DataTablesCore);

onMounted(function () {
    const deleteButtons = document.querySelectorAll('.delete');

    deleteButtons.forEach(button => {
    button.addEventListener('click', async () => {
        const postId = button.getAttribute('value');

        try {
        const response = await axios.get(`/cars/delete/${postId}`);

        if (response.status === 204) {
            console.log(`Post with ID ${postId} deleted successfully`);
            // You might want to update the UI here, e.g., remove the post element
        } else {
            console.error(`Unexpected response status: ${response.status}`);
        }
        location.reload();
        } catch (error) {
        console.error(`Error deleting post`);
        }
    });
    });

});

function drawEvent(){
    const deleteButtons = document.querySelectorAll('.delete');

    deleteButtons.forEach(button => {
    button.addEventListener('click', async () => {
        const postId = button.getAttribute('value');

        try {
        const response = await axios.get(`/cars/delete/${postId}`);

        if (response.status === 204) {
            console.log(`Post with ID ${postId} deleted successfully`);
            // You might want to update the UI here, e.g., remove the post element
        } else {
            console.error(`Unexpected response status: ${response.status}`);
        }
        location.reload();
        } catch (error) {
        console.error(`Error deleting post`);
        }
    });
    });
}


</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div class="relative aspect-video overflow-show rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
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
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
            </div>
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <DataTable :data="cars" class="display"  @draw="drawEvent">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>nome</th>
                            <th>colore</th>
                            <th>Prezzo</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                </DataTable>
            </div>
        </div>
    </AppLayout>
</template>
