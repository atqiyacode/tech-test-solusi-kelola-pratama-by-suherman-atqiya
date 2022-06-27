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

import Button from 'primevue/button';
import Card from 'primevue/card';
import InputText from 'primevue/inputtext';
import Password from 'primevue/password';
import ConfirmDialog from 'primevue/confirmdialog';
import Dropdown from 'primevue/dropdown';
import ScrollPanel from 'primevue/scrollpanel';


const app = createApp(App);

app.config.productionTip = false

app.use(PrimeVue, { ripple: true });
app.component('p-confirm-dialog', ConfirmDialog);
app.component('p-button', Button);
app.component('p-card', Card);
app.component('p-input-text', InputText);
app.component('p-password', Password);
app.component('p-dropdown', Dropdown);
app.component('p-scroll-panel', ScrollPanel);


app.use(VueToast);
app.use(ConfirmationService);
app.use(store)
app.use(router)
app.mount('#app')