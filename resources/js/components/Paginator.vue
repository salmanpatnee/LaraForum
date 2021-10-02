<template>
    <div>
        <ul v-if="shouldPaginate" class="pagination">
            <li v-show="prevUrl" class="page-item">
            <a class="page-link" href="#" aria-label="Previous" @click.prevent="page--">
                <span aria-hidden="true">&laquo; Previous</span>
                <span class="sr-only">Previous</span>
            </a>
            </li>
            <li v-show="nextUrl" class="page-item">
            <a class="page-link" href="#" aria-label="Next" @click.prevent="page++">
                <span aria-hidden="true">Next &raquo;</span>
                <span class="sr-only">Next</span>
            </a>
            </li>
        </ul>
    </div>    
</template>

<script>

export default {
    props: ['data'],

    data(){
        return{
            page: 1, 
            prevUrl: false, 
            nextUrl: false
        }
    }, 

    watch:{
        data(){
            this.page = this.data.current_page;
            this.prevUrl = this.data.prev_page_url;
            this.nextUrl = this.data.next_page_url;
        }, 
        page(){
            this.broadcast().updateUrl();
        }
    },  

     computed:{
         shouldPaginate(){
            return !! this.prevUrl || !! this.nextUrl; 
         }
    }, 
    
    methods: {
        broadcast(){
            return this.$emit('changed', this.page);
        }, 
        updateUrl(){
            history.pushState(null, null, '?page=' + this.page);
        }
    }

}
</script>
