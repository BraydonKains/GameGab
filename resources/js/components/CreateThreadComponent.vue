<template>
<form @submit.prevent="createThread" class="mb-3">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Title" v-model="thread_title">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-light"></button>
    </div>
</form>
</template>

<script>
export default {
    props: ['user_id'],

    data() {
        return {
            thread_title: '',
            edit: true
        }
    },

    methods: {
        createThread() {
            fetch("api/thread/store", {
                method: "post",
                body: {
                    thread_title: this.thread_title,
                    user_id: this.user_id
                },
                headers: {
                    'content-type': 'application/json'
                }
            })
            .then(res => res.json)
            .then(data => {
                this.thread_title = '';
                alert("it might have worked");
            })
            .catch(err => console.log(err));
        }
    }
}
</script>