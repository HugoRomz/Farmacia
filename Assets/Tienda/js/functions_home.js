
function dataPro(id,idpersona) {

// Creacion de variable para la respuesta de la consulta
  var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XNLHTTP');
  // creo una url de la funcion en productos y le asigno un id
  var ajaxUrl = base_url + 'Productos/getIdProductos/' + id;
  request.open("GET", ajaxUrl, true);
  request.send();
// Validacion de respuestas de la variable request y la consulta
  request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
          // console.log(request.responseText);
          var objData = JSON.parse(request.responseText);
          // console.log(objData);
          if (objData.status) {
//  Guardo en un array los datos necesarios del producto para la insercion del carrito
              var producto = {
                comprador : idpersona,  
                id: objData.data.idproducto,
                nombre: objData.data.nombrep,
                precio: objData.data.precio,
                url: objData.data.imagen
            };
            $.ajax({
              type: "POST",
              url: base_url + 'Pedido/setCarrito',
              data: {'array': JSON.stringify(producto)},//capturo array     
              success: function(data){
                window.location = base_url + 'carrito';
            }
    });
         


          } else {
              Swal.fire(
                  'Error!',
                  'Al cargar el registro',
                  'error'
              )
          }
      }
  }


}

$(document).ready(function () {

// Paginacion 
  function getPageList(totalPages, page, maxLength) {
    function range(start, end) {
      return Array.from(Array(end - start + 1), (_, i) => i + start);
    }

    var sideWidth = maxLength < 9 ? 1 : 2;
    var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
    var rightWidth = (maxLength - sideWidth * 2 - 3) >> 1;

    if (totalPages <= maxLength) {
      return range(1, totalPages);
    }

    if (page <= maxLength - sideWidth - 1 - rightWidth) {
      return range(1, maxLength - sideWidth - 1).concat(0, range(totalPages - sideWidth + 1, totalPages));
    }

    if (page >= totalPages - sideWidth - 1 - rightWidth) {
      return range(1, sideWidth).concat(0, range(totalPages - sideWidth - 1 - rightWidth - leftWidth,
        totalPages));
    }

    return range(1, sideWidth).concat(0, range(page - leftWidth, page + rightWidth), 0, range(totalPages -
      sideWidth + 1, totalPages));
  }

  $(function () {
    // Configuracion de la paginacion
    var numberOfItems = $(".gallery .product-card").length;
    var limitPerPage = 12; //Cuando items se ven por patalla
    var totalPages = Math.ceil(numberOfItems / limitPerPage);
    var paginationSize = 7; //Cuantas paginas se veran paginadas
    var currentPage;

    function showPage(whichPage) {
      if (whichPage < 1 || whichPage > totalPages) return false;

      currentPage = whichPage;

      $(".gallery .product-card").hide().slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage).show();

      $(".pagination li").slice(1, -1).remove();

      getPageList(totalPages, currentPage, paginationSize).forEach(item => {
        $("<li>").addClass("page-item").addClass(item ? "current-page" : "dots")
          .toggleClass("active", item === currentPage).append($("<a>").addClass("page-link").attr({
            href: "javascript:void(0)"
          }).text(item || "...")).insertBefore(".next-page");
      });

      $(".previous-page").toggleClass("disable", currentPage === 1);
      $(".next-page").toggleClass("disable", currentPage === totalPages);
      return true;
    }

    $(".pagination").append(
      $("<li>").addClass("page-item").addClass("previous-page").append($("<a>").addClass("page-link")
        .attr({
          href: "javascript:void(0)"
        }).text("Prev")),
      $("<li>").addClass("page-item").addClass("next-page").append($("<a>").addClass("page-link")
        .attr({
          href: "javascript:void(0)"
        }).text("Next"))
    );

    $(".gallery").show();
    showPage(1);

    $(document).on("click", ".pagination li.current-page:not(.active)", function () {
      return showPage(+$(this).text());
    });

    $(".next-page").on("click", function () {
      return showPage(currentPage + 1);
    });

    $(".previous-page").on("click", function () {
      return showPage(currentPage - 1);
    });
  });
});

// Menu desplegable ocultar/mostrar
var menuDesplegable = document.getElementById("menuDesplegable");

menuDesplegable.style.maxHeight = "0px";

function toggleMenu() {
  if (menuDesplegable.style.maxHeight == "0px") {
    menuDesplegable.style.maxHeight = "130px";
  } else {
    menuDesplegable.style.maxHeight = "0px";
  }
}