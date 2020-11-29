<template>
    <div>
        <div class="alert alert-danger" v-for="err in errors">
            <p>{{err[0]}}</p>
        </div>
        <form autocomplete="off" @submit.prevent="reg" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" v-model="name" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" class="form-control" v-model="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" v-model="password" required>
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" id="password_confirmation" class="form-control" v-model="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</template>
<script>
    import {mapActions, mapMutations} from 'vuex'
    export default {
        name: "RegisterComponent",
        data(){
            return {
                name: '',
                email: '',
                password: '',
                password_confirmation:'',
                errors: {},
            };
        },
        methods: {
            ...mapActions('registration', ['registration_request']),
            ...mapMutations('auth', ['AUTH_SUCCESS']),
            reg(){
                this.registration_request({email: this.email, password: this.password, name: this.name, password_confirmation: this.password})
                    .then(
                        (response)=>{
                            this.AUTH_SUCCESS(response);
                            this.$router.push('/shows');
                        },
                        (error)=>{
                            console.log("error", error);
                            this.errors = JSON.parse(error.response.request.response).errors;
                        }
                    )
            }
        }
    }
</script>

<style scoped>

</style>