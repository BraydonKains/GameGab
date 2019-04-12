<template>
<form @submit.prevent="createThread" class="mb-3">
    <h3>
        Create Thread
    </h3>
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Title" v-model="thread_title">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Create Thread</button>
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
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    "thread_title": this.thread_title,
                    "user_id": this.user_id
                })
            })
            .then(res => {
                console.log(res);
                this.thread_title = '';
                this.$emit("submitted");
            })
            .catch(err => console.log(err));
        }
    }
}
</script>