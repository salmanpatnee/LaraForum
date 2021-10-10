<template>
    <button :class="classes"  @click="subscribe">Subscribe</button>
</template>

<script>
    export default {
        props:['active'], 

        computed:{
            classes(){
                return ['btn', this.active ? 'btn-default': 'btn-danger'];
            }
        },  

        methods:{
            subscribe(){
                let requestType = this.active ? 'delete' : 'post';

                axios[requestType](location.pathname + '/subscribe');

                this.active = !this.active;
            }
        }
    }
</script>