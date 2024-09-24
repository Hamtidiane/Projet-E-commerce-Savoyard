import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'

import Toast, { POSITION } from 'vue-toastification';
import 'vue-toastification/dist/index.css';

const app = createApp(App)

// Configurez vue-toastification
app.use(Toast, {
    position: POSITION.TOP_RIGHT, // Position des notifications
});

app.use(createPinia())
app.use(router)

app.mount('#app')
