function pantalla() {
  var pantalla = window.innerHeight;
  formu=document.getElementsByTagName('form');
  formu[0].style.marginTop = (pantalla/12) + "px";
}

function showPassword(id1,id2) {
  var x = document.getElementById(id2);
  if (x.type === "password") {
    x.type = "text";
    document.getElementById(id1).innerHTML ="Ocultar";
  } else {
    x.type = "password";
    document.getElementById(id1).innerHTML = "Mostrar";
  }
}

var input = document.getElementById("password");
var text = document.getElementById("text");
input.addEventListener("keyup", function (event) {

  if (event.getModifierState("CapsLock")) {
    text.style.display = "block";
  } else {
    text.style.display = "none"
  }
});

function dropAcc(id) {
  var x = document.getElementById(id);
  document.getElementById('drop1').innerHTML = "";
  document.getElementById('drop1').innerHTML = "Catálogo <span class='w3-large'>&#x25b2;</span>";
  
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
    document.getElementById('drop1').innerHTML = "";
    document.getElementById('drop1').innerHTML = "Catálogo <span class='w3-large'>&#x25bc;</span>";
  }
}

function drop() {
  var x = document.getElementById("demoDrop");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}

function w3_open() {
  document.getElementById("panel").style.display = "block";
}

function w3_close() {
  document.getElementById("panel").style.display = "none";
}
