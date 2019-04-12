<style>
.gif-container {
    margin-top: 30px;
    display: flex;
    flex-direction: column;
    align-items: center;
}
</style>
<template>
<div>
    <input type="text" v-model="search">
    <div >
        <img v-for="gif in gifs" :src="gif" :key="gif.id">
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            search: '',
            gifs: [],
            gif: {
                id: ''
            }
        }
    },

    methods: {
        buildGifs(json) {
            this.gifs = json.data
            .map(gif => gif.id)
            .map(gifId => {
            return `https://media.giphy.com/media/${gifId}/giphy.gif`;
            });
        }
    },

    watch: {
        search: function() {
            let apiKey = "nYQNPpAixuVqNPSYjOdhQAAS4oP1Q9rS";
            let searchEndPoint = "https://api.giphy.com/v1/gifs/search?";
            let limit = 5;

            let url = `${searchEndPoint}&api_key=${apiKey}&q=${
                this.search
            }&limit=${limit}`;

            fetch(url)
            .then(response => {
                return response.json();
            })
            .then(json => {
                this.buildGifs(json);
            })
            .catch(err => {
                console.log(err);
            });
        }
    }
}
</script>