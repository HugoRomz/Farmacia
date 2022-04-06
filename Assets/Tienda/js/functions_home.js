var menuDesplegable = document.getElementById("menuDesplegable");

menuDesplegable.style.maxHeight ="0px";

function toggleMenu() {
    if (menuDesplegable.style.maxHeight =="0px") {
        menuDesplegable.style.maxHeight = "130px";
    }else{
        menuDesplegable.style.maxHeight="0px";
    }
}