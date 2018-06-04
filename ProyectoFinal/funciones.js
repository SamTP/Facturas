function comprobante(){

	location.replace("comprobante.php");
}


function emisorReceptor(){

//Emisor

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


	location.replace("sistema2.php");


}


function rellenarReg(){

	saveAjax = new XMLHttpRequest();
	saveAjax.open('GET',"http://localhost:9999/ProyectoFinal/functions.php?f=regFiscal");
	saveAjax.send();

	saveAjax.onreadystatechange = function(){
				if (saveAjax.readyState == 4 && saveAjax.status == 200) {
					var info = (saveAjax.responseText);
					document.getElementById('regimenFiscal').innerHTML += info;
					
					
				}
			}

}


function generar(){
	//solo genera el html de los option con info de los catalogos

	saveAjax = new XMLHttpRequest();
	saveAjax.open('GET',"http://localhost:9999/ProyectoFinal/functions.php?f=tipoComprobante");
	saveAjax.send();

	saveAjax.onreadystatechange = function(){
				if (saveAjax.readyState == 4 && saveAjax.status == 200) {
					console.log(saveAjax.responseText);
					
					
					
				}
			}

}
function receptor(){

	var rfc = document.getElementById('rfcReceptor').value;
	saveAjax = new XMLHttpRequest();
	saveAjax.open('GET',"http://localhost:9999/ProyectoFinal/functions.php?f=receptor&rfc="+rfc);
	saveAjax.send();


	saveAjax.onreadystatechange = function(){
				if (saveAjax.readyState == 4 && saveAjax.status == 200) {
					console.log(saveAjax.responseText);

					if (saveAjax.responseText != "no") {

						document.getElementById('nombreReceptor').value = saveAjax.responseText;

					}
					
					
					
				}
			}


}
