<template>

    <Head title="Clients" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex mx-auto">
                    <h2 class="font-semibold text-xl text-white leading-tight mb-10" style="font-size: 30px;">Reservations</h2>

                    <div style="margin-left: 850px;">
                        <div class="res_btn">
                        <Link href="/clients/create" class="mt-2 text-dark rounded-2xl p-5" style="font-size: 20px;">Reserve Another</Link>

                        </div>
                    </div>
                </div>
                <input type="text" @keydown.enter="search($event)" name="" id="" class="mb-10 border-0 text-white" style="background-color: transparent;" placeholder="Search Name">
                <div class="overflow-hidden shadow-sm sm:rounded-lg flex flex-wrap justify-between">

                    <div class="w-[49%] mb-4" v-for="client in clients" :key="client.id">
                        <ClientCard :client="client" />
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>

<script setup>
import { computed } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ClientCard from '@/Components/ClientCard.vue';
import { Head, Link, router } from '@inertiajs/vue3';

const props = defineProps({
    clients: Array
})

function search(e) {
    router.visit('/clients/search/' + e.target.value, {
        only: ['clients']
    })
}

const clientCount = computed(() => props.clients.length);

</script>

<style>
    .res_btn{
        background-color: green;
        color: white;
        border-radius: 20px;
        padding: 10px;

    }
</style>
