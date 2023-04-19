function service() {
  var serv = form.servicio.value;
  // var setCup = document.getElementById('setCup');
  var vari = document.getElementById("vari");
  if (serv === "1") {
    // setCup.classList.remove('w3-hide');
    vari.classList.remove("w3-hide");
  } else {
    // setCup.classList.add('w3-hide');
    vari.classList.add("w3-hide");
  }
}

function checkName(id) {
  var ptrnombre = /^[A-ZÀ]{1}[a-zA-ZÀ-ÿ\u00f1\u00d1\s]{1,40}$/;
  var name = document.getElementById(id).value;
  console.log(name);
  if (!ptrnombre.test(name)) {
    element = document.getElementById(id);
    element.classList.add("invalid");
    return false;
  } else {
    element = document.getElementById(id);
    element.classList.add("invalid");
  }
}

function pesoUnidad() {
  var stock,
    dispensario,
    categoria,
    cat = "";
  stock = document.getElementsByClassName("dispIn");
  dispensario = document.getElementsByClassName("dispOut");
  categoria = document.getElementsByClassName("cat");
  cat = categoria.length;
  for (let q = 0; q < cat; q++) {
    switch (categoria[q].innerHTML) {
      case "Weed":
        stock[q].innerHTML = " gr.";
        dispensario[q].innerHTML = " gr.";
        break;
      case "Hash":
        stock[q].innerHTML = " gr.";
        dispensario[q].innerHTML = " gr.";
        break;
      default:
        stock[q].innerHTML = " ud.";
        dispensario[q].innerHTML = " ud.";
    }
  }
}
