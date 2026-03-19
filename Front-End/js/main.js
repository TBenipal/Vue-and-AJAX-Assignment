import {createApp} from 'vue';

const myApp = createApp({
    data() {
        return {
            message: "Hello Vue World"
        }
    }
}).mount("#app");