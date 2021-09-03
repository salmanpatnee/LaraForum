require('./bootstrap');


// Require Vue
window.Vue = require('vue').default;

// Register Vue Components
import flash from './components/Flash.vue';

// Initialize Vue
const app = new Vue({
    el: '#app',

    components:{
        'flash':flash
    }

});
