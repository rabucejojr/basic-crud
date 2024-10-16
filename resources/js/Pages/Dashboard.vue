<script setup>
import NavLink from '@/Components/NavLink.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
const form =useForm({
fname:'',
lname:'',
});

const submit = () =>{
    console.log('submit');
    const formData = new FormData();
    formData.append('fname',form.fname);
    formData.append('lname',form.lname);

    form.post(route('students.store'),{
        forceFormData:true,
            onSuccess: (response) => {
                console.log('Success:',response);
            },
            onError: (errors) => {
                console.log('Error response:', errors);  // Check if there's validation or other issues
            }
    });

};
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
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" id="fname" v-model="form.fname">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" id="lname" v-model="form.lname">
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
