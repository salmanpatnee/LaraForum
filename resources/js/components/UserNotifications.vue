<template>
    <div v-if="notifications.length">
        <li class="nav-item dropdown">
            <a id="notifications" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fa fa-bell" aria-hidden="true"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notifications">
                <div v-for="(notification, index) in notifications" :key="notification.id">
 <a  
                     
                    class="dropdown-item" 
                    v-text="notification.data.message" :href="notification.data.link"
                    @click="markAsRead(notification.id)"
                    >
                    
                </a>
                </div>
               
            </div>
        </li>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                notifications: false
            }
        }, 
        created(){
            this.fetch();
        }, 

        methods:{
            fetch(){
                axios.get('/profiles/'+window.App.user.name+'/notifications')
                .then(response => this.notifications = response.data);
            }, 

            markAsRead(notificationId){
                axios.delete('/profiles/'+window.App.user.name+'/notifications/'+notificationId);
            }
        }
         
    }
</script>
