<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head} from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import { ref } from 'vue'

import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';
DataTable.use(DataTablesCore);

const props = defineProps({ cars : Object });

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
    {
        title: 'Checkout',
        href: '/dashboard/checkout',
    },
];
function total(){
    let x =0;
    props.cars.forEach(element => {
        x = x+element.price;
    });
    return x;
}
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
             <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div class="relative aspect-video overflow-show rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <h2 class="pb-4">Summary</h2>
                    <div v-for="car in cars" class="relative border border-sidebar-border/70 dark:border-sidebar-border">
                        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                            <div>{{car.name}}</div>
                            <div>{{car.price}}€</div>
                        </div>
                    </div>
                    <div class="relative border border-sidebar-border/70 dark:border-sidebar-border">
                        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                            <div>total</div>
                            <div>{{total()}}€</div>
                        </div>
                    </div>
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
            </div>
            
        </div>
    </AppLayout>
</template>
