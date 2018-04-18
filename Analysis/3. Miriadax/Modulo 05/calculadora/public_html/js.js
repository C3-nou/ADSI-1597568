$(document).ready(function () {
    'use strict';
    $("#numerointroducido").on("click",   function () {   clear();       });
    $("#memoria").on("click",   function () {   clear();       });
    $("#BotonMas").on("click",    function () {   chgOper("+");  });
    $("#BotonMenos").on("click",  function () {   chgOper("-");  });
    $("#BotonMult").on("click",   function () {   chgOper("*");  });
    $("#BotonDiv").on("click",    function () {   chgOper("/");  });
    $("#BotonTot").on("click",    function () {   calcular();    });
    $("#BotonXeY").on("click",    function () {   chgOper("X^Y");});
    
    $("#BotonCuad").on("click",   function () {
                                                var num = $("#numerointroducido");
                                                num.val(+num.val() * +num.val());
                                                oper = undefined;
                                            });

    $("#Boton2eN").on("click",    function () {
                                                chgOper("X^Y");
                                                $("#numerointroducido").val("2");
                                                calcular();
                                            });

    $("#BotonInvX").on("click",   function () {
                                                var num = $("#numerointroducido");
                                                num.val(1 / num.val());
                                                oper = undefined;
                                            });
    $("#BotonSqrt").on("click",   function () {
                                                var num = $("#numerointroducido");
                                                num.val(Math.sqrt(num.val()));
                                                oper = undefined;
                                            });
    $("#BotonPEnt").on("click",   function () {
                                                var num = $("#numerointroducido");
                                                num.val(entero(+num.val()));
                                                oper = undefined;
                                            });
    $("#BotonNFact").on("click",  function () {
                                                var i = 0,
                                                num = $("#numerointroducido"),
                                                x = entero(+num.val());
                                                for (i = x - 1; i > 1; i -= 1) {
                                                    x = (x * i);
                                                }
                                                num.val(x);
                                                oper = undefined;
                                            });
   $("#BotonCls").on("click",    function () {
                                                clear();
                                                oper = undefined;
                                            });
    $("#BotonCsvE").on("click", function () {
                                                var i = 0,
                                                    x = 0,
                                                    num = $("#numerointroducido"),
                                                    Lista = num.val().replace(/([;])/g, ',').split(',');
                                                while (i< Lista.length)
                                                       x += parseInt(Lista[i++]);
                                                num.val(x);
                                                oper = undefined;
                                            });

    $("#BotonCsvProd").on("click",function () {
                                                var i = 0,
                                                    x = 1,
                                                    num = $("#numerointroducido"),
                                                    Lista = num.val().replace(/([;])/g, ',').split(',');
                                                while (i< Lista.length)
                                                       x *= parseInt(Lista[i++]);
                                                num.val(x);
                                                oper = undefined;
                                            });
});


var oper = "",
    acum = "";

function clear() {
    'use strict';
    var num = $("#numerointroducido");
    num.val("");
}

function pasar(){
 
    document.getElementById('memoria').value = document.getElementById('numerointroducido').value

}

function devolver(){
 
    document.getElementById('numerointroducido').value = document.getElementById('memoria').value

}


function entero(valor) {
    'use strict';
    return (+valor >= 0 ? Math.floor(+valor) : Math.ceil(+valor));
}

function addNum(digito) {
    'use strict';
    var num = $("#numerointroducido");
    if (oper === undefined) {
        clear();
        oper = "";
    }
    num.val(num.val() + digito);
}

function chgOper(operacion) {
    'use strict';
    oper = operacion;
    acum = $("#numerointroducido").val();
    clear();
}

function calcular() {
    'use strict';
    var total = 0,
        num = $("#numerointroducido"),
        valor = num.val();
    if (acum === "" || oper === "" || isNaN(valor)) {
        return false;
    }

    if (valor === "") {
        valor = +acum;
    }

    if (oper === "X^Y") {
        total = Math.pow(+acum, +valor);
    } else {
        total = eval(acum + oper + valor);
    }

    num.val(total);
    oper = undefined;  /*Inicializar*/
}
