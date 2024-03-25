import './bootstrap';
import { createApp } from 'vue';
import AddAnnounceButton from './components/AddAnnounceButton.vue';
import ShowAnnouncements from './components/ShowAnnouncements.vue';

const app = createApp({});

app.component('add-announce-button', AddAnnounceButton);
app.component('show-announcements', ShowAnnouncements);

app.mount('#app');
