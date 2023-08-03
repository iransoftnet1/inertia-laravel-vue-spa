<template>
    <div class="card col-6 offset-3">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <form @submit.prevent="submit(producer.id)">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input v-model="form.title" type="text" class="form-control" id="title">
                    <div class="text-danger text-xs" v-if="errors.title">{{ errors.title }}</div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input v-model="form.description" type="text" class="form-control" id="description">
                    <div class="text-danger text-xs" v-if="errors.description">{{ errors.description }}</div>
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
    producer: Object
})
const form = useForm({
    title: props.producer.title,
    description: props.producer.description
})

function submit(producerID) {
    router.put('/producers/' + producerID, form)
}
</script>
