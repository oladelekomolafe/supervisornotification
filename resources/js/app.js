import './bootstrap';

import { createApp } from 'vue';

import NotificationForm from './components/NotificationForm.vue';


const app = createApp({});

// registers our component globally
app.component('notification-form', NotificationForm);

// mount the app to the DOM
app.mount('#app');

/*const app = new createApp({
	el: '#app',
	components: { App }
});*/