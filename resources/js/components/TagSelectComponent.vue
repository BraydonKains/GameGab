<template>
<div>
    <div class="card card-body" v-for="tag in tags" v-bind:key="tag.id">
        <p>{{ tag.tag_text }}</p>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            tags: [],
            tag: {
                id: '',
                tag_text: ''
            }
        }
    },

    created() {
        this.fetchTags();
    },

    methods: {
        fetchTags() {
            fetch("api/tags")
            .then(res => res.json())
            .then(res => {
                this.tags = res.data;
            });
        }
    }
}
</script>