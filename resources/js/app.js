import './bootstrap';

import {createApp} from 'vue';

import AppComp from './components/App.vue';
import VueAxios from 'vue-axios';
import router from './routes';
import VPagination from "@hennge/vue3-pagination";
import "@hennge/vue3-pagination/dist/vue3-pagination.css";

const app = createApp(AppComp)
app.use(router)
app.use(VueAxios, axios)
app.component('v-pagination', VPagination);
app.mount("#app")