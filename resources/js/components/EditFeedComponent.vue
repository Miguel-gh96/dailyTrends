<template>
    <section>
        <form @submit.prevent="updateFeed">        
            <feed-form v-bind:feed="feed"></feed-form>
            <div class="column">
                <button @click="onCancel" class='button is-danger'>Cancelar</button>
                <button class='button is-success'>  
                    <b-icon
                        pack="fas"
                        icon="sync-alt"
                        custom-class="fa-spin">
                    </b-icon>
                    <span>Guardar</span>
                </button>
            </div>
        </form>
    </section>
</template>

<script>
    import FeedForm from './FeedFormComponent.vue'
    
    export default {
        components: {
            FeedForm
        },
        data() {
            return {
                feed: {}
            }            
        },
        mounted() {
            let uri = `/api/feed/${this.$route.params.id}/edit`;
            this.axios.get(uri).then((response) => {
                this.feed = response.data;
            });
        },
        methods: {
            updateFeed() {
                let uri = `/api/feed/${this.$route.params.id}`;
                this.axios.put(uri, this.feed).then((response) => {
                    this.$router.push({name: 'IndexFeed'});
                });
            },
            onCancel() {
                this.$router.push({name: 'IndexFeed'});
            }
        }
    }
</script>   