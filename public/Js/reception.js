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
                'nombreEchantillon': $("#nombre option:selected").val()
            }
            console.log(tableauDemande)
            console.log(tableauDemande['nombreEchantillon'] + " est le nombre d'echantillons")

            let elementAnalyse = []
            let designations = []
            let references = []


            for (let j = 1; j <= tableauDemande['nombreEchantillon']; j++) {
                console.log($('#design' + j).val())
                    // console.log(+$('input[name=line'+j+']:checked').attr('class'))
                var elements = [];
                $.each($("input[name='line" + j + "']:checked"), function() {
                    elements.push($(this).val());
                });
                //console.log("les elements: " + elements.join("; "));
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
                    etat: tableauDemande.etatEchantillon,
                    identification_echantillon: tableauDemande.indentificateur,
                    echantillonnage: tableauDemande.echantillonage,
                    depot: tableauDemande.depot,
                    etatSolid: tableauDemande.casSolide,
                    nombreEchantillons: tableauDemande.nombreEchantillon,
                    numeroDemande: tableauDemande.numeroDemande
                },
                (data) => {
                    localData = data
                }).then(() => {
                if (localData.demandAlreadyExist) {
                    //numero de mande existant
                } else {
                    if (localData.success) {
                        let echantillonUrl = "http://127.0.0.1:8000/echantillons";
                        let demandId = localData.demandId
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


            //let i=1
            // for(var element in tableauDemande)
            // {
            //     var value = tableauDemande[element];
            //     console.log(i+" : "+value)
            //     i++
            // }
            // return tableauDemande


        })
    }



    $(function() {
        getDemandeInformations();
        let max
        let echNumber;
        let i;
        max = 0
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

            $(" #nombre option:selected").each(function() {
                echNumber = +$(this).val();
                if (echNumber < max) {
                    console.log("on doit supprimer")
                    console.log("car on a max: " + max + " et EchNumbre: " + echNumber)
                    for (let i = echNumber + 1; i <= max; i++) {
                        let idEmp = "#" + i
                    }
                }
                else 
                {
                    let numDemande=$('#numDemande').val()
                            max = i;
                            for (i = 1; i < echNumber; i++) 
                            {
                                if (i != max && i > max) {
                                    $("table").append("<tr><td  class='elementscar'><input id='design" + (i + 1) + "'type='text' placeholder='Designation'></td> <td id='ref" + (i+1) + "'>R/" + numDemande + "_2021_" + (i + 1) + "</td> <td> <input type='checkbox' name='line" + (i + 1) + "' value='Zn'></td> <td><input type='checkbox' name='line" + (i + 1) + "' value='Ag'></td> <td><input type='checkbox' name='line" + (i + 1) + "' value='Pb'></td> <td><input type='checkbox' name='line" + (i + 1) + "' value='Cu'></td> </tr>")
                                    max = i;
                                    console.log($("#elemnt1 option:selected").val() + " options selectionner");
                                }
                            }
                }
                
            });
        }).change();

    })
})