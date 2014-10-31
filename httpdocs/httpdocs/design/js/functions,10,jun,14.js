function clr()
{
	if(document.getElementById('user_name').value=="E-Mail ID")
	{
		document.getElementById('user_name').value="";
	}
}
function clr1()
{
	if(document.getElementById('password').value=="Password")
	{
		document.getElementById('password').value="";
	}
}
function fill()
{
	if(document.getElementById('user_name').value=="")
	{
		document.getElementById('user_name').value="E-Mail ID"
	}
}
function fill1()
{
	if(document.getElementById('password').value=="")
	{
		document.getElementById('password').value="Password"
	}
}
function redirect1()
{
	var cid = document.getElementById('cat_id').value;
	window.location = "products_list.php?cid="+cid;
}
function redirect2()
{
	var cid = document.getElementById('cat_id').value;
	var scid = document.getElementById('scat_id').value;
	window.location = "products_list.php?cid="+cid+"&scid="+scid;
}
function redirect3()
{
	var cid = document.getElementById('cat_id').value;
	var scid = document.getElementById('scat_id').value;
	var pid=document.getElementById('pid').value;
	window.location = "products_view.php?cid="+cid+"&scid="+scid+"&pid="+pid;
}
        function mask(e,f)
        {
        var len = f.value.length;
        var key = whichKey(e);
       
        if(key>47 && key<58 || key>95 && key<106)
        {
			
			f.value = f.value.replace(/[^0-9]/,'')
            f.value = f.value.replace('--','-')            
        }
        else
        {
            
            f.value = f.value.replace(/[^0-9]/,'')
            f.value = f.value.replace('--','-')
        }                   
        }
        
        function whichKey(e) {
        var code;
        if (!e) var e = window.event;
        if (e.keyCode) code = e.keyCode;
        else if (e.which) code = e.which;
        return code
        //	return String.fromCharCode(code);
        }
 
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttpcat=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttpcat=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttpcat.onreadystatechange=function()
  {
  if (xmlhttpcat.readyState==4 && xmlhttpcat.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttpcat.responseText;
    }
  }
xmlhttpcat.open("GET","	https://buytoneronline.com/getuser.php?q="+str,true);
xmlhttpcat.send();
}

function showProd(str)
{
if (str=="")
  {
  document.getElementById("txtHint1").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttpscat=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttpscat=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttpscat.onreadystatechange=function()
  {
  if (xmlhttpscat.readyState==4 && xmlhttpscat.status==200)
    {
    document.getElementById("txtHint1").innerHTML=xmlhttpscat.responseText;
    }
  }
xmlhttpscat.open("GET","https://buytoneronline.com/getprod.php?bid="+str,true);
xmlhttpscat.send();
}


function showUser_advance(str)
{
if (str=="")
  {
  document.getElementById("as_cat").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttpcat=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttpcat=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttpcat.onreadystatechange=function()
  {
  if (xmlhttpcat.readyState==4 && xmlhttpcat.status==200)
    {
    document.getElementById("as_cat").innerHTML=xmlhttpcat.responseText;
    }
  }
xmlhttpcat.open("GET","https://buytoneronline.com/getuser1.php?q="+str,true);
xmlhttpcat.send();
}

function showProd_advance(str)
{
if (str=="")
  {
  document.getElementById("as_cat1").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttpscat=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttpscat=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttpscat.onreadystatechange=function()
  {
  if (xmlhttpscat.readyState==4 && xmlhttpscat.status==200)
    {
    document.getElementById("as_cat1").innerHTML=xmlhttpscat.responseText;
    }
  }
xmlhttpscat.open("GET","https://buytoneronline.com/getprod1.php?bid="+str,true);
xmlhttpscat.send();
}








function news_valid(){
	
	var email 					= document.getElementById('e_mail').value;
	var error_email				= document.getElementById('error_email');
	var emailExp 				= /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
	
	
	if(email == ""){		
		error_email.innerHTML = "Enter Email";
		document.getElementById('e_mail').focus();
		return false;
	}
	else if(emailExp.test(email) == false) {
		error_email.innerHTML = "Invalid Email";
		document.getElementById('e_mail').focus();
		return false;
	}
	else
	{
	validate_cat(email)
	return false;
	}	
	
	
}
function validate_cat(main_id)
{

$.ajax({
type: "POST",
url: "https://buytoneronline.com/news_mcheck.php",
data: "&value="+main_id,
success: function(html){
//Calling the ajax process php url
$("#error_email").html(html);
//Calling the responce IDs
}
});
}


function tell_friend_valid(){
	
	
	var email 					= document.getElementById('tellemail').value;
	
	var error_tell				= document.getElementById('error_tell');
	var emailExp 				= /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
	
	
	if(email == ""){		
		error_tell.innerHTML = "Enter Email";
		document.getElementById('tellemail').focus();
		return false;
	}
	else if(emailExp.test(email) == false) {
		error_tell.innerHTML = "Invalid Email";
		document.getElementById('tellemail').focus();
		return false;
	}
	else
	{
	validate_tell(email)
	return false;
	}	
	
	
}
function validate_tell(main_id)
{

$.ajax({
type: "POST",
url: "https://buytoneronline.com/news_mcheck.php",
data: "&tell="+main_id,
success: function(html){
//Calling the ajax process php url
$("#error_tell").html(html);
//Calling the responce IDs
}
});
}




// JavaScript Document

function validsearch()
{	
	var a=document.getElementById('cat_id').value;	
	var b=document.getElementById('scat_id').value;
	var c=document.getElementById('pid').value;
	if(a=="0")
	{
		alert("Select Brand Name");
		document.getElementById('cat_id').focus();
		return false;
	}
	else if(b=="0")
	{
		alert("Select Category");
		document.getElementById('scat_id').focus();
		return false;
	}
	else if(c=="0")
	{
		alert("Select Product");
		document.getElementById('pid').focus();
		return false;
	}
	else
	{
		
		document.getElementById('head_search').submit();
		return true;
	}
}

function validsearch1()
{		
	var category=document.getElementById('category');
	var brand=document.getElementById('brand');
	var prod_type=document.getElementById('prod_type');
	var oem=document.getElementById('oem');
	
	if(oem.value !="")
	{	return true;	}
	else
	{
		if(category.value == "0")
		{
			alert("Please Select Category");
			category.focus();
			return false;
		}
		else if(brand.value == "0")
		{
			alert("Please Select Brand");
			brand.focus();
			return false;
		}
		else if(prod_type.value == "0")
		{
			alert("Please Select Product Type ");
			prod_type.focus();
			return false;
		}				
		else
		{	return true;	}
	}
}

function validsearch_oem()
{
	var oem	=	document.getElementById('oem').value;
	if(oem == "")
	{	
		alert("Enter OEM Number");
		document.getElementById('oem').focus();
		return false;
	}
	return true;
}
function logincheck()
{
	var user=document.getElementById('user_name');
	var pass=document.getElementById('password');
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
	if(user.value=="E-Mail ID")
	{
		alert("Enter E-Mail ID");
		user.focus();
		return false;
	}
	else if(!user.value.match(emailExp))
	{
		alert("Enter Correct E-Mail ID Format");
		user.focus();
		return false;
	}	
	else if(pass.value=="Password")
	{
		alert("Enter Password");
		pass.focus();
		return false;
	}
	else if(pass.value.length<6)
	{
		alert("Password Must be Six Character");
		pass.focus();
		return false;
	}
	else
	{
		return true;
	}
}


	
	function mask(e,f)
    {
        var len = f.value.length;
        var key = whichKey(e);
        //alert(key);
        if(key>47 && key<58 || key>95 && key<106)
        {
            if( len==3 )f.value=f.value+'-'
            else if(len==7 )f.value=f.value+'-'
            else f.value=f.value;                        
        }
        else
        {
            
            f.value = f.value.replace(/[^0-9-]/,'')
            f.value = f.value.replace('--','-')
        }                   
    }
	function mask1(e,f)
	{
		var len = f.value.length;
		var key = whichKey(e);
		//alert(key);
		if(key>47 && key<58 || key>95 && key<112 ||key>185 && key<193 || key>218 && key<223 )
		{
			f.value = f.value.replace(/[^a-zA-Z]/,'')
		}
		else
		{		
			
		}                   
	}
	function mask2(e,f)
    {
        var len = f.value.length;
        var key = whichKey(e);
        //alert(key);
        if(key>47 && key<58 || key>95 && key<106)
        {
            f.value=f.value;                        
        }
        else
        {
            
            f.value = f.value.replace(/[^0-9-]/,'')
            f.value = f.value.replace('--','-')
        }                   
    }
	function whichKey(e) 
	{
		var code;
		if (!e) var e = window.event;
		if (e.keyCode) code = e.keyCode;
		else if (e.which) code = e.which;
		return code
	}
	function dispstate()
	{
		var ucountry=document.getElementById('ucountry');
		if(ucountry.value=="US")
		{
			document.getElementById('usstate').style.display="block";
			document.getElementById('usstate1').style.display="none";
		}
		else
		{
			document.getElementById('usstate').style.display="none";
			document.getElementById('usstate1').style.display="block";
		}
	}
	function validsignup()
	{
		var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
		var letters = /^[A-Za-z ]{3,50}$/;
		var letters1 = /^[A-Za-z]{3,50}$/;
		var numericExpression = /^([\(]{1}[0-9]{3}[\)]{1}[\.| |\-]{0,1}|^[0-9]{3}[\.|\-| ]?)?[0-9]{3}(\.|\-| )?[0-9]{4}$/;
		var zip=/^[0-9]{5}$/;
		var pass = /^[A-Za-z0-9]{6,50}$/;
		var fname=document.getElementById('fname');
		var lname=document.getElementById('lname');
		var mailid=document.getElementById('mailid');
		//var cmailid=document.getElementById('cmailid');		
		var password=document.getElementById('password1');
		var cpassword=document.getElementById('cpassword');
		var phonenum=document.getElementById('phonenum');
		var uaddress1=document.getElementById('uaddress1');		
		//var uaddress2=document.getElementById('uaddress2');		
		var ucountry=document.getElementById('ucountry');
		var ustate=document.getElementById('ustate');
		var ucity=document.getElementById('ucity');
		var uzip=document.getElementById('uzip');	
		var disclaimer=document.getElementById('disclaimer');			
		if(fname.value=="")
		{
			alert("Please Enter First Name");
			fname.focus();
			return false;
		}
		else if(fname.value.length<3)
		{
			alert("Please Enter First Name Minimum 3 characters");
			fname.focus();
			return false;
		}	
		else if(!fname.value.match(letters))
		{
			alert("Please Enter Valid First Name");
			fname.focus();
			return false;
		}	
		else if(lname.value=="")
		{
			alert("Please Enter Last Name");
			lname.focus();
			return false;
		}
		else if(lname.value.length<3)
		{
			alert("Please Enter Last Name Minimum 3 characters");
			lname.focus();
			return false;
		}
		else if(!lname.value.match(letters))
		{
			alert("Please Enter Valid Last Name");
			lname.focus();
			return false;
		}
		else if(mailid.value=="")
		{
			alert("Please Enter Email Address");
			mailid.focus();
			return false;
		}
		else if(!mailid.value.match(emailExp))
		{
			alert("Please Enter Email Address in Valid Format");
			mailid.focus();
			return false;
		}
		
		else if(password.value=="")
		{
			alert("Please your Enter Password");
			password.focus();
			return false;
		}
		else if(password.value.length<6)
		{
			alert("Please Enter Password Minimum 6 characters");
			password.focus();
			return false;
		}
		
		else if(cpassword.value=="")
		{
			alert("Please Your Enter Confirm  Password");
			cpassword.focus();
			return false;
		}
		else if(cpassword.value.length<6)
		{
			alert(" Entered Confirm Password Must be Greater than 5 character");
			cpassword.focus();
			return false;
		}
		else if(password.value != cpassword.value)
		{
			alert("Entered Confirm Password mismatch");
			cpassword.focus();
			return false;
		}		
		else if(phonenum.value=="")
		{
			alert("Please Enter Phone Number");
			phonenum.focus();
			return false;
		}
		else if(numericExpression.test(phonenum.value)==false)
		{
			alert("Please enter a valid Phone no. Ex :- (000-000-0000)");
			phonenum.focus();
			return false;
		} 
		else if(uaddress1.value=="")
		{
			alert("Please Enter Address1");
			uaddress1.focus();
			return false;
		}
		else if(uaddress1.value.length>100)
		{
			alert("Please Enter Address1 Maximum 100 characters");
			uaddress1.focus();
			return false;
		}
		/*else if(uaddress2.value=="")
		{
			alert("Please Enter Address2");
			uaddress2.focus();
			return false;
		}*/
		
		else if(ucountry.value=="0")
		{
			alert("Please Select Country");
			ucountry.focus();
			return false;
		}
		else if(ustate.value=="0")
		{
			alert("Please Select Your State");
			ustate.focus();
			return false;
		}
		else if(ucity.value=="")
		{
			alert("Please Enter City Name");
			ucity.focus();
			return false;
		}
		else if(!ucity.value.match(letters1))
		{
			alert("Please Enter Valid City Name");
			ucity.focus();
			return false;
		}				
		else if(uzip.value=="")
		{
			alert("Please Enter Your ZipCode");
			uzip.focus();
			return false;
		}	
		else if(uzip.value.length<5)
		{
			alert("Please Enter Zip Code Minimum 5 characters ");
			uzip.focus();
			return false;
		}
		else if(!uzip.value.match(zip))
		{
			alert("Please Enter valid Zip Code");
			fname.focus();
			return false;
		}	
		else if(disclaimer.checked==false)
		{
			alert("Please Accept Disclaimer");
			disclaimer.focus();
			return false;
		}
		else
		{
			return true;
		}
	}


function mail_subs(){



	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  
   var address = document.getElementById("subs_email_id").value;
 
   if((address.length == 0)||(address == null)) {
   		alert('Email must be entered');
		document.getElementById("subs_email_id").focus();
        return false;
   }else if(reg.test(address) == false) {
   	  document.getElementById("subs_email_id").value=null;
      alert('Invalid Email Address');
	  document.getElementById("subs_email_id").focus();
      return false;
   }else {
   		return true;
   } 
}

function mail_unsubs()
{
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  
   var address = document.getElementById("subs_email_id").value;
 
   if((address.length == 0)||(address == null)) {
   		alert('Email must be entered');
		document.getElementById("subs_email_id").focus();
        return false;
   }else if(reg.test(address) == false) {
   	  document.getElementById("subs_email_id").value=null;
      alert('Invalid Email Address');
	  document.getElementById("subs_email_id").focus();
      return false;
   }else {
   		return true;
   } 


}



function bestOfferRequest()
{
	var emailId=$('#best_offer_enquiry_email').val();
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;	
	
	
	if( emailId == null || $.trim(emailId) == "")
	{
		$('#best_offer_enquiry_email_errmsg').html("<span style='color:#D6492F;' class='errMsg'><span class='icn_Error'>&nbsp;</span>Enter your email ID</span>");
		return false;
	}
	
	
	if(!emailId.match(emailExp))
	{
		$('#best_offer_enquiry_email_errmsg').html("<span  style='color:#D6492F;'  class='errMsg'> <span class='icn_Error'>&nbsp;</span>Please Enter Valid Email Id</span>");
		return false;
	}

	
	$.post('/faces/jsp/ajax/ajax.jsp',{actionname : "bestOfferEnquiry", emailId : emailId } ,function(data)
	{
		if(data.status == 'success')
		{
		$('#best_offer_enquiry_email_errmsg').html("<span style='color:#D6492F;' class='msgSucess'>Request Sent Successfully!!</span>");
		}
		else
		{
			$('#best_offer_enquiry_email_errmsg').html("<span style='color:#D6492F;' class='errMsg'> <span class='icn_Error'>&nbsp;</span>Error Occured Please Try Again!!</span>");
		}
	},"json")
	.error(function() 
	{ 
		$('#best_offer_enquiry_email_errmsg').html("<span style='color:#D6492F;' class='errMsg'> <span class='icn_Error'>&nbsp;</span>Error Occured Please Try Again!!</span>");
	});
	
}
