<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form =useForm({
firstname:'',
lastname:'',
});

const submit = () =>{
    console.log('submit');
    const formData = new FormData();
    formData.append('firstname',form.firstname);
    formData.append('lastname',form.lastname);

    form.post(route(),{})

}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <!-- <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template> -->

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden shadow-sm sm:rounded-lg"
                >
               <form @submit.prevent="submit">
                    <div class="flex flex-col w-1/5 justify-center align-middle">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" id="firstname">
                        <label for="firstname">Last Name</label>
                        <input type="text" name="lastname" id="lastname">
                        <PrimaryButton class="m-2">
                            Submit
                        </PrimaryButton>
                    </div>
               </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
