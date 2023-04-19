var genero = document.nuevoCliente.genero;
var birth = document.nuevoCliente.birth;
var nombre = document.nuevoCliente.nombre;
var apellidos = document.nuevoCliente.apellidos;
var dni = document.nuevoCliente.dni;
var pais = document.nuevoCliente.pais;
var rol = document.nuevoCliente.rol;
var cuota = document.nuevoCliente.cuota;
var consumo = document.nuevoCliente.consumo;
var saldo = document.nuevoCliente.saldo;
var foto = document.nuevoCliente.foto;
var idFront = document.nuevoCliente.idFront;
var idBack = document.nuevoCliente.idBack;

var ptrNombre = /^[A-Z¿]{1}[a-zA-Z¿-ˇ\u00f1\u00d1\s]{2,40}$/;
var ptrConsumo = /^[0-9]{3}$/;
var ptrSaldo = /^[0-9]{9}$/;
// var ptrDireccion = /^[A-Z¿]{1}[a-zA-Z0-9/ºª,¿-ˇ\u00f1\u00d1\s]{2,40}$/;
// var ptrCp = /^[0-9]{5}$/;
// var ptrTelefono = /\d{9}/;
// var ptrEmail =
//   /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$/;

var error = "";
var element = "";

function checkNombre(){
  if (!ptrNombre.test(nombre.value)) {
    console.log(nombre.value);
    error ="<small class='error w3-text-red w3-large'>Ha de empezar en mayúsculas</p>";
    document.getElementById('badName').style.display='';
    document.nuevoCliente.nombre.classList.add('w3-border-red');
    // console.log(nom);
    // nom.classList.add("w3-border-reed");
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

function validar(){
  nombre = checkNombre();
  texto=document.getElementById('mensaje');
  // cognom = checkCognom();
  // mail = checkMail();
  // pwd = checkPwd();
  // reppwd = checkReppwd();
  // cd = checkCd();
  // tel = checkTel();
  // edad = checkEdad();
  // if ( !nom || !cognom || !mail || !pwd || !reppwd || !cd || !tel || !edad) {
  if ( !nombre) {
    texto.style.color= 'red';
    texto.innerHTML = "Hay errores en el formulario";
  }else{
    texto.style.color = ''
    alert("Sus datos se enviarán correctamente");
  }
}
