<template>
    <div :id="'reply-'+data.id" class="row">
        <div class="col-sm-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>
                            <a :href="'/profiles/'+data.owner.name" v-text="data.owner.name"> </a> said <span v-text="ago"></span>
                        </h5>
                       
                        <div v-if="signedIn">
                            <favorite :reply="data"></favorite>    
                        </div>           
                    </div>
                </div>
                <div class="card-body">
                    <div v-if="editing">
                        <div class="form-group">
                            <textarea class="form-control" v-model="body"></textarea>
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-primary btn-sm mr-2" @click="update">Update</button>
                            <button class="btn btn-link btn-sm" @click="editing = false">Cancle</button>
                        </div>
                    </div>
                    <div v-else>
                        <p class="card-text" v-text="body"></p>
                    </div>
                    
                </div>
                <div v-if="canUpdate">
                    <div class="card-footer text-muted d-flex">
                        <button class="btn btn-primary btn-sm mr-2" @click="editing = true">Edit</button>
                        <button class="btn btn-danger btn-sm mr-2" @click="destroy">Delete</button>
                    </div>    
                </div>
                
            </div>
        </div>
    </div>
</template>

<script>
import Favorite from './Favorite.vue';
import moment from 'moment';

export default {
    props: ['data'], 

    components: {Favorite}, 

    data(){
        return{
            editing: false, 
            body: this.data.body
        }
    }, 
    computed:{
        ago(){
            return moment(this.data.created_at).fromNow()
        }, 
        signedIn(){
            return window.App.signedIn;
        }, 
        canUpdate(){
            return this.authorize(user => this.data.user_id == user.id);
        }
    }, 

    methods: {
        update(){
            axios.patch('/replies/' + this.data.id, {
                body: this.body
            })
            .catch(error => {
                console.log('ERROR: ' + error.response.data)
            });

            this.editing = false;
        }, 
        destroy(){
            axios.delete('/replies/' + this.data.id);

            this.$emit('deleted', this.data.id);
            
        }
    }
    
}
</script>
