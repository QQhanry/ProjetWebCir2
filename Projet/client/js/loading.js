'use strict'

ajaxRequest('GET','php/request.php/voyages/', displayVoyage);
ajaxRequest('GET','php/request.php/demande_reservation/', displayEnReservation);
ajaxRequest('GET','php/request.php/reservation/', displayReservation);

//-----------------------------------------------------
//----------------Affichage de tous les voyages -----------------------
//-----------------------------------------------------
function displayVoyage(ajaxResponse)
{
	var data;
	var text = '';
	var textL = '';
	var textD = '';
	var textd = '';
	var textC = '';
	var textR = '';
	var textP = '';
	var textI = '';
	var button = '';

	//document.getElementById('voyage-section').innerHTML = ajaxResponse;
	//$('#voyage-section').html(ajaxResponse); // JQuery  .html remplace tout      .append ajoute
	// PARSE json response
	data = JSON.parse(ajaxResponse);

	$('#voyage-section').html();
	for (var i=0; i < data.length ; i++) {

		var libelle =data[i].libelle;
		var description = data[i].description;
		var duree = data[i].duree;
		var cout = data[i].cout;
		var ref = data[i].ref;
		var pays = data[i].code_pays;

		textL = '<h2>'+libelle+'</h2>';
		textD = '<p>'+"Description du voyage: "+description+"."+'</p>';
		textd = '<p>'+"Durée: "+duree+" jours"+'<p>';
		textC = '<p>'+"Prix: "+cout+" euros"+'</p>';
		textP = '<p>'+"Localisation: "+pays+'</p>';
		textR = '<p>'+"Référence: "+ref+'</p>';
		//textI = '<img src="'+data[i].image+'" style="margin:10px;height: 200px;">';
		button = '<a href= "#detailsModal" ><button onclick="affichevoyage('+ref+')" style="margin=20px" ' +
			'class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" ' +
			'data-toggle="modal" data-target="#detailsModal">'+"Détails"+'</button></a>'

		text = '<div class="row"><div class="column voyage" style="background-color: #eeeeee; margin: 20px;width: 300px">' +
			''+textL +textD + textC + button +'</div></div>';


		$('#voyage-section').append(text);

	}

// Affichage des réservations
}

function affichevoyage (ref){
	
	ajaxRequest('GET','php/request.php/voyages/'+ref, voyagemodal);

}

function voyagemodal(ajaxResponse){
	var data, text;

	data = JSON.parse(ajaxResponse);

	text = '<h6>'+'<h5>Libellé :</h5>'+data[0].libelle+'</h6>';
	text += '<h6>'+'<h5>Description :</h5>'+data[0].description+'</h6>';
	text += '<h6>'+'<h5>Durée (jours) :</h5>'+data[0].duree+'</h6>';
	text += '<h6>'+'<h5>Coût (euros) :</h5>'+data[0].cout+'</h6>';
	text += '<h6>'+'<h5>Référence :</h5>'+ '<p id="ref" >'+data[0].ref+'</p>'+'</h6>';
	text += '<h6>'+'<h5>Pays :</h5>'+data[0].code_pays+'</h6>';
	text += '<div class="modal-footer">\n' +
		'\t\t<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>\n' +
		'\t\t<button type="submit" class="btn btn-primary" onclick="js:window.print()">Imprimer </button>\n' +
		'\t\t<a href="reservation.html"><button type="submit"  class="btn btn-primary" onclick="alert(document.getElementById(\'ref\').value)">Réserver Maintenant ! </button></a>\n' +
		'\t</div>';


	$('#affvoyage').html(text);

}


function displayEnReservation(ajaxResponse){

	var data;
	var text = '';
	var textL = '';
	var textD = '';
	var textd = '';
	var textC = '';
	var textR = '';
	var textP = '';
	var textI = '';
	var textRe = 'En Réservation';

	//document.getElementById('voyage-section').innerHTML = ajaxResponse;
	//$('#voyage-section').html(ajaxResponse); // JQuery  .html remplace tout      .append ajoute
	// PARSE json response
	data = JSON.parse(ajaxResponse);

	$('#demande-reservation-section').html();
	for (var i=0; i < data.length ; i++) {

		var libelle =data[i].libelle;
		var description = data[i].description;
		var duree = data[i].duree;
		var cout = data[i].cout;
		var ref = data[i].ref;
		var pays = data[i].code_pays;

		textL = '<h2>'+libelle+'</h2>';
		textD = '<p>'+"Description du voyage: "+description+"."+'</p>';
		textd = '<p>'+"Durée: "+duree+" jours"+'<p>';
		textC = '<p>'+"Prix: "+cout+" euros"+'</p>';
		textP = '<p>'+"Localisation: "+pays+'</p>';
		textR = '<p>'+"Référence: "+ref+'</p>';
		textI = '<img src="'+data[i].image+'" style="margin:10px;height: 200px;">';



		text = '<div class="column voyage" value="' + ref + '" style="background-color: #eeeeee; margin: 20px;width: 100%">'+textL +textD + textd + textC + textP + textR + textI + '<br>' +textRe +'</div>';


		$('#demande-reservation-section').append(text);

	}
}

function displayReservation(ajaxResponse){

	var data;
	var text = '';
	var textL = '';
	var textD = '';
	var textd = '';
	var textC = '';
	var textR = '';
	var textP = '';
	var textI = '';
	var textRe = 'Réservé';

	//document.getElementById('voyage-section').innerHTML = ajaxResponse;
	//$('#voyage-section').html(ajaxResponse); // JQuery  .html remplace tout      .append ajoute
	// PARSE json response
	data = JSON.parse(ajaxResponse);

	$('#reservation-section').html();
	for (var i=0; i < data.length ; i++) {

		var libelle =data[i].libelle;
		var description = data[i].description;
		var duree = data[i].duree;
		var cout = data[i].cout;
		var ref = data[i].ref;
		var pays = data[i].code_pays;

		textL = '<h2>'+libelle+'</h2>';
		textD = '<p>'+"Description du voyage: "+description+"."+'</p>';
		textd = '<p>'+"Durée: "+duree+" jours"+'<p>';
		textC = '<p>'+"Prix: "+cout+" euros"+'</p>';
		textP = '<p>'+"Localisation: "+pays+'</p>';
		textR = '<p>'+"Référence: "+ref+'</p>';
		textI = '<img src="'+data[i].image+'" style="margin:10px;height: 200px;">';



		text = '<div class="column voyage" value="' + ref + '" style="background-color: #eeeeee; margin: 20px; width: 100%">'+textL +textD + textd + textC + textP + textR + textI + '<br>' +textRe +'</div>';


		$('#reservation-section').append(text);

	}
}

function requestReservation(ajaxResponse) {


}

function submitReservation(event) {
	event.preventDefault();
	var date_depart = document.getElementById("date_depart").value;
	var date_retour = document.getElementById("date_retour").value;
	var montant = document.getElementById("cout").value;
	var mail = document.getElementById("email").value;
	var validation = 1;
	var ref = document.getElementById("ref").value;

	var nom = document.getElementById("lastname").value;
	var prenom =document.getElementById("name").value;
	var date_naissance = document.getElementById("birthday").value;
	var telephone = document.getElementById("phone").value;
	var adresse = document.getElementById("adresse").value;

	var data = "date_depart=" + date_depart + "&date_retour=" + date_retour + "&montant=" + montant + "&mail=" + mail + "&validation=" + validation + "&ref=" + ref + "&nom=" + nom + "&prenom=" + prenom + "&date_naissance=" + date_naissance + "&telephone=" + telephone + "&adresse=" + adresse;

	ajaxRequest('POST','php/request.php/reserver/',requestReservation, data);
	location.assign("mesvoyages.html");

}

function takeInfo(id){
	var ref = id;
	alert(ref);
}