<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { computed } from 'vue';
import NavLink from '@/Components/NavLink.vue';

const props = defineProps({
    clients: Array,
    users: Array
})

const clientCount = computed(() => props.clients ? props.clients.length : 0);
const userCount = computed(() => props.users ? props.users.length : 0);

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>




        <div class="py-12">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-white leading-tight mb-10" style="font-size: 30px;">Home</h2>
                <div class="overflow-hidden shadow-sm sm:rounded-lg text-white" style="font-size: 40px;">
                    <div>


                        <p>Welcome to our premier catering reservation service! We are delighted to offer you an unforgettable culinary experience that will elevate any occasion to new heights. Whether you're hosting a corporate event, a wedding celebration, or a private gathering, our dedicated team of skilled chefs and event planners is here to curate a bespoke menu that tantalizes your taste buds and exceeds your expectations.

                        </p>
                        <div style="display: grid; place-content: center;">
                            <NavLink :href="route('clients')" style="font-size: 50px;" class="bg-green-500 p-10 text-white mt-20 shadow-sm">
                                Reservation
                        </NavLink>
                        </div>
                    </div>
                </div>
                 <br> <br>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
