var url = "http://localhost:9999/Facturas/ProyectoFinal/";

var importe;

var iva;

var total;


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

function subtotal(){

	importe = document.getElementById('cantidad').value * document.getElementById('valorU').value;

	iva = importe*(document.getElementById('tasa').value);
	impuestos = parseInt(document.getElementById('tasa').value);
	console.log(impuestos);
	total = importe+iva;

	document.getElementById('importe').value = importe;
	document.getElementById('importeTotal').value = total;


	document.getElementById('subtotal').value = importe;
	document.getElementById('impuestosTras').value = iva;
	document.getElementById('total').value = total;

}
function insertar(){

	rfcEmisor = sessionStorage.getItem("rfcEmisor");
	nombreEmisor = sessionStorage.getItem("nombreEmisor");
	regimenFiscal = sessionStorage.getItem("regimenFiscal");
	tipoComprobante= sessionStorage.getItem("tipoComprobante");

	rfCReceptor = sessionStorage.getItem("rfCReceptor");
	nombreReceptor = sessionStorage.getItem("nombreReceptor");
	residenciaFiscal = sessionStorage.getItem("residenciaFiscal");
	noRegistro = sessionStorage.getItem("noRegistro");
	cfdi = sessionStorage.getItem("cfdi");

	fechaExpedicion = sessionStorage.getItem("fechaExpedicion");
	lugarExpedicion = sessionStorage.getItem("lugarExpedicion");
	serie = sessionStorage.getItem("serie");
	folio = sessionStorage.getItem("folio");
	moneda = sessionStorage.getItem("moneda");
	tipoCambio = sessionStorage.getItem("tipoCambio");
	formaPago = sessionStorage.getItem("formaPago");
	metodoPago = sessionStorage.getItem("metodoPago");
	confirmacion = sessionStorage.getItem("confirmacion");
	condiciones = sessionStorage.getItem("condiciones");
	tipoRelacion = sessionStorage.getItem("tipoRelacion");
	subtotal = sessionStorage.getItem("subtotal");
	impuestosTras = sessionStorage.getItem("impuestosTras");
	total = sessionStorage.getItem("total");

	claveprod = sessionStorage.getItem("claveprod");
	cantidad = sessionStorage.getItem("cantidad");
	unidad = sessionStorage.getItem("unidad");
	claveUnidad = sessionStorage.getItem("claveUnidad");
	noIdentificacion = sessionStorage.getItem("noIdentificacion");
	descripcion = sessionStorage.getItem("descripcion");
	valorU = sessionStorage.getItem("valorU");
	importe = sessionStorage.getItem("importe");
	impuesto = sessionStorage.getItem("impuesto");
	tasa = sessionStorage.getItem("tasa");
	importeTotal = sessionStorage.getItem("importeTotal");

	

	saveAjax = new XMLHttpRequest();
	saveAjax.open('POST',url+"insertar.php?");

	var data = "rfcEmisor="+rfcEmisor+"&"
		+"nombreEmisor="+nombreEmisor+"&"
		+"regimenFiscal="+regimenFiscal+"&"
		+"tipoComprobante="+tipoComprobante+"&"
		+"rfCReceptor="+rfCReceptor+"&"
		+"nombreReceptor="+nombreReceptor+"&"
		+"residenciaFiscal="+residenciaFiscal+"&"
		+"noRegistro="+noRegistro+"&"
		+"cfdi="+cfdi+"&"
		+"fechaExpedicion="+fechaExpedicion+"&"
		+"lugarExpedicion="+lugarExpedicion+"&"
		+"serie="+serie+"&"
		+"folio="+folio+"&"
		+"moneda="+moneda+"&"
		+"tipoCambio="+tipoCambio+"&"
		+"formaPago="+formaPago+"&"
		+"metodoPago="+metodoPago+"&"
		+"confirmacion="+confirmacion+"&"
		+"condiciones="+condiciones+"&"
		+"tipoRelacion="+tipoRelacion+"&"
		+"subtotal="+subtotal+"&"
		+"impuestosTras="+impuestosTras+"&"
		+"total="+total+"&"
		+"claveprod="+claveprod+"&"
		+"cantidad="+cantidad+"&"
		+"unidad="+unidad+"&"
		+"claveUnidad="+claveUnidad+"&"
		+"noIdentificacion="+noIdentificacion+"&"
		+"descripcion="+descripcion+"&"
		+"valorU="+valorU+"&"
		+"importe="+importe+"&"
		+"impuesto="+impuesto+"&"
		+"tasa="+tasa+"&"
		+"importeTotal="+importeTotal;

	saveAjax.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    saveAjax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	saveAjax.send(data);

	alert("Comprobante Agregado ");
	saveAjax.onreadystatechange = function(){
		if (saveAjax.readyState == 4 && saveAjax.status == 200) {
			console.log(saveAjax.responseText);
			location.replace('menu.php')

		}
	}
	
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

	sessionStorage.setItem("claveprod", document.getElementById('claveprod').value);
	sessionStorage.setItem("cantidad", document.getElementById('cantidad').value);
	sessionStorage.setItem("unidad", document.getElementById('unidad').value);
	sessionStorage.setItem("claveUnidad", document.getElementById('claveUnidad').value);
	sessionStorage.setItem("noIdentificacion", document.getElementById('noIdentificacion').value);
	sessionStorage.setItem("descripcion", document.getElementById('descripcion').value);
	sessionStorage.setItem("valorU", document.getElementById('valorU').value);
	sessionStorage.setItem("importe", document.getElementById('importe').value);
	sessionStorage.setItem("impuesto", document.getElementById('impuesto').value);
	sessionStorage.setItem("tasa", document.getElementById('tasa').value);
	sessionStorage.setItem("importeTotal", document.getElementById('importeTotal').value);



	cerrarModal();
}



function generar(){
	//solo genera el html de los option con info de los catalogos

	saveAjax = new XMLHttpRequest();
	saveAjax.open('GET',url+"functions.php?f=tipoComprobante");
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
	saveAjax.open('GET',url+"functions.php?f=receptor&rfc="+rfc);
	saveAjax.send();


	saveAjax.onreadystatechange = function(){
				if (saveAjax.readyState == 4 && saveAjax.status == 200) {
					console.log(saveAjax.responseText);
						save = JSON.parse(saveAjax.responseText);

					if (saveAjax.responseText != "no") {

						document.getElementById('nombreReceptor').value = save[0].Nombre;
						document.getElementById('residenciaFiscal').innerHTML +="<option value="+save[0].ResidenciaFiscal+">"+ save[0].ResidenciaFiscal+"</option>";
					document.getElementById('noRegistro').innerHTML += "<option value="+ save[0].NumRegIdTrib+">"+ save[0].NumRegIdTrib+"</option>";
					}
					
					
					
				}
			}


}


function facturas(){



	var emisor = sessionStorage.getItem('rfcEmisor');

	saveAjax = new XMLHttpRequest();
	saveAjax.open('GET',url+"facturas.php?rfc="+emisor);
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
	saveAjax.open('GET',url+"facturasE.php?rfc="+emisor);
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
	saveAjax.open('GET',url+"eliminar.php?rfc="+emisor+"&id="+id);
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
