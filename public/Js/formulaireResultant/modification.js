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
                //console.log(localData)
                if (localData.demandeExist) {
                    let demande = localData.demande
                    let echantillons = localData.echantillons
                    let dateTime = demande.created_at.date.split(' ')
                    let date = dateTime[0]
                    let heure = dateTime[1].split('.')[0]
                    console.log(demande)
                    console.log(echantillons)
                } else {
                    let errorMessage = localData.message
                    console.log(errorMessage)
                }
            })
        }

    })

    $('#modificationBTNclass').on('click', () => {
        alert('Modification')
    })


})