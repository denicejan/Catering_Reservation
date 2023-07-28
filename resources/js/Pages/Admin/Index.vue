<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
// import MailCard from '@/Components/MailCard.vue';

const form = useForm({
    subject: '',
    message: ''
})

const submit = () => {
    form.post('/admin/send-mail')

    form.subject = ''
    form.message = ''
}

const props = defineProps({
    message: Object
})


var wordList = ["Attention Library Patrons!", "Alert: Book Return Reminder", "Important Notice: Book Returns", "Urgent Book Return Request", "Reminder: Return Your Books"];

const generateWord = () => {
  // Get a random word from the wordList
  const randomIndex = Math.floor(Math.random() * wordList.length);
  const generatedWord = wordList[randomIndex];

  // Assign the generated word to the input field
  form.subject = generatedWord;
};
// console.log(props.message)
</script>

<template>
    <Head title="Admin" />

    <AuthenticatedLayout>
            <!-- <div v-if="props.message.info" class="py-5 rounded-lg text-green-600 text-center text-3xl">
                {{ props.message.info }}
            </div>
            <div v-if="props.message.error" class="py-5 rounded-lg text-red-600 text-center text-3xl">
                {{ props.message.error }}
            </div> -->

        <div class="py-12 text-white">
            <div class="flex justify-center items-center">
                <!-- <MailCard :subject="form.subject" :message="form.message"  /> -->
                <div class="p-4 rounded-lg w-1/4 bg-red-500 p-10">
                    <h1 class="text-2xl mb-10">Send message to all Customer</h1>
                    <form @submit.prevent="submit">
                        <div class=" mb-10">
                            <label for="subject" class="text-4xl"><b>Notification Name:</b> &nbsp;&nbsp;</label> <br> <br>
                            <input v-model="form.subject" type="text" id="subject"  class="border-0 text-white" style="background-color: transparent; border-bottom: 2px solid white; width: 395px;"> <br>

                        </div>
                        <div class=" mb-10">
                            <label for="message" class="text-4xl"><b>Message:</b> </label> <br> <br>
                            <textarea placeholder="Your Message" v-model="form.message" type="text" id="message" class="bg-red-600 border-0 shadow-2xl px-2 py-1 h-[320px] w-full rounded-md text-white"></textarea>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="text-white px-4 p-5 rounded-md bg-orange-500">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
