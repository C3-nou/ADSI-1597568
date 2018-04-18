var a,b,cuenta

a = document.write("the width of dispositive is: "+screen.width+" ")
b = document.write("while that your height is: "+screen.height)

$(function() {
    // si variable no existe se crea (primera visita)
localStorage.cuenta = (localStorage.cuenta || 0);

localStorage.cuenta++; // incrementamos cuenta de visitas

$('#cuenta').html(localStorage.cuenta);
});
