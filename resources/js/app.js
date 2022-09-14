import './bootstrap';
import './theme_file.js';

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import router from './router/index.js';
import HeaderComponent from './components/HeaderComponent.vue';
import RouterComponent from './components/RouterComponent.vue';
import axios from 'axios';
//import ProgressbarComponent from "@/components/employee/form_progress_bar.vue"

const app = createApp({}); 
app.use(router);
app.component('HeaderComponent', HeaderComponent);
app.component('RouterComponent', RouterComponent);
//app.component('ProgressbarComponent', ProgressbarComponent);
app.mount('#app');