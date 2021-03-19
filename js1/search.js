var oldquery = "";
var xmlhttp = 0;

function peekQuery () {

if (! xmlhttp) xmlhttp = createXmlHttpRequest();

if (! xmlhttp || xmlhttp.readyState == 1 || 
xmlhttp.readyState == 2 || xmlhttp.readyState == 3){
return; 
}

var result= document.getElementById("result");
var textbox = document.getElementById('query');
var query = encodeURI(textbox.value);

if (query == "") {
result.style.display = "none";
} else if (oldquery != query) {
xmlhttp.open("GET", "search.cgi?" + query, true);
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	result.style.display = "block";
	result.innerHTML = xmlhttp.responseText;
}
}
xmlhttp.send(null)
}

oldquery = query;
}

onload = function () { setInterval("peekQuery()", 800); }