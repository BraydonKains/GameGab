<template>
<div>
    <h2>{{ thread_title }}</h2>
    <h3>By {{ creator.name }}</h3>
    <div class="card card-body" v-for="post in posts" v-bind:key="post.id">
        <p>{{ post.poster.name }}</p>
        <p>{{ post.content }}</p>
    </div>
</div>
</template>

<script>
export default {
    props: ['thread_id'],

    data() {
        return {
            id: '',
            thread_title: '',
            creator: {
                name: ''
            },
            posts: [],
            post: {
                id: '',
                content: '',
                poster: {
                    name: ''
                }
            }
        }
    },

    created() {
        this.fetchThread();
    },

    methods: {
        fetchThread() {
            fetch("../api/thread/" + this.thread_id)
            .then(res => res.json())
            .then(res => {
                this.id = res.id;
                this.thread_title = res.thread_title;
                this.creator = res.creator;
            })
            .catch(err => console.log(err));

            fetch("../api/post/thread/" + this.thread_id)
            .then(res => res.json())
            .then(res => {
                this.posts = res.data;
            })
            .catch(err => console.log(err));;
        }
    }
}
</script>