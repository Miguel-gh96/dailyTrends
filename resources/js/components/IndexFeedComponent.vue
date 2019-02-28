<template>
    <section>
        <div class='navbar'>
            <button @click='onCreate' class="button is-info">Crear</button>
        </div>
        <b-table
            :data="feeds"
            :loading="loading"
            :striped="isStriped"
            :hoverable="isHoverable"
            >                    
            <template slot-scope="props">
                <b-table-column field="title" label="Título" sortable>
                    {{ props.row.title }}
                </b-table-column>

                <b-table-column field="publisher" label="Publicado Por" sortable>
                    <span class="">
                        {{ props.row.publisher }}
                    </span>
                </b-table-column>

                <b-table-column field="created_at" label="Fecha de Alta"  sortable centered>
                    {{ props.row.created_at ? new Date(props.row.created_at).toLocaleDateString() : '' }}
                </b-table-column>

                <b-table-column field="updated_at" label="Fecha de Actualización" sortable centered>
                    {{ props.row.updated_at ? new Date(props.row.updated_at).toLocaleDateString() : '' }}
                </b-table-column>
                <b-table-column field="action" label="Action">                    
                    <button @click="onEdit(props.row.id)" class="button is-warning"> 
                        Edit
                    </button>
                    <button @click="onDelete(props.row.id)" class="button is-danger">
                        Del
                    </button>
                </b-table-column>
            </template>
        </b-table>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                isStriped: true,
                isHoverable: true,
                feeds: [],
                sortField: 'created_at',
                sortOrder: 'desc',
                defaultSortOrder: 'desc',
                loading: false,
            }
        },
        mounted() {
            this.loadAsyncData()
        },
        methods: { 
            loadAsyncData() {
                this.loading = true;
                let uri = '/api/feed';  

                this.axios.get(uri).then(
                    response => {                        
                        this.feeds = response.data.data;                            
                        this.loading = false;
                        },
                        error => {
                            console.error(error);   
                        }
                );
            },
            onCreate() {
                this.$router.push({name: 'CreateFeed'});
            },
            onEdit(id) {
                this.$router.push({ path: `/dashboard/edit/${id}` })
            },
            onDelete(id) {
                let uri = `/api/feed/${id}`;
                this.axios.delete(uri).then(response => {
                    this.feeds = this.feeds.filter((feed) => { return feed.id != id});
                });
            }
        }
    }
</script>   