<template>
    <div style="display: block; margin: auto">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li
                    :class="{
                        'page-item' : true,
                        'active' : link.active,
                        'disabled' : !link.url
                     }"
                    v-for="link in links"
                >
                    <Link class="page-link" :href="link.url" v-html="link.label" replace/>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
import {Link} from '@inertiajs/vue3'

export default {
    components: {
        Link
    },
    props: {
        links: Array
    }
}
</script>
