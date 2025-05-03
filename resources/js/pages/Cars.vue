<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { reactive } from 'vue'
import { Head,router,useForm  } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Cars',
        href: '/cars',
    },
];

defineProps({ cars: Object })

const form = useForm({
  name: null,
  color: null,
  price: null,
})

function submit() {
  form.post('/cars')
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
                    <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
                        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                           <div> nome</div>
                           <div> colore </div>
                           <div> Prezzo </div>
                        </div>
                        <div class="grid auto-rows-min gap-4 md:grid-cols-3" v-for="car in cars" :key="car.id" :value="car.id">
                           <div> {{ car.name }} </div>
                           <div> {{ car.color }} </div>
                           <div> {{ car.price }} € </div>
                        </div>
                    </div>
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
            </div>
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <PlaceholderPattern />
            </div>
        </div>
    </AppLayout>
</template>
