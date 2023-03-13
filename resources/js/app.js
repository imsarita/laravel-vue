import './bootstrap';

import {createApp} from 'vue';

import App from './components/App.vue';
import VueAxios from 'vue-axios';
import router from './routes';

createApp(App)
.use(router)
.use(VueAxios, axios)
.mount("#app")