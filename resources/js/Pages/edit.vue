<template>
    <div class="card col-6 offset-3">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <form @submit.prevent="submit(customer.id)">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input v-model="form.name" type="text" class="form-control" id="name">
                    <div class="text-danger text-xs" v-if="errors.name">{{ errors.name }}</div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input v-model="form.email" type="email" class="form-control" id="email">
                    <div class="text-danger text-xs" v-if="errors.email">{{ errors.email }}</div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input v-model="form.phone" type="number" class="form-control" id="phone">
                    <div class="text-danger text-xs" v-if="errors.phone">{{ errors.phone }}</div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</template>

<script setup>
import {useForm, router} from "@inertiajs/vue3";

const props = defineProps({
    errors: Object,
    customer: Object
})
const form = useForm({
    name: props.customer.name,
    email: props.customer.email,
    phone: props.customer.phone
})

function submit(customerId) {
    router.put('/customers/' + customerId, form)
}
</script>
