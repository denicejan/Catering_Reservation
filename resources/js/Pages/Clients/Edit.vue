<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    client: Object
})

const form = useForm({
    name: props.client.name,
    address: props.client.address,
    contact: props.client.contact,
    pic: props.client.pic,
    email: props.client.email,
    price: props.client.price,


    appetizers: props.client.appetizers,
    salads: props.client.salads,
    main_courses: props.client.main_courses,
    desserts: props.client.desserts,
    beverages: props.client.beverages,
})

function submit() {

    if (form.price === '') {
        // If the price is empty, call the updatePrice function to calculate and set it
        updatePrice();
    }

    // Now, the form.price value should be updated with the calculated price

    form.patch('/clients/' + props.client.id)
}

const updatePrice = () => {
    const selectedOptions = [
        form.appetizers,
        form.salads,
        form.main_courses,
        form.desserts,
        form.beverages
    ];

    let totalPrice = 0;

    selectedOptions.forEach((option) => {
        if (option) {
            totalPrice += 5000;
        }
    });

    // Manually set the price in the form object
    form.price = totalPrice.toString();
}

function clearSelectedOption() {
    const selectedOptions = [
        form.appetizers,
        form.salads,
        form.main_courses,
        form.desserts,
        form.beverages
    ];

    let totalPrice = 0;

    selectedOptions.forEach((option) => {
        if (option) {
            totalPrice += 0;
        }
    });

    // Manually set the price in the form object
    form.price = totalPrice.toString();
    // Reset the selected option to an empty string to clear the selection
    form.appetizers = '';
    form.salads = '';
    form.main_courses = '';
    form.desserts = '';
    form.beverages = '';



}

</script>

<template>
    <Head title="Edit Client" />

    <AuthenticatedLayout>


        <div class="py-6">
            <div class="bg-red-500 max-w-4xl p-4 mx-auto rounded-lg text-white">
                <Link class="bg-yellow-500 text-white rounded-2xl p-5 hover:bg-slate-50 hover:text-black duration-200" as="button" :href="'/clients/' + client.id" style="margin-top: 25px; margin-bottom: 25px;">Back</Link>

                <form @submit.prevent="submit" class="flex">
                    <div class="flex-1 pr-4">
                        <h4 class="text-xl mb-4">Personal Information</h4>

                        <div class="form-field text-black " >
                            <label for="name">Name</label>
                            <input required type="text" id="name" v-model="form.name" class="border-0 text-white" style="background-color: transparent; border-bottom: 2px solid white;">
                        </div>

                        <div class="form-field text-black">
                            <label for="address">Address</label>
                            <input required type="text" id="address" v-model="form.address" class="border-0 text-white" style="background-color: transparent; border-bottom: 2px solid white;">
                        </div>

                        <div class="form-field text-black">
                            <label for="contact">Contact Number</label>
                            <input required type="text" id="contact" v-model="form.contact" class="border-0 text-white" style="background-color: transparent; border-bottom: 2px solid white;">
                        </div>

                        <div class="form-field text-black">
                            <label for="email">Email</label>
                            <input required type="email" id="email" v-model="form.email" class="border-0 text-white" style="background-color: transparent; border-bottom: 2px solid white;">
                        </div>
                        <!-- <div class="form-field text-black">
                            <label for="pic">Cover Picture</label>
                            <input type="file" @input="form.pic = $event.target.files[0]" class="h-full border-gray-400 rounded text-center" accept="image/png" />
                            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                {{ form.progress.percentage }}%
                            </progress>
                        </div> -->
                        <div class="form-field text-black" style="font-size: 30px;">
                            <label for="price">Price</label>
                            <input disabled required type="number" id="price" v-model="form.price" class="border-0 text-white" style="background-color: transparent; border-bottom: 2px solid white; font-size: 50px;">
                        </div>
                    </div>
                    <div class="flex-1 flex flex-col ">
                        <h4 class="text-xl mb-4">Categories</h4>
                        <label for="contact">Appetizers</label>
                        <select name="" id="" v-model="form.appetizers" class="text-black mb-3" @change="updatePrice">
                            <option value="Assorted canapés">Assorted canapés</option>
                            <option value="Bruschettas">Bruschettas</option>
                            <option value="Mini spring rolls">Mini spring rolls</option>
                            <option value="Stuffed mushrooms">Stuffed mushrooms</option>
                            <option value="Shrimp cocktail">Shrimp cocktail</option>
                        </select>


                        <label for="contact">Salads</label>
                        <select name="" id="" v-model="form.salads" class="text-black mb-3" @change="updatePrice">
                            <option value="Garden salad">Garden salad</option>
                            <option value="Caesar salad">Caesar salad</option>
                            <option value="Greek salad">Greek salad</option>
                            <option value="Caprese salad">Caprese salad</option>
                            <option value="Spinach and strawberry salad">Spinach and strawberry salad</option>
                        </select>

                        <label for="contact">Main Courses</label>
                        <select name="" id="" v-model="form.main_courses" class="text-black mb-3" @change="updatePrice">
                            <option value="Chicken dishes (grilled, roasted, or sautéed)">Chicken dishes (grilled, roasted, or sautéed)</option>
                            <option value="Beef dishes (steak, roast, or stir-fry)">Beef dishes (steak, roast, or stir-fry)</option>
                            <option value="Fish or seafood options (salmon, shrimp, etc.)">Fish or seafood options (salmon, shrimp, etc.)</option>
                            <option value="Vegetarian or vegan dishes">Vegetarian or vegan dishes</option>
                            <option value="Stir-fried or roasted vegetables">Stir-fried or roasted vegetables</option>
                        </select>

                        <label for="contact">Desserts</label>
                        <select name="" id="" v-model="form.desserts" class="text-black mb-3" @change="updatePrice">
                            <option value="Assorted mini pastries and cakes">Assorted mini pastries and cakes</option>
                            <option value="Fruit platters or fruit tarts">Fruit platters or fruit tarts</option>
                            <option value="Chocolate fondue fountain">Chocolate fondue fountain</option>
                            <option value="Cheesecake bites">Cheesecake bites</option>
                            <option value="Cookies and brownies">Cookies and brownies</option>
                        </select>

                        <label for="contact">Beverages</label>
                        <select name="" id="" v-model="form.beverages" class="text-black mb-3" @change="updatePrice">
                            <option value="Soft drinks and sodas">Soft drinks and sodas</option>
                            <option value="Fresh fruit juices">Fresh fruit juices</option>
                            <option value="Iced tea and lemonade">Iced tea and lemonade</option>
                            <option value="Water with infused flavors">Water with infused flavors</option>
                            <option value="Coffee and tea">Coffee and tea</option>
                        </select>
                        <button type="button" @click="clearSelectedOption">Clear all categories</button>
                        <button class="mt-2 bg-orange-500 text-white rounded-2xl p-5 hover:bg-slate-50 hover:text-black duration-200" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
