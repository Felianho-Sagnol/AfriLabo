function copyText(id1,id2) {
        $(id1).val()=$(id2+" option:selected").val();
}
function getDemandeInformations() {
    $('.registerBTN').on('click', () => {
        let tableauDemande={
                    'nomDemandeur':$("#demandeur").val(),
                    'societe':$("#societe").val(),
                    'numeroDemande':$("#numDemande").val(),
                    'indentificateur':$("#identificateur").val(),
                    'etatEchantillon':$("#etat option:selected").val(),
                    'casSolide':$('input[name=solide]:checked').val(),
                    'echantillonage':$('input[name=echantionnage]:checked').val(),
                    'nombreEchantillon':$(" #nombre option:selected").val()
                 }
                //  var arr = { "un" : 1, "deux" : 2, "trois": 3 };  
                for(var element in tableauDemande)
                {
                    var value = tableauDemande[element];
                    console.log(value)
                }
                // return tableauDemande
        // console.log(demandeur, societe, identificateur, numDemande, etat, etatSolid, echantionnage, nombreEchantillons);
        // let designation,reference,elements
        // for (let j = 1; j <= nombreEchantillons; j++) {
        //     console.log($('#design'+j).text()+$('input[name=line'+j+']:checked').attr('class'));
            
        // }



    })
}


$(function() {
    getDemandeInformations();
    let max
    let echNumber;
    let i ;
    max = 0
    $("select").change(function() {
        var str = "";
        $("#etat option:selected").each(function() {
            str = $(this).text();
            if (str == "Solide") {
                console.log("echantillon solide ")
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
                    console.log(idEmp)


                }

            } else {
                console.log("forormax:"+max+"le i: "+i)
               let numDemande=$('#numDemande').val()
                console.log(numDemande)
                for ( i = 1; i < echNumber; i++) {
                    console.log("max:"+max+"le i: "+i)
                    console.log($(this).val()+" this")
                    if ( i != max && i>max ) {
                       $("table").append("<tr><td id='design"+(i+1)+"' class='elementscar'><input type='text' placeholder='Designation'></td> <td id='ref1'>R/"+numDemande+"_2021_"+(i+1)+"</td> <td> <input type='checkbox' name='line"+(i+1)+"' value='zn'></td> <td><input type='checkbox' name='line"+(i+1)+"' value='ag'></td> <td><input type='checkbox' name='line"+(i+1)+"' value='pb'></td> <td><input type='checkbox' name='line"+(i+1)+"' value='cu'></td> </tr>")
                        max=i;
                        // $('#'+i).val()= etat = 
                        console.log($("#elemnt1 option:selected").val()+" options selectionner");
                    }
                }
                console.log("maxFinal est: "+max) 

            }
        });
    }).change();

})