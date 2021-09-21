$(function(){
  if (1) {
    $('.formReception').hide( ).delay( 50 ).show( 200 );
    $('.toHide').css({
      "filter": "blur(5px)",
      "cursor": "wait"
    });
    $('.connexion').click(function(){
      if (1) {
        $('.formReception').hide(100);
        $('.toHide').css({
          "filter": "blur(0px)",
          "cursor": "auto"
        });
      }
    });
  }  



    let tabs = document.querySelectorAll(".tab-link:not(.desactive)");

    tabs.forEach((tab) => {
      tab.addEventListener("click", () => {
        unSelectAll();
        tab.classList.add("active");
        let ref = tab.getAttribute("data-ref");
        document
          .querySelector(`.tab-body[data-id="${ref}"]`)
          .classList.add("active");
      });
    });
    
    function unSelectAll() {
      tabs.forEach((tab) => {
        tab.classList.remove("active");
      });
      let tabbodies = document.querySelectorAll(".tab-body");
      tabbodies.forEach((tab) => {
        tab.classList.remove("active");
      });
    }
    
    document.querySelector(".tab-link.active").click();

    


});