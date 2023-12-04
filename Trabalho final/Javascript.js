function dropdownFunction(element) {
  var dropdownContent = element.nextElementSibling;
  if (dropdownContent.style.display === "none") {
    dropdownContent.style.display = "block";
  } else {
    dropdownContent.style.display = "none";
  }
}

function voltarParaInicio() {
  window.location.href = "site_ong.html";
}
