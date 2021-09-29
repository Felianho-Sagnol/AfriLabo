$(function () {
    

    function getDemandeInformations() {
        $('.registerBTN').on('click', () => {
            let tableauDemande={
                        'nomDemandeur':$("#demandeur").val(),
                        'societe':$("#societe").val(),
                        'numeroDemande':$("#numDemande").val(),
                        'indentificateur':$("#identificateur").val(),
                        'etatEchantillon':$("#etat option:selected").val(),
                        'casSolide':$('input[name=solide]:checked').val(),
                        'echantillonage':$("#depotAfrilab option:selected").val(),
                        'depot':$('input[name=depot]:checked').val(),
                        'nombreEchantillon':$(" #nombre option:selected").val()
                    }
                    console.log(tableauDemande)
                    //let i=1
                    // for(var element in tableauDemande)
                    // {
                    //     var value = tableauDemande[element];
                    //     console.log(i+" : "+value)
                    //     i++
                    // }
                    // return tableauDemande
                    console.log(tableauDemande['nombreEchantillon']+" est le nombre d'echantillons")
            let elementAnalyse=[]
            let  designations=[]
            let references=[]
            for (let j = 1; j <= tableauDemande['nombreEchantillon']; j++) {
                console.log($('#design'+j).val())
                // console.log(+$('input[name=line'+j+']:checked').attr('class'))
                var elements = [];
                $.each($("input[name='line"+j+"']:checked"), function() {
                    elements.push($(this).val());
                });
                //console.log("les elements: " + elements.join("; "));
                designations[j]=$('#design'+j).val()
                references[j]=$('#ref'+j).text()
                elementAnalyse[j]=elements.join("; ")
                

                
            }
            console.log(designations)
            console.log(references)
            console.log(elementAnalyse)
            // let tableauEchatillon={
            //     'designation':,
            //     'reference':$('#ref'+j).val(),
            //     'elementAnalyse':elementAnalyse
            // }
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

                } else {
                    let numDemande=$('#numDemande').val()
                    for (i = 1; i < echNumber; i++) {
                        console.log("max:" + max + "le i: " + i)
                        console.log($(this).val() + " this")
                        if (i != max && i > max) {
                            $("table").append("<tr><td  class='elementscar'><input id='design"+(i+1)+"' type='text' placeholder='Designation'></td> <td id='ref"+(i+1)+"'>R/"+numDemande+"_2021_"+(i+1)+"</td> <td> <input type='checkbox' name='line"+(i+1)+"' value='Zn'> </td> <td><input type='checkbox' name='line"+(i+1)+" value='Ag'></td> <td><input type='checkbox' name='line"+(i+1)+"' value='Pb'></td> <td><input type='checkbox' name='line"+(i+1)+"' value='Cu'></td></tr>")
                            max = i;
                            for ( i = 1; i < echNumber; i++) {
                        // console.log("max:"+max+"le i: "+i)
                        // console.log($(this).val()+" this")
                        if ( i != max && i>max ) {
                        $("table").append("<tr><td  class='elementscar'><input id='design"+(i+1)+"'type='text' placeholder='Designation'></td> <td id='ref"+i+"'>R/"+numDemande+"_2021_"+(i+1)+"</td> <td> <input type='checkbox' name='line"+(i+1)+"' value='zn'></td> <td><input type='checkbox' name='line"+(i+1)+"' value='ag'></td> <td><input type='checkbox' name='line"+(i+1)+"' value='pb'></td> <td><input type='checkbox' name='line"+(i+1)+"' value='cu'></td> </tr>")
                            max=i;
                            // $('#'+i).val()= etat = 
                            // console.log($("#elemnt1 option:selected").val()+" options selectionner");
                            console.log($("#elemnt1 option:selected").val()+" options selectionner");
                        }
                            }
                        }
                    }
                }
            });
        }).change();

    })
})