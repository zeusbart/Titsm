function CambiarContenido(div,pagina){
    $(div).load(pagina);
}



function cerrarS(){
    document.location = "../cerrar_sesion.jsp";
}
           function envio(formulario,lugar) {
                $(formulario).ajaxForm({
                    type: "POST",
                    target: lugar
                });
            }
      