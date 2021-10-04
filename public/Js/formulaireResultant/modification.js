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
            $("#errorMessage").text("Veillez entrer un numero de demande")
        } else {
            $.get(modificationUrl, { demandeId: query }, (data) => {
                localData = data
            }).then(() => {
                //console.log(localData)
                if (localData.demandeExist) {
                    let demande = localData.demande
                    let echantillons = localData.echantillons
                    
                    //*********remplissage des champs demande**************
                       $("#demandeur").val(demande.demandeur)
                        $("#societe").val(demande.society),
                        $("#numDemande").val(demande.demand_id),
                        $("#identificateur").val(demande.identification_echantillon),
                        $("#emplacement").val(demande.Emplacement)
                        $("#idDemande").text(demande.demand_id)
                        $("#errorMessage").hide()
                        //******************echantillons***************/
                        console.log(echantillons)
                        let i=1
                        echantillons.forEach(element => {
                            $("#echantillonM").append(" <div class='col-md-4'><input class=' input ' id='ref" + i+"' type='text' class='input' value='"+element.reference_labo+"'></div><div class='col-md-4'><input type='text' class='input' id='design"+i+"' value='"+element.designation+"'></div><div class='col-md-4'><input id='element"+i+"' type='text' class='input' value='"+element.elements_d_analyse+"'></div>")
                              i++                             
                        });
                } else {
                    let errorMessage = localData.message
                    console.log(errorMessage)
                    $("#errorMessage").show().fadeIn(500)
                    $("#errorMessage").text(errorMessage)
                }
            })
        }

    })

    $('#modificationBTNclass').on('click', () => {
                let tableauDemande = {
                    'nomDemandeur': $("#demandeur").val(),
                    'societe': $("#societe").val(),
                    'numeroDemande': $("#numDemande").val(),
                    'indentificateur': $("#identificateur").val(),
                    'etatEchantillon': $("#etat option:selected").val(),
                    'casSolide': $('input[name=solide]:checked').val(),
                    'echantillonage': $("#depotAfrilab option:selected").val(),
                    'depot': $('input[name=depot]:checked').val(),
                    'nombreEchantillon': $("#nombre option:selected").val(),
                    'emplacement': $("#emplacement").val(),
                }
                console.log(tableauDemande)
                let elementAnalyse = []
                let designations = []
                let references = []
    
    
                for (let j = 1; j <= tableauDemande['nombreEchantillon']; j++) {
                    designations[j] = $('#design' + j).val()
                    references[j] = $('#ref' + j).val()
                    elementAnalyse[j] = $('#element' + j).val()
                }
                // console.log(designations)
                // console.log(references)
                // console.log(elementAnalyse)
    
                let demandeUrl = "http://127.0.0.1:8000/demande"
                let localData
                $.get(
                    demandeUrl, {
                        demand: tableauDemande.nomDemandeur,
                        societe: tableauDemande.societe,
                        emplacement: tableauDemande.emplacement,
                        etat: tableauDemande.etatEchantillon,
                        identification_echantillon: tableauDemande.indentificateur,
                        echantillonnage: tableauDemande.echantillonage,
                        depot: tableauDemande.depot,
                        etatSolid: tableauDemande.casSolide,
                        nombreEchantillons: tableauDemande.nombreEchantillon,
                        numeroDemande: tableauDemande.numeroDemande,
                    },
                    (data) => {
                        localData = data
                    }).then(() => {
                    // let demandeId = localData.demande.demand_id
                    if (localData.demandAlreadyExist) {
                        //numero de mande existant
                    } else {
                        if (localData.success) {
                            let echantillonUrl = "http://127.0.0.1:8000/echantillons";
                            let demandId = localData.demande.demand_id
                            for (let i = 1; i <= designations.length; i++) {
                                let forLocalData
                                $.get(echantillonUrl, {
                                    designation: designations[i],
                                    reference: references[i],
                                    elementAnalyse: elementAnalyse[i],
                                    demandId: demandId
                                }, (data) => {
                                    forLocalData = data
                                }).then(() => {
                                    console.log(forLocalData);
                                })
                            }
                        }
                    }
                })
            
        
    })
    $("select").change(function() {
        var str = "";
        $("#etat option:selected").each(function() {
            str = $(this).text();
            if (str == "Solide") {
                $('#solideOptions').css({
                    "visibility": "visible"
                }).show()
            } else {
                $('#solideOptions').css({
                    "visibility": "hidden"
                }).hide()
            }
        });
    }).change();

    $("select").change(function() {
        var str = "";
        $("#depotAfrilab option:selected").each(function() {
            str = $(this).text();
            if (str == "AFRILAB") {
                console.log(" AfriLab depot ")
                $('#depotoire').css({
                    "visibility": "visible"
                }).show()
            } else {
                $('#depotoire').css({
                    "visibility": "hidden"
                }).hide()
            }
        });
    }).change();
     

    //********************************** */
    $("#modification input").on( "keypress", function () {
        console.log(1)
    } )
   
})