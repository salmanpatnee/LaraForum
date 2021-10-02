<template>
    <button 
    :class="classes" 
    type="submit" @click="toggle">
        <span v-text="count"></span>
    </button>
</template>

<script>
export default {
    props: ['reply'], 

    data(){
        return{
            count: (this.reply.favoritesCount) ? this.reply.favoritesCount : 0, 
            active: this.reply.isFavorited
        }
    }, 

    computed: {
        classes(){
            return ['btn', this.active ? 'btn-primary' : 'btn-outline-primary']
        }, 
        endpoint(){
            return '/replies/'+this.reply.id+'/favorites';
        }
    }, 
    methods: {
        toggle(){
            !this.active ? this.favorite() : this.unfavorite();
        }, 
        favorite(){
            axios.post(this.endpoint);
            this.active = true;
            this.count++;
        }, 
        unfavorite(){
            axios.delete(this.endpoint);
            this.active = false;
            this.count--;
        }, 
    }
    
}
</script>
