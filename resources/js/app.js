import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import AddAnnounceButton from './components/AddAnnounceButton.vue';
app.component('add-announce-button', AddAnnounceButton);

app.mount('#app');
