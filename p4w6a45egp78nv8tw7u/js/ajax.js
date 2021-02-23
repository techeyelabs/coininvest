// JavaScript Document
function ajax_alert(url)
{
	var xmlHttp = false;
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
		alert ("Browser does not support HTTP Request");
	else
	{
		xmlHttp.onreadystatechange=
			function ()
				{
				if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
					alert(xmlHttp.responseText);
					};
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	}
}

function GetXmlHttpObject()
{
	if (window.XMLHttpRequest)
		return (new XMLHttpRequest());
	else if (window.ActiveXObject)
		return (new ActiveXObject("Microsoft.XMLHTTP"));
}

function ajax(url,divid)
{
/*alert(url);
alert(divid);*/
var xmlHttp = false;
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
		alert ("Browser does not support HTTP Request");
	else
	{
		xmlHttp.onreadystatechange=
			function ()
				{
				if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
					document.getElementById(divid).innerHTML=xmlHttp.responseText;
					};
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	}
}