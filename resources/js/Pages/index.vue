<template>
<div class="card col-5 offset-3">
    <table class="table table-bordered table-hover table-sm">
        <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="customer in customers">
            <td>{{customer.name}}</td>
            <td>
                <button class="btn btn-outline-info">Info</button>
                <button class="btn btn-primary">Edit</button>
                <button class="btn btn-outline-danger">Delete</button>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</template>

<script setup>
defineProps({
    customers:Object
})
</script>
