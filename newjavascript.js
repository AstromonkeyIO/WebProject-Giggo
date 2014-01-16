function change_status(country)
{
  // alert("hellow");
if (country.length==0)
  {
   //alert("hellow"); 
  document.getElementById("status_id").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("status_id").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","RespondToGig.php?status_id="+country,true);
xmlhttp.send();
}


function cancel_gig(country)
{
  // alert("hellow");
if (country.length==0)
  {
   //alert("hellow"); 
  document.getElementById("status_id").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("status_id").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","CancelGig.php?status_id="+country,true);
xmlhttp.send();
}


function pick_gigger(country)
{
  // alert("hellow");
if (country.length==0)
  {
   //alert("hellow"); 
  document.getElementById("status_id").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("status_id").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","PickGiggerBackend.php?status_id="+country,true);
xmlhttp.send();
}