

function reg(){

    var p1=document.forms["formReg"]["pass"].value;
    var p2=document.forms["formReg"]["passC"].value;
    if(p1!=p2) {
        alert("Las contraseñas no coinciden");
        return false;
    } else {
        document.formReg.submit();
    }


}