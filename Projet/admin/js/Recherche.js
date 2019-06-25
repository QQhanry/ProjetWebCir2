'use strict';


function filtre_recherche_titre() {

var input_titre , filtre_titre , table , tr , td , i , titrevalue ;
//console.log("input");

input_titre = document.getElementById('Titre_de_voyage');
filtre_titre = input_titre.value.toUpperCase();
table = document.getElementById('tab');
tr = table.getElementsByTagName('tr');

for (i = 0 ; i < tr.length ; i++ ){
	td = tr[i].getElementsByTagName('td')[0];
	if (td) {
		titrevalue = td.textContent || td.InnerText;
		if (titrevalue.toUpperCase().indexOf(filtre_titre) > -1) {
			tr[i].style.display = "";
		}else{
			tr[i].style.display = "none";
		}
	}
}

	
}

function filtre_recherche_pays() {

var input_pays , filtre_pays , table , tr , td , i , paysvalue ;
console.log("input");

input_pays = document.getElementById('CodePays');
filtre_pays = input_pays.value.toUpperCase();
table = document.getElementById('tab');
tr = table.getElementsByTagName('tr');

for (i = 0 ; i < tr.length ; i++ ){
	td = tr[i].getElementsByTagName('td')[1];
	if (td) {
		paysvalue = td.textContent || td.InnerText;
		if (paysvalue.toUpperCase().indexOf(filtre_pays) > -1) {
			tr[i].style.display = "";
		}else{
			tr[i].style.display = "none";
		}
	}
}

	
}

function filtre_recherche_reference() {

var input_reference , filtre_reference , table , tr , td , i , referencevalue ;
console.log("input");

input_reference = document.getElementById('Reference');
filtre_reference = input_reference.value.toUpperCase();
table = document.getElementById('tab');
tr = table.getElementsByTagName('tr');

for (i = 0 ; i < tr.length ; i++ ){
	td = tr[i].getElementsByTagName('td')[2];
	if (td) {
		referencevalue = td.textContent || td.InnerText;
		if (referencevalue.toUpperCase().indexOf(filtre_reference) > -1) {
			tr[i].style.display = "";
		}else{
			tr[i].style.display = "none";
		}
	}
}

	
}