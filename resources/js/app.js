import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();

import Echo from "laravel-echo";

window.io = require("socket.io-client");
window.Echo = new Echo({
    broadcaster: "socket.io",
    host: window.location.hostname + ":" + window.laravel_echo_port,

});

