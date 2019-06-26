'use strict';



//-----displayPhotos------------

//---ajaxRequest------------------
function ajaxRequest(type, request, callback, data = null)
{
	var xhr;
	// Create XML HTTP request.
	 xhr = new XMLHttpRequest();
	 if (type == 'GET'&& data != null)
	 {
	 	request += '?' + data ;
	 }

	 xhr.open(type,request, true);

	if(type == 'POST')
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	 // Add the onload function.
	 xhr.onload = function() {
		 switch (xhr.status) {
		 case 200:
		 case 201: 
		 	console.log(xhr.responseText);
		 	callback(xhr.responseText);
		 	break;
		 default: 
		 	httpErrors(xhr.status);
		 }
	 }

	 // Send XML HTTP request.
	 xhr.send(data);

} 

//--------------httpErrors--------------

function httpErrors(errorNumber)
{
	var text;
	text = '<div class = "alert alert-danger" role = "alert">';
	text += '<span class ="glyphicon glyphicon-exclamation"></span> >';
	text += '<strong> Erreur HTTP' + errorNumber + ' </strong>';
	text += '</div>'
	$('#errors').html(text);
}