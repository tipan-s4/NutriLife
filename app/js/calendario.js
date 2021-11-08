document.getElementById("fecha").addEventListener("change", function () {
  console.log(this.dia);
  var dia = this.value;
  var url = window.location.pathname;
  var filename = url.substring(url.lastIndexOf("/") + 1);
  if (filename == "alimentos.php") {
    location.replace("alimentos.php?date=" + dia);
  }
  if (filename == "ejercicio.php") {
    location.replace("ejercicio.php?date=" + dia);
  }
  if (filename == "ejercicio.php") {
    location.replace("ejercicio.php?date=" + dia);
  }
  if (filename == "informes.php") {
    location.replace("informes.php?date=" + dia);
  }
});

window.addEventListener("load", function () {
  var dia = window.location.search;
  if (dia != "") {
    if(dia == "?msj=fail" || dia == "?msj=err" ){
      var f = new Date();
      var hoy = f.toISOString();
      h = hoy.split("T");
      document.getElementById("fecha").value = h[0];
    }else{
    document.getElementById("fecha").value = dia.substr(6);
    }
  }else {
    var f = new Date();
    var hoy = f.toISOString();
    h = hoy.split("T");
    document.getElementById("fecha").value = h[0];
  }
});
