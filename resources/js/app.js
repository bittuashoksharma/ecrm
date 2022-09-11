import './bootstrap';
import './theme_file.js';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import router from './router/index.js';
import HeaderComponent from './components/HeaderComponent.vue';
import RouterComponent from './components/RouterComponent.vue';


const app = createApp({}); 
app.use(router);
app.component('HeaderComponent', HeaderComponent);
app.component('RouterComponent', RouterComponent);
app.mount('#app');