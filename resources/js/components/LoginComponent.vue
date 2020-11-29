<template>
    <div>
        <div class="alert alert-danger" v-for="err in errors">
            <p>{{err[0]}}</p>
        </div>
        <form autocomplete="off" @submit.prevent="login" method="POST">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" v-model="password" required>
            </div>
            <button type="submit" class="btn btn-default">Sign in</button>
        </form>
    </div>
</template>

<script>
    import {mapActions, mapState} from 'vuex'
    export default {
        name: "LoginComponent",
        data: function () {
            return {
                email:'',
                password:'',
                errors:[]
            }
        },
        methods: {
            ...mapActions('auth', ['auth_request']),
            login: function() {
                let email = this.email;
                let password = this.password;
                this.auth_request({email, password}).then(
                    (response)=>{
                        this.$router.push('/shows');
                    },
                    (error)=>{
                        //this.errors = JSON.parse(error.response.request.response).errors;
                    }
                );
            }
        }

    }
</script>

<style scoped>

</style>