<template>
    <div v-if="isLoaded">
        <button @click="incrementLike" class="btn btn-success mr-2">Likes: {{ qty }}</button>
    </div>
    <div v-else>
        Loading...
    </div>
</template>

<script>
    export default {
        props: {
            article: {
                required: true
            }
        },
        data() {
            return {
                qty: null,
                error: null,
                isLoaded: false
            }
        },
        mounted() {
            fetch(`/api/like/${this.article}`)
            .then(res => res.json())
            .then(res => {
                this.qty = res.result;
                this.isLoaded = true;
            });
        },
        methods: {
            incrementLike() {
                fetch('/api/like', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({'id': this.article})
                })
                .then(res => res.json())
                .then(res => this.qty = res.result);
            }
        }
    }
</script>
