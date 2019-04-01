

<script>
export default {
    data() {
        return {
            threads: [],
            thread: {
                id: '',
                title: '',
                creator: ''
            },
            thread_id: '',
            pagination: {},
            edit: false
        }
    },

    created() {
        this.fetchThreads();
    },

    methods: {
        fetchThreads() {
            fetch("api/threads")
                .then(res => json())
                .then(res => {
                    console.log(res.data);
                })
        }
    }
}
</script>