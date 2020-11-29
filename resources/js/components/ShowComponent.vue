<template>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item" v-for="show in shows"><router-link :to="{ name: 'events', params: {show_id: show.id}}">{{show.name}}</router-link></li>
        </ul>
    </div>
</template>
<script>
    import {mapActions} from 'vuex'
    export default {
        name: "ShowComponent",
        data: function () {
            return {
                shows:[]
            }
        },
        mounted(){
            this.show_load();
        },
        methods: {
            ...mapActions('show', ['show_request']),
            show_load: function() {
                this.show_request().then(
                    (response)=>{
                        this.shows = response;
                    },
                    (error)=>{
                        this.errors = JSON.parse(error.response.request.response).errors;
                    }
                );
            }
        }
    }
</script>
