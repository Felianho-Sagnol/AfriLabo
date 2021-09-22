export function receteurLogin() {
    let url = "http://127.0.0.1:8000/isLoggedIn"
    let localData

    $.get(url, (data) => {
        localData = data
    }).then(() => {
        if (!localData.isLoggedIn) {
            console.log('not logged in')
            $('.formReception').hide().delay(50).show(200);
            $('.toHide').css({
                "filter": "blur(5px)",
                "cursor": "wait"
            });
            $('.connexion').click(function() {
                let name = $('#conncexionName').val()
                let password = $('#connexionPassword').val()
                let nameError = false
                let passwordError = false
                if (name.length <= 2) nameError = true
                if (password.length < 6) passwordError = true
                console.log("name " + name)

                if (nameError || passwordError) {
                    //affichage
                    console.log('une grave erreur')
                } else {
                    let url = "http://127.0.0.1:8000/login"
                    let localData
                    let status
                    $.get(url, { name: name, password: password }, (data) => {
                        localData = data
                    }).then(() => {
                        console.log(localData)
                        status = localData.success
                        if (status) {
                            $('.formReception').hide(100);
                            $('.toHide').css({
                                "filter": "blur(0px)",
                                "cursor": "auto"
                            });
                        } else {
                            console.log('Aucun compte trouvé pour ce recepteur')
                        }
                    })

                }
            });
        } else {
            $('.formReception').hide(0);
            $('.toHide').css({
                "filter": "blur(0px)",
                "cursor": "auto"
            });
        }
    })
}

export function receteurRegister() {
    $('.inscription').click(function() {
        let name = $('#registerName').val()
        let password = $('#registerPassword').val()
        let passwordConfirm = $('#registerPasswordComfirm').val()
        let nameError = false
        let passwordError = false
        if (name.length <= 2) nameError = true
        if (password.length < 6) passwordError = true
        if (passwordConfirm.length < 6) passwordError = true

        if (nameError || passwordError) {
            //affichage
            console.log('une grave erreur')
        } else {
            let status
            let comfirmErorStatus
            let url = "http://127.0.0.1:8000/register"
            let localData
            $.get(url, { name: name, password: password, comfirmPassword: passwordConfirm }, (data) => {
                localData = data
            }).then(() => {
                status = localData.success
                comfirmErorStatus = localData.comfirmError
                if (status) {
                    $('.formReception').hide();
                    $('.toHide').css({
                        "filter": "blur(0px)",
                        "cursor": "auto"
                    });
                    receteurLogin()
                }
                if (comfirmErorStatus) {
                    //affichage de l'erreur sans compte
                    console.log('les deux pawword ne sont pas identiques.')
                }
            })

        }
    });
}

export function logout() {
    let url = "http://127.0.0.1:8000/logout"
    $('.logout').click(() => {
        $.get(url, () => {
            document.location = "http://127.0.0.1:8000"
        })
    })
}