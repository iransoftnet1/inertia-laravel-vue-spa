<template>
    <br>
    <br>
    <div class="card col-7 offset-3">
        <div v-if="$page.props.flash.message" class="alert alert-success">
            {{ $page.props.flash.message }}
        </div>
        <table class="table table-bordered table-hover table-sm">
            <thead>
            <tr>
                <th>title</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="producer in producers.data">
                <td>{{ producer.title }}</td>
                <td>
                    <button @click.prevent="show(producer.id)" class="btn btn-outline-info">Info</button>
                    <button @click.prevent="edit(producer.id)" class="btn btn-primary">Edit</button>
                    <button @click.prevent="destroy(producer.id)" class="btn btn-outline-danger">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
        <Paginate :links="producers.links"/>
    </div>
</template>

<script setup>
import {router} from "@inertiajs/vue3";
import Paginate from "../../Components/paginate.vue";

defineProps({
    producers: Object
})

function destroy(customerId) {
    router.delete('producers/' + customerId)
}

function edit(customerId) {
    router.get('producers/' + customerId + '/edit')
}

function show(customerId) {
    router.get('producers/' + customerId + '/show')
}
</script>
