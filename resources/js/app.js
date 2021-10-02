require('./bootstrap');



import Vue from 'vue';
// Register Vue Components
import flash from './components/Flash.vue';
import thread from './components/pages/Thread.vue';


// Initialize Vue
const app = new Vue({
    el: '#app',

    components:{
        'flash':flash, 
        'thread-view':thread, 
    }

});


window.events = new Vue();

window.flash = function(message){
    window.events.$emit('flash', message);
};