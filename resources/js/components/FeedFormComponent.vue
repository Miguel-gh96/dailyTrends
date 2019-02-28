<template>
    <div class="column">
        <b-field label="Título">
            <b-input v-model="feed.title"></b-input>
        </b-field>
        <b-field label="Publicado Por">
            <b-input v-model="feed.publisher"></b-input>
        </b-field>
            <b-field label="Fuente">
            <b-input v-model="feed.source"></b-input>
        </b-field>
        <b-field label="Imágen">
            <b-input v-model="feed.image"></b-input>
        </b-field>
        <b-field label="Cuerpo">
            <b-input v-model="feed.body" type="textarea"></b-input>
        </b-field>
    </div>
</template>
<script>
    export default {
        props: {
            feed: Object    
        },
        data() {      
            return {

            }
        },
        mounted() {
        }
    }
</script>   