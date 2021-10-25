$(function () {
    function redBox(idElement) {
        if ($(idElement).val() == "") {
            console.log("le  dchampemandeur est vide")
            $(idElement).css({ "box-shadow": "0px 0px 10px red" })
            setTimeout(() => {
                $(idElement).css({ "box-shadow": "0px 0px 0px black" })
            }, 3000);
            return true
        }
        return false
    }

    function verification(){
        let demandeERROR
        for (let i = 0; i < nbEch; i++) {
            let PT="#poidsTare"+i
            let PH="#poidsHumide"+i
            let PS="#poidsSeche"+i
            
            if (redBox(PT)) {
                demandeERROR=true
            }
            else if (redBox(PH)) {
                demandeERROR=true
            }
            else if (redBox(PS)) {
                demandeERROR=true
            }
            else demandeERROR=false;
            
         }
         return demandeERROR;
    }
    
    function verificationDensite(){
        let densiteERROR
        for (let i = 0; i < nbEch; i++) {
            let M="#masse"+i;
            let T="#temperature"+i;
            let Vo="#v_initial"+i;
            let V1="#v_1"+i;
            
            if (redBox(M)) {
                densiteERROR=true
            }
            else if (redBox(T)) {
                densiteERROR=true
            }
            else if (redBox(Vo)) {
                densiteERROR=true
            }
            else if (redBox(V1)) {
                densiteERROR=true
            }
            else densiteERROR=false;
            
         }
         return densiteERROR;
    }

    function verificationPF(){
        let pfERROR
        for (let i = 0; i < nbEch; i++) {
            let MC="#masse_c"+i;
            let T="#temperature"+i;
            let Mo="#masse_o"+i;
            let M2h="#masse_2h"+i;
            
            if (redBox(MC)) {
                pfERROR=true
            }
            else if (redBox(T)) {
                pfERROR=true
            }
            else if (redBox(Mo)) {
                pfERROR=true
            }
            else if (redBox(M2h)) {
                pfERROR=true
            }
            else pfERROR=false;
            
         }
         return pfERROR;
    }


    let nbEch=+$('#nombreEchantillon').val();

 
    $('#calculer').on('click',function () {
         //--------------------------------sur le champ demandeur-----------
            let error=verification();
         if (!error) {
             
        
            for (let i = 0; i < nbEch; i++) {
                let PT="#poidsTare"+i
                let PH="#poidsHumide"+i
                let PS="#poidsSeche"+i
                let P="#poids"+i;
                let EAU="#eau"+i;
                let pt=+$(PT).val()
                let ps=+$(PS).val()
                let ph=+$(PH).val()
                console.log(ps)
                console.log(pt)
                let p=ps-pt
                if (pt>ps) {
                    let error=redBox(PT);
                     error=redBox(PS)
                     $(P).text("Poids tare >Poids seche ");
                }else 
                 $(P).text(p);

                $(EAU).text(((ph-p)/ph)*100)
                
            }
        }
    })


    $('#calculerDensite').on('click',function () {
        //--------------------------------sur le champ demandeur-----------
           let errorDensite=verificationDensite();
        if (!errorDensite) {
            
       
           for (let i = 0; i < nbEch; i++) 
           {
                let M="#masse"+i;
                let T="#temperature"+i;
                let Vo="#v_initial"+i;
                let V1="#v_1"+i;
                let V="#volume"+i;
                let D="#densite"+i;
                let m=+$(M).val()
                let t=+$(T).val()
                let vo=+$(Vo).val()
                let v1=+$(V1).val()
               let v=v1-vo
               let d=m/v
               if (vo>=v1 ) {
                    $(V).text(" Erreur:Vo >V1 ");
                }else 
                    $(V).text(v);

                $(D).text(d)
               
           }
       }
   })


   $('#calculerPF').on('click',function () {
    //--------------------------------sur le champ demandeur-----------
       let errorPF = verificationPF();
    if (!errorPF) {
        
   
       for (let i = 0; i < nbEch; i++) 
       {
            let MC="#masse_c"+i;
            let Mo="#masse_o"+i;
            let M2h="#masse_2h"+i;
            let M="#masse"+i;
            let PF="#pf"+i;
            let mc=+$(MC).val()
            let mo=+$(Mo).val()
            let m2h=+$(M2h).val()
           let m=m2h-mc
           let pf=((mo-m)/mo)*100
           if (mc>=m2h ) {
                $(M).text(" Erreur:MCreuset >M.(2h) ");
            }else 
                $(M).text(m);
            if (mo!=0) {
                $(PF).text(pf)
            }
            
           
       }
   }
})
})