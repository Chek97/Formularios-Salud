//CODIGO PARA ESCOJER UN LOGIN

function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    
  }
  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active"; 
}

//Funcion para obener el valor del usuario

function obtenerUsuario(){
  var usuario = document.getElementById("nombreUsu");
  document.write(usuario.innerHTML);
}

function crearOpciones(valor){
  if (valor=="seleccion") {
    document.getElementById('unica').style.display="";
    document.getElementById('multiple').style.display="none";
  }else if(valor=="verificar"){
    document.getElementById('multiple').style.display="";
    document.getElementById('unica').style.display="none";
  }else{
    document.getElementById('multiple').style.display="none";
    document.getElementById('unica').style.display="none";
  }

}


function crearPreguntas(numero){
  
  //Escogemos la lista como elemento padre
  var padre = document.getElementById("opcion");
    padre.style.display="";

  //Se pueden borrar pero luego de borrar el ul tienes que volver a crearlo con sus caracteristicas solo de esa forma 
  //podrias borrarlo, seleccionar padre la ul, luego de hijo el o+j y borrar esos elementos, luego crearlos nuevamente  
/*
  for (var j = 1; j <= 5; j++) {
    var elementoExiste = document.getElementById("o"+j);  
    if (elementoExiste.style.display=="") {
      elementos = document.getElementById("d"+j);
      elementoExiste.removeChild(elementos);

      var d = document.createElement("span");
        d.setAttribute("id", "d"+j);
        d.style.display="none";
      padre.appendChild(d);
    }  
  }


  //Crea los elementos segun el numero del elemento
*/
  for (var i= 1; i <= numero; i++) {  
        var padreNuevo = document.getElementById("o"+i);
          padreNuevo.style.display="";
    
        var nuevo = document.createElement("input");      
          nuevo.setAttribute("name", "opc"+i);
          nuevo.setAttribute("class", "form-control");
          padreNuevo.appendChild(nuevo);  
      
  }

  //Selecciona el select y lo desaparece
  var select = document.getElementById("se");
    select.style.display="none";
      

}

function confirmar(id){
  if(confirm("Seguro que deseas eliminar?")){
    window.location.href="../controlador/administrador_borrar_usuario.php?id1="+id;
  }
}

function crearPreguntas1(numero){
  
  //Escogemos la lista como elemento padre
  var padre = document.getElementById("opcion1");
    padre.style.display="";

  //Se pueden borrar pero luego de borrar el ul tienes que volver a crearlo con sus caracteristicas solo de esa forma 
  //podrias borrarlo, seleccionar padre la ul, luego de hijo el o+j y borrar esos elementos, luego crearlos nuevamente  
/*
  for (var j = 1; j <= 5; j++) {
    var elementoExiste = document.getElementById("o"+j);  
    if (elementoExiste.style.display=="") {
      elementos = document.getElementById("d"+j);
      elementoExiste.removeChild(elementos);

      var d = document.createElement("span");
        d.setAttribute("id", "d"+j);
        d.style.display="none";
      padre.appendChild(d);
    }  
  }


  //Crea los elementos segun el numero del elemento
*/
  for (var i= 1; i <= numero; i++) {  
        var padreNuevo = document.getElementById("l"+i);
          padreNuevo.style.display="";
    
        var nuevo = document.createElement("input");      
          nuevo.setAttribute("name", "opc"+i);
          nuevo.setAttribute("class", "form-control");
          padreNuevo.appendChild(nuevo);  
      
  }

  //Selecciona el select y lo desaparece
  var select = document.getElementById("se1");
    select.style.display="none";
      

}

