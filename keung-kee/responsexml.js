var xmlHttp

function showProduct(str,str2)
 { 
 	if(str != '' && str2 != '')
	{
		 xmlHttp=GetXmlHttpObject()
		 if (xmlHttp==null)
		  {
		  alert ("Browser does not support HTTP Request")
		  return
		  }
		  var y = str2.split("-");
		  if (y[0]==0)
		  {
		  alert ("Please choose the shop first.")
		  return
		  } 
		 
		 var url="responsexml.php";
		 url=url+"?q="+str;
		 url=url+"&id="+str2;
		 xmlHttp.onreadystatechange=stateChanged;
		 xmlHttp.open("GET",url,true);
		 xmlHttp.send(null);
	}
 }

function stateChanged() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
{
 xmlDoc=xmlHttp.responseXML;
	aaa = xmlDoc.getElementsByTagName("id")[0].childNodes[0].nodeValue;
  document.getElementById("name"+aaa).innerHTML=
  xmlDoc.getElementsByTagName("name")[0].childNodes[0].nodeValue;
  document.getElementById("price"+aaa).innerHTML=
  xmlDoc.getElementsByTagName("price")[0].childNodes[0].nodeValue;
 }
} 

function GetXmlHttpObject()
 { 
 var objXMLHttp=null
 if (window.XMLHttpRequest)
  {
  objXMLHttp=new XMLHttpRequest()
  }
 else if (window.ActiveXObject)
  {
  objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
  }
 return objXMLHttp
 }
