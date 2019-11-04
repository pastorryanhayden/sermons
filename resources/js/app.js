require('./bootstrap');

var Turbolinks = require("turbolinks")
Turbolinks.start()

document.addEventListener("turbolinks:load", function() {
const usermenu = document.querySelector('#usermenu');
hideMenu = () => {
   usermenu.classList.add('hidden');
}
showMenu = () => {       
   usermenu.classList.remove('hidden');
}


});