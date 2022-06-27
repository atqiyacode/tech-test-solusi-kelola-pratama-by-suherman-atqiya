import { createApp } from 'vue'
import VueToast from 'vue-toast-notification';
import PrimeVue from 'primevue/config';
import ConfirmationService from 'primevue/confirmationservice';

import App from './App.vue'
import router from './router'
import store from './store'

import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'

import 'primevue/resources/themes/saga-green/theme.css';
import 'primevue/resources/primevue.min.css';
import 'primeicons/primeicons.css';

import 'vue-toast-notification/dist/theme-sugar.css';


const app = createApp(App);

app.config.productionTip = false

app.use(PrimeVue, { ripple: true });

app.use(VueToast);
app.use(ConfirmationService);
app.use(store)
app.use(router)
app.mount('#app')