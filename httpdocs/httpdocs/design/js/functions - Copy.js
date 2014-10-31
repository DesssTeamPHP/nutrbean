
function mask7(e,f)
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

function mask8(e,f)
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
function mask3(e,f)
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
	
function mask4(e,f)
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
function mask5(e,f)
	{
		var len = f.value.length;
		var key = whichKey(e);
		//alert(key);
		if(key>47 && key<58 || key>95 && key<106)
		{
			f.value = f.value.replace(/[^0-9]/,'')                        
		}
		else
		{			
			f.value = f.value.replace(/[^0-9]/,'')
			f.value = f.value.replace('--','-')
		}                   
	}	

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
	
	
	function masktele(e,f)
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
	function validsign(val1){
	if (val1!='active')
	
	{
		var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
		var letters = /^[A-Za-z ]{3,50}$/;
		var letters1 = /^[A-Za-z]{3,50}$/;
		var numericExpression = /^([\(]{1}[0-9]{3}[\)]{1}[\.| |\-]{0,1}|^[0-9]{3}[\.|\-| ]?)?[0-9]{3}(\.|\-| )?[0-9]{4}$/;
		var zip=/^[0-9]{5}$/;
		var pass = /^[A-Za-z0-9]{6,50}$/;
		var first_name=document.getElementById('first_name');
		var last_name=document.getElementById('last_name');
		var emailid=document.getElementById('emailid');
		var address=document.getElementById('address');
		var primaryphone=document.getElementById('primaryphone');		
		
			
	
		var shipping_address=document.getElementById('shipping_address');
		var shipping_city=document.getElementById('shipping_city');		
		var shipping_state=document.getElementById('shipping_state');
		var shipping_zipcode=document.getElementById('shipping_zipcode');
		
		var billing_address=document.getElementById('billing_address');
		
		var bill_addr=document.getElementById('bill_addr');
		var billing_city=document.getElementById('billing_city');		
		var billing_state=document.getElementById('billing_state');
		var billing_zipcode=document.getElementById('billing_zipcode');
		
		
		
		var ccnum=document.getElementById('ccnum');
		var ccmonth=document.getElementById('cc_month');
		var cc_year=document.getElementById('cc_year');
		var cvnum=document.getElementById('cvnum');
		
				
		if(first_name.value=="")
		{
			alert("Please Enter First Name");
			first_name.focus();
			return false;
		}
		else if(first_name.value.length<3)
		{
			alert("Please Enter First Name Minimum 3 characters");
			first_name.focus();
			return false;
		}	
		else if(!first_name.value.match(letters))
		{
			alert("Please Enter Valid First Name");
			first_name.focus();
			return false;
		}	
		else if(last_name.value=="")
		{
			alert("Please Enter Last Name");
			last_name.focus();
			return false;
		}
		else if(last_name.value.length<3)
		{
			alert("Please Enter Last Name Minimum 3 characters");
			last_name.focus();
			return false;
		}
		else if(!last_name.value.match(letters))
		{
			alert("Please Enter Valid Last Name");
			last_name.focus();
			return false;
		}
		else if(emailid.value=="")
		{
			alert("Please Enter Email Address");
			emailid.focus();
			return false;
		}
		else if(!emailid.value.match(emailExp))
		{
			alert("Please Enter Email Address in Valid Format");
			emailid.focus();
			return false;
		}
					
		else if(primaryphone.value=="")
		{
			alert("Please Enter Phone Number");
			primaryphone.focus();
			return false;
		}
		else if(numericExpression.test(primaryphone.value)==false)
		{
			alert("Please enter a valid Phone no. Ex :- (000-000-0000)");
			primaryphone.focus();
			return false;
		} 
		
		/*else if(uaddress2.value=="")
		{
			alert("Please Enter Address2");
			uaddress2.focus();
			return false;
		}*/
		
		
		else if(shipping_address.value=="")
		{
			alert("Please Enter Shipping Address");
			shipping_address.focus();
			return false;
		}
		else if(shipping_address.value.length>100)
		{
			alert("Please Enter Shipping Address Maximum 100 characters");
			shipping_address.focus();
			return false;
		}
		else if(shipping_city.value=="")
		{
			alert("Please Enter Shipping City");
			shipping_city.focus();
			return false;
		}
		else if(!shipping_city.value.match(letters1))
		{
			alert("Please Enter Valid Shipping City");
			shipping_city.focus();
			return false;
		}	
		else if(shipping_state.value=="0")
		{
			alert("Please Select Your Shipping State");
			shipping_state.focus();
			return false;
		}
		else if(shipping_zipcode.value=="")
		{
			alert("Please Enter Your ZipCode");
			shipping_zipcode.focus();
			return false;
		}	
		else if(shipping_zipcode.value.length<5)
		{
			alert("Please Enter Zip Code Minimum 5 characters ");
			shipping_zipcode.focus();
			return false;
		}
		else if(!shipping_zipcode.value.match(zip))
		{
			alert("Please Enter valid Zip Code");
			shipping_zipcode.focus();
			return false;
		}
		
		else if(billing_address.checked==false)
		{
			alert("Please Accept Billing Address");
			billing_address.focus();
			return false;
		}
		else if(active.checked==true)
		{
		
		
		if(bill_addr.value=="")
		{
			alert("Please Enter Billing Address");
			bill_addr.focus();
			return false;
		}
		else if(bill_addr.value.length>100)
		{
			alert("Please Enter billing Address Maximum 100 characters");
			bill_addr.focus();
			return false;
		}
		else if(billing_city.value=="")
		{
			alert("Please Enter billing City");
			billing_city.focus();
			return false;
		}
		else if(!billing_city.value.match(letters1))
		{
			alert("Please Enter Valid billing City");
			billing_city.focus();
			return false;
		}	
		else if(billing_state.value=="0")
		{
			alert("Please Select Your billing State");
			billing_state.focus();
			return false;
		}
		else if(billing_zipcode.value=="")
		{
			alert("Please Enter Your ZipCode");
			billing_zipcode.focus();
			return false;
		}	
		else if(billing_zipcode.value.length<5)
		{
			alert("Please Enter Zip Code Minimum 5 characters ");
			billing_zipcode.focus();
			return false;
		}
		else if(!billing_zipcode.value.match(zip))
		{
			alert("Please Enter valid Zip Code");
			billing_zipcode.focus();
			return false;
		}
		
		}
		
		
		
	
		else if(ccnum.value=="")
		{
			alert("Enter Credit Card Number");
			ccnum.focus();
			return false;
		}
		else if(ccmonth.value=="0")
		{
			alert("Select Expired Date");
			ccmonth.focus();
			return false;
		}
		
		
		else if(cc_year.value=="0")
		{
			alert("Select Expired Year");
			cc_year.focus();
			return false;
		}
				
		else if(cvnum.value=="")
		{
			alert("Enter Card Verification Code");
			cvnum.focus();
			return false;
		}
		
		
		
		
		
		else
		{
			document.frm_user_checkout.submit();
			
			return true;
		}
	}


	}
	function valid_payment()
	{
		var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
		var letters = /^[A-Za-z ]{3,50}$/;
		var letters1 = /^[A-Za-z]{3,50}$/;
		var numericExpression = /^([\(]{1}[0-9]{3}[\)]{1}[\.| |\-]{0,1}|^[0-9]{3}[\.|\-| ]?)?[0-9]{3}(\.|\-| )?[0-9]{4}$/;
		var zip=/^[0-9]{5}$/;
		var pass = /^[A-Za-z0-9]{6,50}$/;

		var chname=document.getElementById('chname');
		var cctype=document.getElementById('cctype');
		var ccnum=document.getElementById('ccnum');
		var cvnum=document.getElementById('cvnum');
		var ccmonth=document.getElementById('cc_month');
		var cc_year=document.getElementById('cc_year');
				
		
		 if(chname.value=="")
		{
			alert("Enter Card Holder Name");
			chname.focus();
			return false;
		}
		else if(!chname.value.match(letters))
		{
			alert("Please Enter Valid Card Holder Name");
			chname.focus();
			return false;
		}
		else if(cctype.value=="0")
		{
			alert("Select Card Type");
			cctype.focus();
			return false;
		}
		else if(ccnum.value=="")
		{
			alert("Enter Credit Card Number");
			ccnum.focus();
			return false;
		}
		else if(cvnum.value=="")
		{
			alert("Enter Card Verification Code");
			cvnum.focus();
			return false;
		}
		
		
		else if(ccmonth.value=="0")
		{
			alert("Select Expired Date");
			ccmonth.focus();
			return false;
		}
		
		
		else if(cc_year.value=="0")
		{
			alert("Select Expired Year");
			cc_year.focus();
			return false;
		}
		
		
		
		else
		{
			document.frm_user_payment.submit();
			
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
