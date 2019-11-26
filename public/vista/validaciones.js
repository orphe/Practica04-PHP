function validarCamposObligatorios() {
    var bandera = true
    for (var i = 0; i < document.forms[0].elements.length; i++) {
        var elemento = document.forms[0].elements[i]
        if (elemento.value == '' && elemento.type == 'text') {
            if (elemento.id == 'cedula') {
                document.getElementById('mensajeCedula').innerHTML = '<br>La cedula esta vacia'
            }
            if (elemento.id == 'nombres') {
                document.getElementById('mensajeNombre').innerHTML = '<br>El nombre esta vacio'
            }
            if (elemento.id == 'apellidos') {
                document.getElementById('mensajeApellido').innerHTML = '<br>El apellido esta vacio'
            }
            if (elemento.id == 'direccion') {
                document.getElementById('mensajeDireccion').innerHTML = '<br>La direccion esta vacia'
            }
            if (elemento.id == 'telefono') {
                document.getElementById('mensajeTelefono').innerHTML = '<br>El telefono esta vacio'
            }
            if (elemento.id == 'fecha_nacimiento') {
                document.getElementById('mensajeFecNac').innerHTML = '<br>La fecha de nacimiento esta vacia'
            }


            elemento.style.border = '1px red solid'
            //elemento.className =''
            bandera = false
        }
    }
    if (!bandera) {
        alert('LLene todo porfavor ')
    }
    return bandera
}



//funcion sololetras
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    //aqui se ponen las letras q estaran permitidas
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";

    //A continuacion se hara la  validación del KeyCodes, que teclas recibe el campo de texto.
    especiales = [8, 37, 39, 46, 6];

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function soloNumeros(e, c) {
    var key = window.Event ? e.which : e.keyCode
    return ((key >= 48) && (key <= 57) && (c.length + 1 <= 10) || (key == 8))
  }
  
  
/*function soloNumeros(evt) {
    if (window.event) {//asignamos el valor de la tecla que se esta presionando a keynum
        keynum = evt.keyCode;
    }
    else {
        keynum = evt.which;
    }
    //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
    if ((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6) {
        return true;
    }
    else {
        return false;
    }
}*/
function validarCedula() {
    var cad = document.getElementById("cedula").value;
    var total = 0;
    var longitud = cad.length;
    if (cad !== "" && longitud === 10) {
      for (i = 0; i < longitud - 1; i++) {
        if (i % 2 === 0) {
          var aux = cad.charAt(i) * 2;
          if (aux > 9) aux -= 9;
          total += aux;
        } else {
          total += parseInt(cad.charAt(i));
        }
      }
      total = total % 10 ? 10 - total % 10 : 0;
      var aux = cad.charAt(9);
      if (cad.charAt(9) == total) {
        document.getElementById("mensajeCedula").innerText = 'La cedula es correcta';
        cedula.style.borderColor = "blue";
      } else {
        document.getElementById("mensajeCedula").innerHTML = 'La cedula es incorrecta';
        cedula.style.borderColor = "red";
      }
  
    } else {
     document.getElementById("mensajeCedula").innerHTML = 'escribiendo...';
    }
  }

function validarChecbock(){
    
   var seleccionado= document.getElementById('rol1').checked;
   var seleccionado2 = document.getElementById('rol2').checked;
   if(seleccionado){
       document.getElementById('rol2').disabled=true;
   }
   else if(!seleccionado){
        document.getElementById('rol2').disabled=false;
        document.getElementById('rol1').checked=false;
   } if(seleccionado2){
    document.getElementById('rol1').disabled=true;
   } else if(!seleccionado2){
    document.getElementById('rol1').disabled=false;
    document.getElementById('rol2').checked=false;
} 
}
/*if(!seleccionado){
     document.getElementById('rol1').checked=false;
    document.getElementById('rol1').disabled=false;
    document.getElementById('rol2').checked=false;
    
       document.getElementById('rol1').disabled=true;
   }else{
    document.getElementById('rol1').checked=false;
    document.getElementById('rol2').checked=false;
   }
*/
