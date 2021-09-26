$(function(){
    let max
    let echNumber;
    max=0
    $( "select" ).change(function () {
      var str = "";
      $( "#etat option:selected" ).each(function() {
        str = $( this ).text() ;
        if (str=="Solide") {
            console.log("echantillon solide ")
            $('#solideOptions').css({
                "visibility":"visible"
            }).show()
        }
        else{
            $('#solideOptions').css({
                "visibility":"hidden"
            }).hide()
        }
      });
    }).change();
//------------------------------------------------------
$( "#nombre" ).change(function () {

    $( " #nombre option:selected" ).each(function() {
      echNumber =+$( this ).val() ;
        if (echNumber<max) {
            console.log("on doit supprimer")
            console.log("car on a max: "+max+" et EchNumbre: "+ echNumber)
            for (let i = echNumber+1; i <= max; i++) {
                let idEmp="#"+i
                console.log(idEmp)
               
                
            }
            
        }
        else{
            for ( let i = 1; i < echNumber; i++) {
                console.log(i+1)
               if($(this ).val()>i || i!=max){
                 $("table").append("<tr id="+(i+1)+"><td >EHAN"+(i+1)+"<td>RE_454_"+(i+1)+"<td><input type='checkbox' class='zn' name='zn' ></td><td> <input type='checkbox' class='cu' name='cu'></td><td><input type='checkbox' class='pb' name='pb' ></td><td><input type='checkbox' id='ag' name='ag' > </td></td></tr>"); 
                 max=i;
                }
            } 
        }
    });
    console.log("le nombre d'echantillon pour la demande est: "+ (echNumber))
  }).change();
 
})
