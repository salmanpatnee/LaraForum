<script>
    import replies from '../Replies.vue';
    import subscribeButton from '../SubscribeButton.vue';

    export default {
        props: ['initialRepliesCount'], 

        components: {replies, subscribeButton}, 

        data(){
            return {
                repliesCount: this.initialRepliesCount
            };
        }
    }
</script>
