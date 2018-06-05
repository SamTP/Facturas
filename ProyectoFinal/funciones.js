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

	var conceptos = ['.'];
	sessionStorage.setItem("conceptos", JSON.stringify(conceptos));


	location.replace("sistema2.php");


}
function comprobantes(){

	sessionStorage.setItem("fechaExpedicion", document.getElementById('fechaExpedicion').value);
	sessionStorage.setItem("lugarExpedicion", document.getElementById('lugarExpedicion').value);
	sessionStorage.setItem("serie", document.getElementById('serie').value);
	sessionStorage.setItem("folio", document.getElementById('folio').value);
	sessionStorage.setItem("moneda", document.getElementById('moneda').value);
	sessionStorage.setItem("tipoCambio", document.getElementById('tipoCambio').value);
	sessionStorage.setItem("formaPago", document.getElementById('formaPago').value);
	sessionStorage.setItem("metodoPago", document.getElementById('metodoPago').value);
	sessionStorage.setItem("confirmacion", document.getElementById('confirmacion').value);
	sessionStorage.setItem("condiciones", document.getElementById('condiciones').value);
	sessionStorage.setItem("tipoRelacion", document.getElementById('tipoRelacion').value);
	sessionStorage.setItem("subtotal", document.getElementById('subtotal').value);
	sessionStorage.setItem("impuestosTras", document.getElementById('impuestosTras').value);
	sessionStorage.setItem("total", document.getElementById('total').value);

	//location.replace("sistema2.php");


}

function agregarConceptos(){

	claveprod = document.getElementById('claveprod').value;
	cantidad = document.getElementById('cantidad').value;
	unidad = document.getElementById('unidad').value;
	claveUnidad = document.getElementById('claveUnidad').value;
	noIdentificacion = document.getElementById('noIdentificacion').value;
	descripcion = document.getElementById('descripcion').value;
	valorU = document.getElementById('valorU').value;
	importe = document.getElementById('importe').value;
	impuesto = document.getElementById('impuesto').value;
	tasa = document.getElementById('tasa').value;
	importeTotal = document.getElementById('importeTotal').value;


	var array = [claveprod, cantidad, unidad, claveUnidad, noIdentificacion,descripcion, valorU, importe, impuesto, tasa, importeTotal];

	conceptos = JSON.parse(sessionStorage.getItem("conceptos"));

	conceptos.push(array);

	sessionStorage.setItem("conceptos", JSON.stringify(conceptos));
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


function facturas(){



	var emisor = sessionStorage.getItem('rfcEmisor');

	saveAjax = new XMLHttpRequest();
	saveAjax.open('GET',"http://localhost:9999/ProyectoFinal/facturas.php?rfc="+emisor);
	saveAjax.send();


	saveAjax.onreadystatechange = function(){
				if (saveAjax.readyState == 4 && saveAjax.status == 200) {
					//console.log(saveAjax.responseText);


						document.getElementById('ver').innerHTML = saveAjax.responseText;

					
					
					
					
				}
			}
}

function facturasE(){



	var emisor = sessionStorage.getItem('rfcEmisor');

	saveAjax = new XMLHttpRequest();
	saveAjax.open('GET',"http://localhost:9999/ProyectoFinal/facturasE.php?rfc="+emisor);
	saveAjax.send();


	saveAjax.onreadystatechange = function(){
				if (saveAjax.readyState == 4 && saveAjax.status == 200) {
					//console.log(saveAjax.responseText);


						document.getElementById('ver').innerHTML = saveAjax.responseText;

					
					
					
					
				}
			}
}


function eliminar(id){

	var emisor = sessionStorage.getItem('rfcEmisor');

	saveAjax = new XMLHttpRequest();
	saveAjax.open('GET',"http://localhost:9999/ProyectoFinal/eliminar.php?rfc="+emisor+"&id="+id);
	saveAjax.send();


	saveAjax.onreadystatechange = function(){
				if (saveAjax.readyState == 4 && saveAjax.status == 200) {
					//console.log(saveAjax.responseText);


						alert("Eliminado exitosamente");
						location.reload();

					
					
					
					
				}
			}



}


function cerrarModal(){

	document.getElementById('modal1').style.visibility = 'hidden';
	document.getElementById('modal2').style.visibility = 'hidden';


}

function abrirModal(){
	document.getElementById('modal1').style.visibility = 'visible';
	document.getElementById('modal2').style.visibility = 'visible';
}
