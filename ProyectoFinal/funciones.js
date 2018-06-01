function comprobante(){

	location.replace("comprobante.php");
}


function emisorReceptor(){

	sessionStorage.setItem("rfcEmisor", document.getElementById('rfcEmisor').value);
	sessionStorage.setItem("nombreEmisor", document.getElementById('nombreEmisor').value);
	sessionStorage.setItem("regimenFiscal", document.getElementById('regimenFiscal').value);
	sessionStorage.setItem("tipoComprobante", document.getElementById('tipoComprobante').value);


//RECEPTOR

	sessionStorage.setItem("rfCReceptor", document.getElementById('rfcReceptor').value);
	sessionStorage.setItem("nombreReceptor", document.getElementById('nombreReceptor').value);
	sessionStorage.setItem("residenciaFiscal", document.getElementById('residenciaFiscal').value);
	sessionStorage.setItem("noRegistro", document.getElementById('noRegistro').value);
	sessionStorage.setItem("cfdi", document.getElementById('cfdi').value);




}