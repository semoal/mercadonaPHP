//Simplemente recibe el valor de cada input type y los comprueba con los predefinidos usuario y pwd
//Si se cumple ciertas acciones muestra un error o otro
var total = 0.0;
function añadirCesta(){
  $('#precio').each(function(){
    total += parseFloat($(this).text());
  });
  $("#total").text("Total cesta:"+total+"€");
}
