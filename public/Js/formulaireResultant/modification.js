$(function() {
    $('.retour').on('click', () => {
        document.location = "http://127.0.0.1:8000/reception"
    })

    $('.rechercheBtn').on('click', () => {
        let query = $('.rechercheText').val()
        let modificationUrl = "http://127.0.0.1:8000/getDemande"
        let localData

        if (query == "") {
            console.log("no thing")
        } else {
            $.get(modificationUrl, { demandeId: query }, (data) => {
                localData = data
            }).then(() => {
                console.log(localData)
                if (localData.success) {

                }
            })
        }

    })


})