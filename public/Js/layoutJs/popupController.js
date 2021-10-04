    $(function() {
        $("#apercu").on("click", function() {
            if ($("i").hasClass("bi-eye-fill")) {
                console.log("oiel active")
                $(" i").removeClass("bi-eye-fill").delay(300).addClass("bi-eye-slash");
                $("#layoutAppercue").show(200).fadeIn(200)
                $('.headBar').css({
                    "filter": "blur(10px)"
                })
            } else {
                $(" i").removeClass("bi-eye-slash").delay(300).addClass(" bi-eye-fill");
                $("#layoutAppercue").hide(200).fadeOut(200)
            }
        })
    })

    export function getDemandeEchantillonsInfos(demandeId) {
        let modificationUrl = "http://127.0.0.1:8000/getDemande"
        let localData
        $.get(modificationUrl, { demandeId: demandeId }, (data) => {
            localData = data
        }).then(() => {
            if (localData.demandeExist) {
                let echantillons = localData.echantillons
                console.log(echantillons)
                console.log(echantillons.length)
                console.log(echantillons[0].designation)
                //remplir le popup ici avec echantillons
                echantillons.forEach(element => {
                    console.log(element.reference_labo)
                    $("#echantillonShow").append("<div class='col-md-4 col-sm-4 col-xs-4 ech'> <em>"+element.reference_labo+"</em> </div><div class='col-md-4 col-sm-4 col-xs-4 ech'> <em>"+element.designation+"</em> </div><div class='col-md-4 col-sm-4 col-xs-4 ech'>"+element.elements_d_analyse+"</div>")
                    
                });
                
            }
        })
    }