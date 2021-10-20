import { receteurLogin, receteurRegister, logout } from './receptorAuth/authentication.js'
$(".listElement ul").hide()
// $(".quitter").hide()
$("#layoutAppercue").hide()
// $('#solideOptions').hide();
$(function() {
    
    receteurLogin()
    receteurRegister()
    logout()

    $('.reception').click(() => {
        document.location = "http://127.0.0.1:8000/reception"
    })

});