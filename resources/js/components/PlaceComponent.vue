<template>
    <div class="container">
        <ul class="list-group">
            <!--<li class="list-group-item" v-for="place in places"><router-link :to="{ name: 'places', params: {place_id: place.id}}">{{place.date}}</router-link></li>-->
        </ul>
    </div>
</template>
<script>
    import {mapActions} from 'vuex'
    export default {
        name: "PlaceComponent",
        data: function () {
            return {
                places:[]
            }
        },
        mounted(){
            this.place_load(this.$route.params.event_id);
        },
        methods: {
            ...mapActions('places', ['places_request']),
            place_load: function(event_id) {
                this.places_request(event_id).then(
                    (response)=>{
                        this.places = response;
                    },
                    (error)=>{
                        this.errors = JSON.parse(error.response.request.response).errors;
                    }
                );
            }
        }
    }
</script>
