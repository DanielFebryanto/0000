function checkForm()
{
//fetching values from all input fields and storing them in variables
    var name = document.getElementById("ERRid").value;
    var password = document.getElementById("category").value;
	
//Check input Fields Should not be blanks.
    if (name == '' || password == '') 
    {
        alert("Fill All Fields");
    }

    else
    {
	
	//Notifying error fields
    document.getElementById("myForm").submit();

	}
}
//AJAX Code to check  input field values when onblur event triggerd.

function validate(field, query)
{
	var xmlhttp;
	
if (window.XMLHttpRequest)
  {// for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }	
  
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState != 4 && xmlhttp.status == 200){
            document.getElementById(field).innerHTML = "";
        }
        else if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById(field).innerHTML = xmlhttp.responseText;
        }else{
            document.getElementById(field).innerHTML = "Error Occurred. <a href='<?php echo''.base_url().''; ?>admin/'>Reload Or Try Again</a> the page.";
        }
    }
    xmlhttp.open("POST", "http://127.0.0.1/validation/validateCategory/"+ field + "-" + query, false);
    xmlhttp.send();
}
function checkJudul(field, query)
{
	var xmlhttp;
	
if (window.XMLHttpRequest)
  {// for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }	
  
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState != 4 && xmlhttp.status == 200){
            document.getElementById(field).innerHTML = "";
        }
        else if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById(field).innerHTML = xmlhttp.responseText;
        }else{
            document.getElementById(field).innerHTML = "Error Occurred. <a href='<?php echo''.base_url().''; ?>admin/'>Reload Or Try Again</a> the page.";
        }
    }
    xmlhttp.open("POST", "http://127.0.0.1/validation/validateJudul/"+ field + "-" + query, false);
    xmlhttp.send();
}

