import './bootstrap';
import { createApp } from 'vue';
import App from './components/App.vue';
import router from './router';

window.api_url = 'http://localhost:8000/api/';
createApp(App).use(router).mount('#app');
