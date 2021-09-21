import { receteurLogin, receteurRegister, logout } from './receptorAuth/authentication.js'

$(function() {
    receteurLogin()
    receteurRegister()
    logout()

    $('.reception').click(() => {
        document.location = "http://127.0.0.1:8000/reception"
    })




    let tabs = document.querySelectorAll(".tab-link:not(.desactive)");
    tabs.forEach((tab) => {
        tab.addEventListener("click", () => {
            unSelectAll();
            tab.classList.add("active");
            let ref = tab.getAttribute("data-ref");
            document
                .querySelector(`.tab-body[data-id="${ref}"]`)
                .classList.add("active");
        });
    });

    function unSelectAll() {
        tabs.forEach((tab) => {
            tab.classList.remove("active");
        });
        let tabbodies = document.querySelectorAll(".tab-body");
        tabbodies.forEach((tab) => {
            tab.classList.remove("active");
        });
    }

    document.querySelector(".tab-link.active").click();

});