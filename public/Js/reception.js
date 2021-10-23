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

function getElementName() {
    let selectfield = document.getElementsByClassName('selectfield');
    console.log(selectfield)
    for (let i = 0; i < selectfield.length; i++) {
        let element = selectfield[i]
        element.addEventListener('change', () => {
            console.log(element.value)
            let input = document.getElementById('elementAna' + element.getAttribute('id'));
            console.log(input)
            input.value += element.value + ';'
        })
    }
}


$(function() {
    getElementName()
    $('.optionElement option').click(function() {
        let idName = $(this).attr('id')

        var str = "";
        // $("#"+idName+" option:selected")
        str = $("#" + idName + " option:selected").val();
        console.log(str + " " + idName)

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
    //------------------------------------------------------
    let errorDemande = false;
    $("#nombre").change(function() {
        $("#ref1").text("R/" + $('#numDemande').val() + "_2021_1")
            //les verification
        if ($(" #nombre option:selected").val() != 0) {
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
    }).change();





    // affichages des buttons enregistre et annuler
    $('.btnAffichage').click(function() {
        $('#btnForm').css({
            "visibility": "visible"
        }).show()
        $("#ref1").text("R/" + $('#numDemande').val() + "_2021_1")

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

    $("#ehantillon").on('click', function() {
        $("#echantillonNbr").text($("#nombre option:selected").val())
        variable_js = $("#nombre option:selected").val()

    });
})