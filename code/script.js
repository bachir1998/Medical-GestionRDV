$(document).ready(function(){
      setInterval(function() {
        $("#rend").load("patientscript.php")
      }, 1000);
});

$(document).ready(function(){
  setInterval(function() {
    $("#rv").load("medecinscript.php")
  }, 1000);
});

$(document).ready(function(){
  setInterval(function() {
    $("#conf").load("validemed.php")
  }, 30000);
});


$(document).ready(function(){
  setInterval(function() {
    $("#pat").load("listpatientscript.php")
  }, 1000);
});





$(document).ready(function(){
    $(".collapse").collapse();
});



											