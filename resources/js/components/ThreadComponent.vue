<template>
    <div>
        <h2>Browse Threads</h2>
        <div class="card card-body" v-for="thread in threads" v-bind:key="thread.id">
            <p>{{ thread.creator.name }}</p>
            <a v-bind:href="'./test/' + thread.id"><h3>{{ thread.thread_title }}</h3></a>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            threads: [],
            thread: {
                id: '',
                thread_title: '',
                creator: {
                    name: ''
                },
            },
            thread_id: '',
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
                });
        }
    }
}
</script>