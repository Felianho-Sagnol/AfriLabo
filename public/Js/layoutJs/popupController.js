    $(function(){
        $("#apercu").click(function(){
            if($( "i" ).hasClass( "bi-eye-fill" )){
                console.log("oiel active")
                $( " i" ).removeClass( "bi-eye-fill" ).delay( 300 ).addClass( "bi-eye-slash" );
                $("#layoutAppercue").show(200).fadeIn(200)
                $('.headBar').css({
                    "filter":"blur(10px)"
                })
            }
            else{
                $( " i" ).removeClass( "bi-eye-slash" ).delay( 300 ).addClass( " bi-eye-fill");
                $("#layoutAppercue").hide(200).fadeOut(200)

            }
        })
    })
    $(".bi-eye-slash").click(function(){
        console.log("bien fermer")
    })