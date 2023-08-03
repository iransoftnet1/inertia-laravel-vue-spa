<template>
    <br>
    <br>
    <div class="card col-5 offset-3">
        <div v-if="$page.props.flash.message" class="alert alert-success">
            {{ $page.props.flash.message }}
        </div>
        <table class="table table-bordered table-hover table-sm">
            <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="customer in customers">
                <td>{{ customer.name }}</td>
                <td>
                    <button @click.prevent="show(customer.id)" class="btn btn-outline-info">Info</button>
                    <button @click.prevent="edit(customer.id)" class="btn btn-primary">Edit</button>
                    <button @click.prevent="destroy(customer.id)" class="btn btn-outline-danger">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import {router} from "@inertiajs/vue3";

defineProps({
    customers: Object
})

function destroy(customerId) {
    router.delete('/customers/' + customerId)
}

function edit(customerId) {
    router.get('/customers/' + customerId + '/edit')
}

function show(customerId) {
    router.get('/customers/' + customerId + '/show')
}
</script>
