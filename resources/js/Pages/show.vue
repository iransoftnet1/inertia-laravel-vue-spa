<template>
    <div class="card col-6 offset-3">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-sm">
                <tr>
                    <td>ID</td>
                    <td>{{ customer.id }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ customer.name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ customer.email }}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{ customer.phone }}</td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script setup>
import {useForm, router} from "@inertiajs/vue3";

const props = defineProps({
    customer: Object
})
const form = useForm({
    name: props.customer.name,
    email: props.customer.email,
    phone: props.customer.phone
})

</script>
