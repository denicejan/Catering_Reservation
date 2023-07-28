<template>
    <div class="bg-white cursor-pointer flex rounded-xl" @click="open(client)">
        <img :src="client.picUrl" alt="Product photo" class="rounded-xl w-[250px] h-[280px] border flex justify-center items-center bg-gray-300 text-center">
        <div class="p-5" style="font-size: 20px;">
            <div> <b>Name:</b> {{ client.name }}</div>
            <div> <b>Address:</b> {{ client.address }}</div>
            <div> <b>Contact Number:</b> {{ client.contact }}</div>
            <div> <b>Email:</b> {{ client.email }}</div> <br>
            <div style="font-size: 50px;"> <b>Price:</b> {{ client.price }}</div>

        </div>
    </div>

    <div class="bg-slate-200 p-5">
        <b style="font-size: 30px;">Categories</b>
        <div class="flex">
            <div class="m-2" style="font-size: 23px;"> <b>Appetizers <br> </b> {{ client.appetizers }}</div>
            <div class="m-2" style="font-size: 23px;"> <b>Salads <br> </b> {{ client.salads }}</div>
            <div class="m-2" style="font-size: 23px;"> <b>Main Courses <br> </b> {{ client.main_courses }}</div>
            <div class="m-2" style="font-size: 23px;"> <b>Desserts <br> </b> {{ client.desserts }}</div>
            <div class="m-2" style="font-size: 23px;"> <b>Beverages <br> </b> {{ client.beverages }}</div>
        </div>
        <div class="p-5 rounded-xl flex" style="transform: translateX(-20px);">
                <label :for="'enabled' + '-' + client.id" class="switch">
                    <input type="checkbox" :id="'enabled' + '-' + client.id" :checked="client.enabled" @change.prevent="toggleEnabled(client)">
                    <span class="slider round"></span>
                </label> <br>
                <h1 style="font-size: 20px; margin-left: 15px;">
                    <b>{{ client.enabled ? 'Done' : 'Pending' }}</b>
            </h1>
        </div>
    </div>

 <!-- <div style="margin-bottom: -100px;">
            </div>
    <div class="rounded-lg p-4 text-white bg-slate-900 shadow flex hover:bg-slate-700 duration-200">
        <div class="cursor-pointer flex-1" @click="open(client)">


            <div class="ml-4">

                <br> <br> <br> <br> <br>
                <h3 class="font-bold" style="font-size: 30px;">
                    Details
                </h3> <br>
                <div> <b>Name:</b> {{ client.name }}</div>
                <div> <b>address:</b> {{ client.address }}</div>
                <div> <b>Contact Number:</b> {{ client.contact }}</div>
                <div> <b>Price:</b> {{ client.price }}</div>
                <div> <b>Email:</b> {{ client.email }}</div>

                <div class="p-5 rounded-xl flex" style="transform: translateX(-20px);">
                    <label :for="'enabled' + '-' + client.id" class="switch">
                        <input type="checkbox" :id="'enabled' + '-' + client.id" :checked="client.enabled" @change.prevent="toggleEnabled(client)">
                        <span class="slider round"></span>
                    </label> <br>
                    <h1 style="font-size: 20px; margin-left: 15px;">
                        <b>{{ client.enabled ? 'Email delivered.' : 'Pending Email' }}</b>
                    </h1>
                </div>
            </div>

        </div>

    </div>
 -->

</template>
<style scoped>
    .switch {
    position: relative;
    display: inline-block;
    width: 100px;
    height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
    opacity: 0;
    width: 0;
    height: 0;
    }

    /* The slider */
    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #6a6a6a;
    -webkit-transition: .4s;
    transition: .4s;
    }

    .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 5px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
    }

    input:checked + .slider {
    background-color: #20c747;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #1ac233;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26spx);
    -ms-transform: translateX(26px);
    transform: translateX(64px);
    }


    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    }

    .slider.round:before {
    border-radius: 50%;
    }
</style>

<script setup>
import { router } from '@inertiajs/vue3';


const props = defineProps({
    client: Object
})

function open(client) {
    router.visit('/clients/' + client.id)
}


function toggleEnabled(client) {
    router.visit('/clients/toggle/' + client.id,{
        method: 'post',
        preserveScroll: true
    })
}

</script>
