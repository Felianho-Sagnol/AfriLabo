function getDemandeInformations() {
    $('.registerBTN').on('click', () => {
        let demandeur, societe, identificateur, numDemande, echantionnage, etat, nombreEchantillons, etatSolid;
        demandeur = $("#demandeur").val();
        societe = $("#societe").val();
        identificateur = $("#identificateur").val();
        numDemande = $("#numDemande").val();
        etat = $("#etat option:selected").val();
        echantionnage = $('input[name=echantionnage]:checked').val();
        nombreEchantillons = $(" #nombre option:selected").val()
        etatSolid = $('input[name=solide]:checked').val();
        console.log(demandeur, societe, identificateur, numDemande, etat, etatSolid, echantionnage, nombreEchantillons);
        let designation,reference,elements
        for (let j = 1; j <= nombreEchantillons; j++) {
            console.log($('#design'+j).text()+$('input[name=checkbox'+j+']:checked').attr('class'));
            
        }



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
                for ( i = 1; i < echNumber; i++) {
                    console.log("max:"+max+"le i: "+i)
                    console.log($(this).val()+" this")
                    if ( i != max && i>max ) {
                        $("table").append("<tr id=" + (i+1) + "><td id=design"+(i+1)+">EHAN" + (i + 1) + "<td id=ref"+(i+1)+">RE_454_" + (i + 1) + "<td><input type='checkbox' class='zn' name=checkbox"+(i+1)+" ></td><td> <input type='checkbox' class='cu' name=checkbox"+(i+1)+" ></td><td><input type='checkbox' class='pb' name=checkbox"+(i+1)+"  ></td><td><input type='checkbox' id='ag' name=checkbox"+(i+1)+"  > </td></td></tr>");
                        console.log("maxdans si est: "+max +" le i dans si "+i) 
                        max=i;
                        
                    }
                }
                console.log("maxFinal est: "+max) 

            }
        });
    }).change();

})