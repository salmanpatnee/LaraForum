<script>
    import replies from '../Replies.vue';

    export default {
        props: ['initialRepliesCount'], 

        components: {replies}, 

        data(){
            return {
                repliesCount: this.initialRepliesCount
            };
        }
    }
</script>
