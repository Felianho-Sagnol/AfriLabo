$(function(){
    $( "select" ).change(function () {
      var str = "";
      $( "select option:selected" ).each(function() {
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
      console.log(str)
    }).change();

 
})
