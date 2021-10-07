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
                    let i = 1
                    echantillons.forEach(element => {
                        $("#echantillonM").append(" <div class='col-md-2'><input class=' input ' id='ref" + i + "' type='text' class='input' value='" + element.reference_labo + "'></div><div class='col-md-2'><input type='text' class='input' id='design" + i + "' value='" + element.designation + "'></div><div class='col-md-8'><table><tr><td> <input type='checkbox' name='line" + (i) + "' value='A1'></td> <td><input type='checkbox' name='line" + (i) + "' value='A2'></td> <td><input type='checkbox' name='line" + (i) + "' value='A3'></td> <td><input type='checkbox' name='line" + (i) + "' value='A4'></td> <td><input type='checkbox' name='line" + (i) + "' value='A5'></td><td><input type='checkbox' name='line" + (i) + "' value='A6'></td><td><input type='checkbox' name='line" + (i) + "' value='A7'></td><td><input type='checkbox' name='line" + (i) + "' value='A8'></td><td><input type='checkbox' name='line" + (i) + "' value='A9'></td><td><input type='checkbox' name='line" + (i) + "' value='A10'></td><td><input type='checkbox' name='line" + (i) + "' value='A11'></td><td><input type='checkbox' name='line" + (i) + "' value='A12'></td><td><input type='checkbox' name='line" + (i) + "' value='A13'></td><td><input type='checkbox' name='line" + (i) + "' value='A14'></td><td><input type='checkbox' name='line" + (i) + "' value='A15'></td><td><input type='checkbox' name='line" + (i) + "' value='A16'></td><td><input type='checkbox' name='line" + (i) + "' value='A17'></td><td><input type='checkbox' name='line" + (i) + "' value='A18'></td><td><input type='checkbox' name='line" + (i) + "' value='19'></td><td><input type='checkbox' name='line" + (i) + "' value='A20'></td><td><input type='checkbox' name='line" + (i) + "' value='A21'></td><td><input type='checkbox' name='line" + (i) + "' value='A22'></td><td><input type='checkbox' name='line" + (i) + "' value='23'></td></tr></table></div>")
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
            'numeroDemande': $("#idDemande").text(),
            'indentificateur': $("#identificateur").val(),
            'etatEchantillon': $("#etat option:selected").val(),
            'casSolide': $('input[name=solide]:checked').val(),
            'echantillonage': $("#depotAfrilab option:selected").val(),
            'depot': $('input[name=depot]:checked').val(),
            'nombreEchantillon': $("#nombre option:selected").val(),
            'emplacement': $("#emplacement").val(),
        }
        let elementAnalyse = []
        let designations = []
        let references = []

        for (let j = 1; j <= tableauDemande['nombreEchantillon']; j++) {
            var elements = [];
            $.each($("input[name='line" + j + "']:checked"), function() {
                elements.push($(this).val());
            });
            designations[j] = $('#design' + j).val()
            references[j] = $('#ref' + j).text()
            elementAnalyse[j] = elements.join(";")
            console.log(designations[j])
            console.log(references[j])
            console.log(elementAnalyse[j])


        }
        console.log(" Designation ",designations)
        console.log("Reference ",references)
        console.log("els elements",elementAnalyse)
  
        let demandeUrl = "http://127.0.0.1:8000/demandeUpdate"
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
                numeroDemande: tableauDemande.numeroDemande,
            },
            (data) => {
                localData = data
            }).then(() => {
            if (localData.success) {
                let echantillonUrl = "http://127.0.0.1:8000/echantillonsUpdate";
                let demandId = $("#idDemande").text();
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
    $("#modification input").on("keypress", function() {
        console.log(1)
    })

})