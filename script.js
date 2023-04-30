// Selecteurs : Methode JS qui permet de selectionner un élément du DOM

const footer = document.querySelector("footer");
const button_footer = document.querySelector("#button_footer");

const sidebar = document.querySelector(".sidebar");
const bouton_sidebar = document.querySelector("#btn_sidebar");

const pop_up = document.querySelector(".pop_up");
const bouton_open = document.querySelector("#bouton_publier");

// Evenements


/*-----------------------BOUTON FOOTER---------------------------*/



button_footer.addEventListener("click", function() {
      
    footer.classList.toggle("footer_show");

        if(button_footer.innerHTML === "Hide Footer"){            
    
          button_footer.innerHTML = "Contacts";
        }

        else{
          button_footer.innerHTML = "Hide Footer";
        }
    
})

/*---------------------------------------------------------------*/


/*-----------------------BOUTON SIDEBAR---------------------------*/


bouton_sidebar.addEventListener("click", function() {
      
    sidebar.classList.toggle("sidebar_show");
    
        if(sidebar.classList.contains("sidebar_show")) {

          bouton_sidebar.querySelector("img").setAttribute("src", "assets/images/close.png");
          bouton_sidebar.style.left = "250px";
        }

        else {
          bouton_sidebar.querySelector("img").setAttribute("src", "assets/images/menu.png");
          bouton_sidebar.style.left = "0" ;
        }    
})

/*---------------------------------------------------------------*/
      


/*-----------------------BOUTON POP UP PUBLICATION---------------------------*/


bouton_open.addEventListener("click", function() {

  pop_up.classList.toggle("pop_up_show");
})


/*---------------------------------------------------------------*/


/*-----------------------BOUTON POP UP SUPPRESSION---------------------------*/

function AfficherConfirmationSuppression() {
  document.getElementById("pop_up_suppression").style.display = "flex";
}

function CacherConfirmationSuppression() {
  document.getElementById("pop_up_suppression").style.display = "none";
}

/*---------------------------------------------------------------*/