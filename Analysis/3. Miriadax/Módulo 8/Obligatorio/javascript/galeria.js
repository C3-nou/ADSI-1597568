var galeriaOriginal = [
   { persona:"Buddha - बुद्धा",
     frase:"En la confrontación entre el arrollo y la roca, el arroyo siempre ganará, no por la fuerza, sino por la persistencia.",
     foto:"images/Cara-de-Buda.jpg"
   },
   { persona:"Khalil Gibran - جبران خليل جبران بن ميخائل بن سعد",
     frase:"El silencio del envidioso está lleno de ruidos.",
     foto:"images/111.jpg"
   },
   { persona:"Confucio - 孔子",
     frase: "Todo tiene belleza pero no todo el mundo la puede ver.",
     foto:"images/confucio.jpeg"
   },
   { persona:"Lev Nikoláievich Tolstói - Лев Николаевич Толстой",
     frase:"Mi felicidad consiste en que sé apreciar lo que tengo y no deseo con exceso lo que no tengo.",
     foto:"images/tolstoi-05.jpg"
   },
   { persona:"Platón - Πλάτων",
     frase:"El más importante y principal negocio público es la buena educación de la juventud.",
     foto:"images/platon.jpg"
   },
   { persona:"Henrik Ibsen - hɛnɾɪk ˈjoːhɑn ˈɪpsən",
     frase:"Si dudas de ti mismo, estás vencido de antemano.",
     foto:"images/bust2.jpg"
   }
];

var t, actual;

function select(i){
   actual = i;

  $("nav a")
    .removeClass("on off")
    .addClass(function(j){return(j===i)?"on":"off";});

  if (galeria.length === 0){galeria=[{persona:"Base de datos vacia",frase:"Restaure por favor",foto:"images/Atencion.png"}]};
  $("#persona").html(galeria[i].persona);
  $("#frase").html(galeria[i].frase);
  $("#foto").attr("src", galeria[i].foto);

  clearTimeout(t);
  t = setTimeout( function(){select((i + 1) % galeria.length);}, 2000);
}

function generar_selector(){ // regenera la botonera
  var selector = $("#selector");

  selector.html("");
  
  localStorage.str1 = localStorage.str1
    ||JSON.stringify(galeriaOriginal);

  galeria = JSON.parse(localStorage.str1);
  
  galeria.forEach(function(elem,i) {
    selector.append("<li><a onClick='select("+i+")'></a></li>");
  });
}

$(function (){
  generar_selector();

   $("#Edita").on("click", function(){
	if ($("#datos").css("display")==="none"){
		clearTimeout(t);
		
		$("#persona_d").html(galeria[actual].persona);
		$("#frase_d").html(galeria[actual].frase);
		$("#foto_d").html(galeria[actual].foto);
		
		$("#datos").css("display", "block");
		$("#BaseDatos").css("display", "none");
	} else{
		$("#datos").css("display", "none");
		select(actual);
	}
  })

  $("#guardar").on("click", function(){
    $("#datos").css("display", "none");

    galeria[actual].persona = $("#persona_d").html();
	galeria[actual].frase = $("#frase_d").html();
    galeria[actual].foto = $("#foto_d").html();
	
	localStorage.str1 = JSON.stringify(galeria);	
    generar_selector();

    select(actual);
  })
  
  $("#nuevo").on("click", function(){
    $("#datos").css("display", "none");

    actual = galeria.push({
       persona:$("#persona_d").html(),
       frase:$("#frase_d").html(),
       foto:$("#foto_d").html()
    }) - 1;
	
	localStorage.str1 = JSON.stringify(galeria);
    generar_selector();

    select(actual);
  })
  
  $("#borrar").on("click", function(){
    $("#datos").css("display", "none");

    galeria.splice(actual,1);
	
	localStorage.str1 = JSON.stringify(galeria);	
    generar_selector();
	if (actual === 0){actual=1;}
    select(actual - 1);
  })
 
  $("#retorno").on("click", function(){
	  $("#BaseDatos").css("display", "none");
  })

  $("#restaura").on("click", function(){
	  cadena = "<h3>ATENCION: Esta operación restaurará su base de datos con los valores originales.<br>¿Está seguro de realizar ésta operación?</h3>";
	  cadena = cadena + '<center><a class="boton" title=“Restaura” id=btnConfirma> SI </a>';
	  cadena = cadena + '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="boton" title=“Cancela” id=btnCancela> NO </a></center>';
	  $("#baseJSON").html(cadena);
	  
	  $("#btnCancela").on("click", function(){
		  $("#baseJSON").html("<h1>OPERACION CANCELADA</h1>");
	  })
	  $("#btnConfirma").on("click", function(){
		    localStorage.str1 = JSON.stringify(galeriaOriginal);
			$("#BaseDatos").css("display", "none")
			generar_selector();
			select(actual);
	  })
  })
  
  $( "#Base" ).on("click", function(){
   if ($("#BaseDatos").css("display")==="none"){
		cadena = '<h3>BASE DE FRASES</h3><hr>';
		galeria.forEach(function(elem,x) {
			cadena = cadena + "<b>NOMBRE </b>:" +galeria[x].persona + "<br>";
			cadena = cadena + "<b>FRASE  </b>:" +galeria[x].frase + "<br>";
			cadena = cadena + "<b>FOTO   </b>:" +galeria[x].foto + "<hr>";			
		});
		$("#baseJSON").html(cadena);
		$("#BaseDatos").css("display", "block");
		$("#datos").css("display", "none")}
   else{
		$("#BaseDatos").css("display", "none")
   }
  })

  select(0);
});