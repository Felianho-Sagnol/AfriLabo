// import { getDemandeInformations} from './reception.js.js'

const { dump } = require("laravel-mix")

// // getDemandeInformations()
$(function(){
    $('.retour').click(() => {
        document.location = "http://127.0.0.1:8000/reception"
    })


})
