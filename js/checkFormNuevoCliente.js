var nombre = document.nuevoCliente.nombre;
var apellidos = document.nuevoCliente.apellidos;
var dni = document.nuevoCliente.dni;
var tel = document.nuevoCliente.telefono;

var ptrNombre = /[A-Za-z][^\.\,\"\?\!\;\:\#\$\%\&\(\)\*\+\-\/\<\>\=\@\[\]\\\^\_\{\}\|\~]{2,10}$/;
// var ptrDireccion = /^[A-Z¿]{1}[a-zA-Z0-9/ºª,¿-ˇ\u00f1\u00d1\s]{2,40}$/;
// var ptrCp = /^[0-9]{5}$/;
var ptrTelefono = /\d{9}/;
var ptrEmail =/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$/;

var error = "";
var element = "";

function checkNombre(){
  if (!ptrNombre.test(nombre.value)) {
    console.log(nombre.value);
    error ="<small class='error w3-text-red w3-large'>Formato incorrecto</p>";
    document.getElementById('badName').style.display='';
    document.nuevoCliente.nombre.classList.add('w3-border-red');
    document.getElementById("infoNombre").innerHTML = error;
    document.nuevoCliente.nombre.focus();
    return false;
  } else {
    error="";
    document.getElementById('badName').style.display='none';
    document.nuevoCliente.nombre.classList.remove('w3-border-red');
    document.getElementById("infoNombre").innerHTML = error;
    document.nuevoCliente.apellidos.focus();
    return true;
  }
}
function checkTel(){
  if (!ptrNombre.test(apellidos.value)) {
    console.log(apellidos.value);
    error ="<small class='error w3-text-red w3-large'>Formato incorrecto</p>";
    document.getElementById('badTel').style.display='';
    document.nuevoCliente.telefono.classList.add('w3-border-red');
    document.getElementById('info_tel').innerHTML = error;
    document.nuevoCliente.telefono.focus();
    return false;
  } else {
    error="";
    document.getElementById('badTel').style.display='none';
    document.nuevoCliente.telefono.classList.remove('w3-border-red');
    document.getElementById("infoTel").innerHTML = error;
    document.nuevoCliente.telefono.focus();
    return true;    
  }
  
}

function validar(){
  nombre = checkNombre();
  telefono = checkTel();
  texto=document.getElementById('mensaje');
  // cognom = checkCognom();
  // mail = checkMail();
  // pwd = checkPwd();
  // reppwd = checkReppwd();
  // cd = checkCd();
  tel = checkTel();
  // edad = checkEdad();
  // if ( !nom || !cognom || !mail || !pwd || !reppwd || !cd || !tel || !edad) {
  if ( !nombre | !telefono) {
    texto.style.color= 'red';
    texto.innerHTML = "Hay errores en el formulario";
  }else{
    texto.style.color = ''
    alert("Sus datos se enviarán correctamente");
  }
}
