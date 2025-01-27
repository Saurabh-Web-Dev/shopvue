import './bootstrap';
import { createApp } from 'vue';
import App from './components/App.vue';
import router from './router';

window.api_url = 'http://127.0.0.1:8000/api/';
createApp(App).use(router).mount('#app');
