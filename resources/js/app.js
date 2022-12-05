import './bootstrap';

import { createApp } from 'vue';
import store from "./store";
import App from './App.vue';

createApp({
    components: {
        App,
    },
}).use(store).mount('#app');