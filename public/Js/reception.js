import { getDemandeEchantillonsInfos } from "./layoutJs/popupController.js"

function redBox(idElement) {
    if ($(idElement).val() == "") {
        console.log("le  dchampemandeur est vide")
        $(idElement).css({ "box-shadow": "0px 0px 10px red" })
        setTimeout(() => {
            $(idElement).css({ "box-shadow": "0px 0px 0px black" })
        }, 5000);
        return true
    }
    return false
}

function redOnly(idElement) {

}
$(function() {


    function getDemandeInformations() {
        $('.registerBTN').on('click', () => {
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
                var elements = [];
                $.each($("input[name='line" + j + "']:checked"), function() {
                    elements.push($(this).val());
                });
                designations[j] = $('#design' + j).val()
                references[j] = $('#ref' + j).text()
                elementAnalyse[j] = elements.join("; ")
            }
            console.log(designations)
            console.log(references)
            console.log(elementAnalyse)

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
                let demandeId = localData.demande.demand_id
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
                console.log("start")
                getDemandeEchantillonsInfos(demandeId)
            }).then(() => {
                if (localData.success) {
                    let demande = localData.demande
                    console.log(localData)

                    let dateTime = demande.created_at.date.split(' ')
                    let date = dateTime[0]
                    let heure = dateTime[1].split('.')[0]
                        //remplissage du pop
                    $('#NoDemandePop').text(demande.demand_id)
                    $('#societePop').text(demande.society)
                    $('#NomDemandeurPop').text(demande.demandeur)
                    $('#numEch').text(demande.nombre_echantillons)
                    $('#recepteur').text(localData.recepteur)
                    $('#date').text(date)
                    $('#heure').text(heure)
                        //affichage du popup resultant 
                    $('#popup').css({
                        "visibility": "visible",
                        "tansform": "translateY(500px)"
                    }).hide().delay().show()
                    $('table,.tab1,.autre').css({
                        "filter": "blur(5px)",
                        "cursor": "wait"
                    });
                    $('.registerBTN,.annuler').hide()

                    //btn validation
                    $('.valide').on('click', function() {
                        document.location = "http://127.0.0.1:8000/reception"
                    })

                    //btn nonvalidation
                    $('.nonValider').on('click', function() {
                        $('#popup').css({
                            "visibility": "hidden",
                        }).hide()
                        $('table,.tab1,.autre').css({
                            "filter": "blur(0px)",
                            "cursor": "pointer"
                        });
                        $('.registerBTN,.annuler').show()

                        let deleteUrl = "http://127.0.0.1:8000/deleteDemande"
                        let demandId = localData.demande.demand_id
                        $.get(deleteUrl, { demandeId: demandId }, (data) => {
                            console.log(data)
                        })
                        $('.headBar').css({
                            "filter": "blur(0px)"
                        })
                    })



                    $('#reinitialiser').on('click', function() {
                        document.location = "http://127.0.0.1:8000/reception"
                    })
                } else {
                    console.log("Error demand already exist")
                }
            })
            $('.headBar').css({
                "filter": "blur(5px)"
            })
        })
    }



    $(function() {
        let errorDemande = false
        getDemandeInformations();
        let max
        let echNumber;
        let i;
        max = 1
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
        //------------------------------------------------------
        $("#nombre").change(function() {
            $("#ref1").text("R/" + $('#numDemande').val() + "_2021_1")
                //les verification
            if ($(" #nombre option:selected").val() != 1) {
                //--------------------------------sur le champ demandeur-----------
                errorDemande = redBox("#demandeur")
                    //--------------------------------sur le champ societe-----------
                errorDemande = redBox("#societe")
                    //--------------------------------sur le champ identificateur-----------
                errorDemande = redBox("#identificateur")
                    //--------------------------------sur le champ numero de demande-----------
                errorDemande = redBox("#numDemande")
                    //--------------------------------sur le champ numero de Etat de l'echantillon-----------
                if ($("#etat option:selected").val() == "") {
                    errorDemande = redBox("#etat")

                } else if ($("#etat option:selected").val() == "solide") {
                    let vari = "vide "
                    vari = vari + "autre" + $('input[name=solide]:checked').val()
                    console.log("option solide " + vari)
                        // if ($('input[name=solide]:checked').val()=="") {
                        //     console.log("l'etat est solide sans  ")
                        //     errorDemande=redBox('#solideOptions option')

                    // }

                }
                if ($("#depotAfrilab option:selected").val() == "") {
                    errorDemande = redBox("#depotAfrilab")
                }
            }

            //-----------------------------------------------

            if (!errorDemande) {
                $(" #nombre option:selected").each(function() {
                    echNumber = +$(this).val();
                    if (echNumber < max) {
                        for (let i = echNumber + 1; i <= max; i++) {
                            let idEmp = "#" + i
                        }
                    } else {

                        let numDemande = $('#numDemande').val()
                        for (i = 1; i <= echNumber; i++) {
                            if (i != max && i > max) {
                                console.log("max et i sont differents Max est: " + max + " et i est :" + i + " en plus " + i + ">" + max)
                                $("table").append("<tr><td  class='elementscar'><input id='design" + (i) + "'type='text' placeholder='Designation'></td> <td id='ref" + (i) + "'>R/" + numDemande + "_2021_" + (i) + "</td> <td> <input type='checkbox' name='line" + (i) + "' value='A1'></td> <td><input type='checkbox' name='line" + (i) + "' value='A2'></td> <td><input type='checkbox' name='line" + (i) + "' value='A3'></td> <td><input type='checkbox' name='line" + (i) + "' value='A4'></td> <td><input type='checkbox' name='line" + (i) + "' value='A5'></td><td><input type='checkbox' name='line" + (i) + "' value='A6'></td><td><input type='checkbox' name='line" + (i) + "' value='A7'></td><td><input type='checkbox' name='line" + (i) + "' value='A8'></td><td><input type='checkbox' name='line" + (i) + "' value='A9'></td><td><input type='checkbox' name='line" + (i) + "' value='A10'></td><td><input type='checkbox' name='line" + (i) + "' value='A11'></td><td><input type='checkbox' name='line" + (i) + "' value='A12'></td><td><input type='checkbox' name='line" + (i) + "' value='A13'></td><td><input type='checkbox' name='line" + (i) + "' value='A14'></td><td><input type='checkbox' name='line" + (i) + "' value='A15'></td><td><input type='checkbox' name='line" + (i) + "' value='A16'></td><td><input type='checkbox' name='line" + (i) + "' value='A17'></td><td><input type='checkbox' name='line" + (i) + "' value='A18'></td><td><input type='checkbox' name='line" + (i) + "' value='19'></td><td><input type='checkbox' name='line" + (i) + "' value='A20'></td><td><input type='checkbox' name='line" + (i) + "' value='A21'></td><td><input type='checkbox' name='line" + (i) + "' value='A22'></td><td><input type='checkbox' name='line" + (i) + "' value='23'></td> </tr>")

                            }
                            // max = i;
                        }
                        max = i - 1;
                        console.log("max: " + max)

                        //i != max &&//i != max && i > max
                    }

                });
            } else {
                console.log(1)
            }
        }).change();

    })



    // affichages des buttons enregistre et annuler
    $('.btnAffichage').click(function() {
        $('#btnForm').css({
            "visibility": "visible"
        }).show()
    })

    $('.EchantillonModification').click(() => {
        document.location = "http://127.0.0.1:8000/modification"
    })

    $(".teteLi").click(function() {
        $(".listElement ul").show(200).fadeIn(200)
        $(".quitter").show(400).fadeIn(200)

    })
    $(".quitter").click(function() {
        $(".listElement ul").hide(200).fadeOut(200)
        $(".quitter").hide().fadeOut(400)
            // $('.headBar').css({
            //     "filter": "blur(5px)"
            // })
    })
})