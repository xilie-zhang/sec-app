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
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <form @submit.prevent="submit">
                        <label for="name">Nome:</label>
                        <input id="name" v-model="form.name" /> <br>
                        <div v-if="form.errors.name">{{ form.errors.name }}</div>
                        <label for="color">colore:</label>
                        <input id="color" v-model="form.color" /><br>
                        <div v-if="form.errors.color">{{ form.errors.color }}</div>
                        <label for="price">prezzo:</label>
                        <input id="price" v-model="form.price" /><br>
                        <div v-if="form.errors.price">{{ form.errors.price }}</div>
                        <button type="submit">Submit</button>
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
