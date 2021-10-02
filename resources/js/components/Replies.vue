<template>
    <div>
        <div v-for="(reply, index) in replies" :key="reply.id" >
            <reply :data="reply" @deleted="remove(index)"></reply>
        </div>

        <Paginator :data="dataset" @changed="fetch"></Paginator>

        <new-reply :endpoint="endpoint" @created="add"></new-reply>

        
    </div>    
</template>

<script>
import Reply from './Reply.vue';
import NewReply from './NewReply.vue';
import Paginator from './Paginator.vue';

export default {


    components: {Reply, NewReply, Paginator}, 

    data(){
        return{
            dataset: false,
            replies: []
        }
    }, 

    created(){
        this.fetch();
    }, 

     computed:{
         getThreadId(){
            return location.pathname.split('/').pop();
         },

         endpoint(){
            return '/threads/' +this.getThreadId+ '/replies';
        } 
    }, 
    
    methods: {
        url(page){
            if(!page) {
                let query = location.search.match(/page=(\d+)/);
                page = query ? query[1] : 5;
            }

            return '/threads/null/' +this.getThreadId+ '/replies?page='+page;
        }, 

        fetch(page){
            axios.get(this.url(page))
                .then(this.refresh);
        }, 
        refresh(response){
            this.dataset = response.data;
            this.replies = response.data.data;
        }, 

        add(reply){
            this.replies.push(reply);

            this.$emit('added');
        }, 

        remove(index){
            this.replies.splice(index, 1);

            flash('Reply deleted');
            
            this.$emit('removed');
        }
    }

}
</script>
