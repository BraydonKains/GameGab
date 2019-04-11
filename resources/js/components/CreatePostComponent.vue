<template>
<form @submit.prevent="addPost" class="mb-3">
    <h3>
        Write Post
    </h3>
    <div class="form-group">
        <textarea type="text" class="form-control" placeholder="Add to your post..." v-model="content"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
</form>
</template>

<script>
export default {
    props: ['user_id', 'thread_id'],

    data() {
        return {
            content: '',
            edit: true
        }
    },

    methods: {
        addPost() {
            fetch("../api/post/store", {
                method: "post",
                credentials: "same-origin",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    "content": this.content,
                    "thread_id": this.thread_id,
                    "user_id": this.user_id
                })
            })
            .then(res => {
                this.content = '';
                this.$emit("submitted");
            })
            .catch(err => console.log(err));
        }
    }
}
</script>