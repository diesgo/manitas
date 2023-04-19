// Scripts para fecha de nacimiento

// definir variables
var nativePicker = document.querySelector(".nativeDatePicker");
var fallbackPicker = document.querySelector(".fallbackDatePicker");
var fallbackLabel = document.querySelector(".fallbackLabel");

var yearSelect = document.querySelector("#year");
var monthSelect = document.querySelector("#month");
var daySelect = document.querySelector("#day");

// hide fallback initially
fallbackPicker.style.display = "none";
fallbackLabel.style.display = "none";

// test whether a new date input falls back to a text input or not
var test = document.createElement("input");
test.type = "date";

// if it does, run the code inside the if() {} block
if (test.type === "text") {
  // hide the native picker and show the fallback
  nativePicker.style.display = "none";
  fallbackPicker.style.display = "block";
  fallbackLabel.style.display = "block";

  // populate the days and years dynamically
  // (the months are always the same, therefore hardcoded)
  populateDays(monthSelect.value);
  populateYears();
}

function populateDays(month) {
  // delete the current set of <option> elements out of the
  // day <select>, ready for the next set to be injected
  while (daySelect.firstChild) {
    daySelect.removeChild(daySelect.firstChild);
  }

  // Create variable to hold new number of days to inject
  var dayNum;

  // ¿31 o 30 días?
  if (
    month === "Enero" ||
    month === "Marzo" ||
    month === "Mayo" ||
    month === "Julio" ||
    month === "Agosto" ||
    month === "Octubre" ||
    month === "Diciembre"
  ) {
    dayNum = 31;
  } else if (
    month === "Abril" ||
    month === "Junio" ||
    month === "Septiembre" ||
    month === "Noviembre"
  ) {
    dayNum = 30;
  } else {
    // If month is February, calculate whether it is a leap year or not
    var year = yearSelect.value;
    (year - 2016) % 4 === 0 ? (dayNum = 29) : (dayNum = 28);
  }

  // inject the right number of new <option> elements into the day <select>
  for (i = 1; i <= dayNum; i++) {
    var option = document.createElement("option");
    option.textContent = i;
    daySelect.appendChild(option);
  }

  // if previous day has already been set, set daySelect's value
  // to that day, to avoid the day jumping back to 1 when you
  // change the year
  if (previousDay) {
    daySelect.value = previousDay;

    // If the previous day was set to a high number, say 31, and then
    // you chose a month with less total days in it (e.g. February),
    // this part of the code ensures that the highest day available
    // is selected, rather than showing a blank daySelect
    if (daySelect.value === "") {
      daySelect.value = previousDay - 1;
    }

    if (daySelect.value === "") {
      daySelect.value = previousDay - 2;
    }

    if (daySelect.value === "") {
      daySelect.value = previousDay - 3;
    }
  }
}

function populateYears() {
  // get this year as a number
  var date = new Date();
  var year = date.getFullYear();

  // Crea el año actual y los 100 anteriores en un <select>
  for (var i = 0; i <= 100; i++) {
    var option = document.createElement("option");
    option.textContent = year - i;
    yearSelect.appendChild(option);
  }
}

// when the month or year <select> values are changed, rerun populateDays()
// in case the change affected the number of available days
yearSelect.onchange = function () {
  populateDays(monthSelect.value);
};

monthSelect.onchange = function () {
  populateDays(monthSelect.value);
};

//preserve day selection
var previousDay;

// update what day has been set to previously
// see end of populateDays() for usage
daySelect.onchange = function () {
  previousDay = daySelect.value;
};

function calcularEdad(fecha_nacimiento) {
  var hoy = new Date();
  var cumpleanos = new Date(fecha_nacimiento);
  var edad = hoy.getFullYear() - cumpleanos.getFullYear();
  var m = hoy.getMonth() - cumpleanos.getMonth();
  var d = hoy.getDate() - cumpleanos.getDate();
  console.log(m + " " + d);
  if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
    edad--;
  }
  if (edad < 18) {
    document.getElementById("info_birth").innerHTML =
      "<span class='w3-xxlarge'> &#x1f51e;</span>";
  } else {
    if (d === 0 && m === 0) {
      document.getElementById("info_birth").innerHTML =
        "<span class='w3-xxlarge'>&#127874;</span>";
    }
  }
  return;
}
