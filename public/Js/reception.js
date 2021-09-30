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
            //remplissage du pop
            $('#NoDemandePop').text($("#numDemande").val())
            $('#societePop').text($("#societe").val())
            $('#NomDemandeurPop').text($("#demandeur").val())
            $('#numEch').text($("#nombre option:selected").val())
            $('#recepteur').text('Ahmed')
            //affichage du popup resultant 
            $('#popup').css({
                "visibility":"visible",
                "tansform":"translateY(500px)"
            }).hide().delay().show()
            $('table,.tab1,.autre').css({
                "filter": "blur(5px)",
                "cursor": "wait"
            });
            $('.registerBTN,.annuler').hide()

            //btn validation
            $('.valide').click(function(){
                $('#popup').css({
                    "visibility":"hidden",
                }).hide()
                $('table,.tab1,.autre').css({
                    "filter": "blur(0px)",
                    "cursor": "pointer"
                });
                $('.registerBTN,.annuler').show()
                $('input').val("")

                //retour
                let url = "http://127.0.0.1:8000/reception"
                    $.get(url, () => {
                        document.location ="http://127.0.0.1:8000/reception"
                    })
                 
            })
            $('#reinitialiser').click(function(){
                let url = "http://127.0.0.1:8000/reception"
                $.get(url, () => {
                    document.location ="http://127.0.0.1:8000/reception"
                })
            })

            

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
            $("#ref1").text("R/"+$('#numDemande').val()+"_2021_1")
 
            if (1) {
                $(" #nombre option:selected").each(function() {
                    echNumber = +$(this).val();
                    if (echNumber < max) {
                        // console.log("on doit supprimer")
                        // console.log("car on a max: " + max + " et EchNumbre: " + echNumber)
                        for (let i = echNumber + 1; i <= max; i++) {
                            let idEmp = "#" + i
                        }
                    }
                    else 
                    {
                
                        let numDemande=$('#numDemande').val()
                            max = i;
                            for (i = 0; i <= echNumber; i++) 
                            {
                                console.log('max est  for :' +max+" la valeur de i: "+i)
                                if (i != max && i > max) {
                                    $("table").append("<tr><td  class='elementscar'><input id='design" + (i+1) + "'type='text' placeholder='Designation'></td> <td id='ref" + (i+1) + "'>R/" + numDemande + "_2021_" + (i+1) + "</td> <td> <input type='checkbox' name='line" + (i+1) + "' value='A1'></td> <td><input type='checkbox' name='line" + (i+1) + "' value='A2'></td> <td><input type='checkbox' name='line" + (i+1) + "' value='A3'></td> <td><input type='checkbox' name='line" + (i+1) + "' value='A4'></td> <td><input type='checkbox' name='line" + (i+1) + "' value='A5'></td><td><input type='checkbox' name='line" + (i+1) + "' value='A6'></td><td><input type='checkbox' name='line" + (i+1) + "' value='A7'></td><td><input type='checkbox' name='line" + (i+1) + "' value='A8'></td><td><input type='checkbox' name='line" + (i+1) + "' value='A9'></td><td><input type='checkbox' name='line" + (i+1) + "' value='A10'></td><td><input type='checkbox' name='line" + (i+1) + "' value='A11'></td><td><input type='checkbox' name='line" + (i+1) + "' value='A12'></td><td><input type='checkbox' name='line" + (i+1) + "' value='A13'></td><td><input type='checkbox' name='line" + (i+1) + "' value='A14'></td><td><input type='checkbox' name='line" + (i+1) + "' value='A15'></td><td><input type='checkbox' name='line" + (i+1) + "' value='A16'></td><td><input type='checkbox' name='line" + (i+1) + "' value='A17'></td><td><input type='checkbox' name='line" + (i+1) + "' value='A18'></td><td><input type='checkbox' name='line" + (i+1) + "' value='19'></td><td><input type='checkbox' name='line" + (i+1) + "' value='A20'></td><td><input type='checkbox' name='line" + (i+1) + "' value='A21'></td><td><input type='checkbox' name='line" + (i+1) + "' value='A22'></td><td><input type='checkbox' name='line" + (i+1) + "' value='23'></td></tr>")
                                    
                                }
                                // max = i;
                            }
                            max = i;
                            //i != max &&//
                    }
                    
                });
            }
            else{
                console.log(1)
            }
        }).change();

    })



        // affichages des buttons enregistre et annuler
        $('.btnAffichage').click(function () {
            $('#btnForm').css({
                "visibility":"visible"
           }).show() 
        })

})