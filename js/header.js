function dropdown(id) {
  var x = document.getElementById(id);

  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

function w3_open() {
  if (mySidebar.style.display === "block") {
    mySidebar.style.display = "none";
    // overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = "block";
    // overlayBg.style.display = "block";
  }
}

function w3_close() {
  mySidebar.style.display = "none";
  // overlayBg.style.display = "none";
}

function show(id){
  target=document.getElementById(id);
  target.style.display = "block";
  document.getElementById('seleccionar').style.display="none";
}
