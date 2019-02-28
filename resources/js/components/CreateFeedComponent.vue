<template>
    <section>
        <form @submit.prevent="createFeed">        
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
        },
        methods: {
            createFeed() {
                let uri = `/api/feed`;
                this.axios.post(uri, this.feed).then((response) => {
                    this.$router.push({name: 'IndexFeed'});
                });
            },
            onCancel() {
                this.$router.push({name: 'IndexFeed'});
            }
        }
    }
</script>   