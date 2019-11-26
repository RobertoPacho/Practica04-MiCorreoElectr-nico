
function validarCedula() {
    var cad = document.getElementById("cedula").value;
    var total = 0;
    var longitud = cad.length;
    if (cad !== "" && longitud === 10) {
        for (i = 0; i < longitud - 1; i++) {
            if (i % 2 === 0) {
                var aux = cad.charAt(i) * 2;
                if (aux > 9) aux -= 9;
                total += aux;
            } else {
                total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
            }
        }
        total = total % 10 ? 10 - total % 10 : 0;
        var aux = cad.charAt(9);
        if (cad.charAt(9) == total) {
            document.getElementById("cedula").style.background="#66ff33";
        } else {
            document.getElementById("cedula").style.background="#F08080";
        }
    } else {

        document.getElementById("cedula").style.background="#F08080";
    }
}


function soloNumeros(e, cad) {
    var key = window.Event ? e.which : e.keyCode
    return ((key >= 48) && (key <= 57) && (cad.length + 1 <= 10) || (key == 8))
}

function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}


 
function dosNombres(txt, id) {
    palabras = txt.split(' ');
    if (palabras.length == 2) {
        p1 = palabras[0].trim();  
        if (p1.length>=3) {
            document.getElementById(id).style.background="#66ff33";
        } else {
            document.getElementById(id).style.background="#F08080";
        }
    } else {
        document.getElementById(id).style.background="#F08080";
    }
}

function telefonoVal(txt, id) {
    if (txt.length >= 10) {
        document.getElementById(id).style.background="#66ff33";
    } else {
        document.getElementById(id).style.background="#F08080";
    }
}

function validarFecha(fecha, id) {
    if (fecha.length == 10) {
        f = fecha.split('-');
        var Anio = f[2]
        var Mes = f[1]
        var Dia = f[0]
        var VFecha = new Date(Dia, Mes, Anio);
        if ((VFecha.getFullYear() == Anio) && (VFecha.getMonth() == Mes) 
        && (VFecha.getDate() == Dia)) {
            document.getElementById(id).style.background="#66ff33";
        }
        else {
            document.getElementById(id).style.background="#F08080";
        }
    } else {
        document.getElementById(id).style.background="#F08080";
    }
}



function fecha10(txt, e) {
    var key = window.Event ? e.which : e.keyCode
    if (txt.length >= 10) {
        if (key != 8) {
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

function valDir(txt, id) {
    if (txt.length >= 4) {
        document.getElementById(id).style.background="#66ff33";
    } else {
        document.getElementById(id).style.background="#F08080";
    }
}

function validarCorreo(txt, id) {
    f = txt.split('@');
    if (f.length >= 2) {
        if (f[0].length >= 3) {
            if (f[1] == 'ups.edu.ec' || f[1] == 'est.ups.edu.ec') {
                document.getElementById(id).style.background="#66ff33";
            } else {
                document.getElementById(id).style.background="#F08080";
            }
        } else {
            document.getElementById(id).style.background="#F08080";
        }
    } else {
        document.getElementById(id).style.background="#F08080";
    }
}

function validarContra(txt, id) {
    var contra=txt;
    console.log(contra);
    if (contra.length >= 8) {
        var mayuscula = false;
        var minuscula = false;
        var numero = false;
        var caracter_raro = false;
        
        for(var i = 0;i<contra.length;i++){
            if(contra.charCodeAt(i) >= 65 && contra.charCodeAt(i) <= 90)
            {
                mayuscula = true;
            }
            else if(contra.charCodeAt(i) >= 97 && contra.charCodeAt(i) <= 122)
            {
                minuscula = true;
            }
            else if(contra.charCodeAt(i) >= 48 && contra.charCodeAt(i) <= 57)
            {
                numero = true;
            }
            else
            {
                caracter_raro = true;
            }
        }
        if(mayuscula == true && minuscula == true && caracter_raro == true && numero == true)
        {
            document.getElementById(id).style.background="#66ff33";
        }else{
            document.getElementById(id).style.background="#F08080";
        }
    }
}