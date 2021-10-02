    $(function(){
        $("#apercu").click(function(){
            if($( "i" ).hasClass( "bi-eye-fill" )){
                console.log("oiel active")
                 $( " i" ).removeClass( "bi-eye-fill" ).delay( 300 ).addClass( "bi-eye-slash" );

            }
            else{
                 $( " i" ).removeClass( "bi-eye-slash" ).delay( 300 ).addClass( " bi-eye-fill");
            }
        })
    })
    $(".bi-eye-slash").click(function(){
        console.log("bien fermer")
    })