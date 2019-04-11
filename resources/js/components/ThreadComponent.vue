<template>
    <div>
        <div style="padding: 10px;">
            <thread-create v-if="this.with === 'true'" :user_id="this.user_id" @submitted="fetchThreads"></thread-create>
        </div>
        <h2>Browse Threads</h2>
        <div class="card card-body" v-for="thread in threads" v-bind:key="thread.id">
            <p v-if="thread.creator != null">{{ thread.creator.name }}</p>
            <p v-else>[deleted]</p>
            <a v-bind:href="'./test/' + thread.id"><h3>{{ thread.thread_title }}</h3></a>
            <button v-if="deleteCheck(thread)" v-on:click="destroyThread(thread.id)" class="btn btn-danger">Delete</button>
        </div>
    </div>
</template>

<script>
export default {
    props: ['user_id', 'with'],
    
    data() {
        return {
            logged_in: this.user_id,
            threads: [],
            thread: {
                id: '',
                thread_title: '',
                creator: {
                    id: '',
                    name: ''
                },
            },
            thread_id: '',
            scroll_flag: true,
            edit: false
        }
    },

    created() {
        this.fetchThreads();
    },

    methods: {
        fetchThreads() {
            fetch("api/threads")
                .then(res => res.json())
                .then(res => {
                    this.threads = res.data;
                    if(this.scroll_flag) {
                        window.scrollTo(0,document.body.scrollHeight);
                    } else this.scroll_flag = true;
                });
        },
        deleteCheck(thread) {
            return thread.creator != null && this.user_id == thread.creator.id;   
        },
        destroyThread(thread_id) {
            fetch("api/thread/destroy/" + thread_id)
            //.then(res => res.json())
            .then(res => {
                this.scroll_flag = false;
                this.fetchThreads();
            });
        }
    }
}
</script>