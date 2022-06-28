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
import Avatar from 'primevue/avatar';
import FileUpload from 'primevue/fileupload';
import Divider from 'primevue/divider';
import Checkbox from 'primevue/checkbox';
import Listbox from 'primevue/listbox';

// Import FilePond
import vueFilePond from 'vue-filepond';

// Import plugins
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.esm.js';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.esm.js';

// Import styles
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';

// Create FilePond component
const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginImagePreview);


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
app.component('p-avatar', Avatar);
app.component('p-file-upload', FileUpload);
app.component('p-divider', Divider);
app.component('p-checkbox', Checkbox);
app.component('p-listbox', Listbox);
app.component('file-pond', FilePond);


app.use(VueToast);
app.use(ConfirmationService);
app.use(store)
app.use(router)
app.mount('#app')