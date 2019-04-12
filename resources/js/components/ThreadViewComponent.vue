<template>
<div>
    <h2>{{ thread_title }}</h2>
    <h3 v-if="creator != null">By {{ creator.name }}</h3>
    <h3 v-else>By [deleted]</h3>
    <div class="card card-body" v-for="post in posts" v-bind:key="post.id">
        <p v-if="post.poster != null">{{ post.poster.name }}</p>
        <p v-else>[deleted]</p>
        <p>{{ post.content }}</p>
        <button v-if="deleteCheck(post)" v-on:click="destroyPost(post.id)" class="btn btn-danger">Delete</button>
    </div>
    <div style="padding: 10px">
        <post-create 
        v-if="this.with === 'true'" 
        :user_id="user_id" 
        :thread_id="thread_id" 
        @submitted="fetchThread">
        </post-create>
    </div>
</div>
</template>

<script>
export default {
    props: ['user_id', 'thread_id', 'with'],

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
                    id: '',
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
        },
        deleteCheck(post) {
            return post.poster != null && this.user_id == post.poster.id;   
        },
        destroyPost(post_id) {
            fetch("../api/post/destroy/" + post_id)
            //.then(res => res.json())
            .then(res => {
                this.fetchThread();
            });
        }
    }
}
</script>