<template>
    <div>
        <div v-if="signedIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <textarea 
                            class="form-control" 
                            id="body" name="body" 
                            rows="3" 
                            placeholder="Add comment" 
                            required 
                            v-model="body">
                        </textarea>
                    </div>
                    <button 
                        type="submit" 
                        class="btn btn-primary" 
                        @click="addReply">
                        Reply
                    </button>
                </div>
            </div>
        </div>
        <div v-else>
            <p class="text-center">
                <a href="/login">Sign in</a> to participate into the discussion.
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props:['endpoint'], 

    data(){
        return{
            body: ''
        }
    }, 
    computed:{
         signedIn(){
            return window.App.signedIn;
        }, 
    }, 
    methods:{
        addReply(){
            axios.post(this.endpoint, {body: this.body})
                .then((response) => {
                    this.body = '';

                    flash('Your reply has been added.');

                    this.$emit('created', response.data);
                })
        }
    }
}
</script>