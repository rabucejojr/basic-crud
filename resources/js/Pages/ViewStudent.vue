<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';

defineProps({
    students:{
        type:Array,
        default:()=>[],
    }
});

const form = useForm({});

const delete_student =(id)=>{
        form.delete(`students/${id}`, {
            onSuccess: () => {
                console.log('deleted successfully');
            },
            onError: (errors) => {
                console.error(errors);
                console.log('failed to delete');
            }
        });
};
const edit_file = (id)=>{
    console.log(id);
};
</script>
<template>
    <AuthenticatedLayout>
        <div class="py-12 flex justify-center">
        <table class="w-3/5 text-center border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">ID</th>
                    <th class="border border-gray-300 px-4 py-2">First Name</th>
                    <th class="border border-gray-300 px-4 py-2">Last Name</th>
                    <th class="border border-gray-300 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="student in students" :key="student.id">
                    <td class="border border-gray-300 px-4 py-2">{{ student.id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ student.fname }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ student.lname }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <button class="px-4 py-2" @click="edit_file(student.id)">Edit</button>
                        <button class="px-4 py-2" @click="delete_student(student.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    </AuthenticatedLayout>
</template>
