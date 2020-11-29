<template>
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item" v-for="event in events"><router-link :to="{ name: 'places', params: {event_id: event.id}}">{{event.date}}</router-link></li>
        </ul>
    </div>
</template>
<script>
    import {mapActions} from 'vuex'
    export default {
        name: "EventComponent",
        data: function () {
            return {
                events:[]
            }
        },
        mounted(){
            this.event_load(this.event_id);
        },
        methods: {
            ...mapActions('event', ['event_request']),
            event_load: function() {
                this.event_request(this.$route.params.show_id).then(
                    (response)=>{
                        this.events = response;
                    },
                    (error)=>{
                        this.errors = JSON.parse(error.response.request.response).errors;
                    }
                );
            }
        }
    }
</script>
