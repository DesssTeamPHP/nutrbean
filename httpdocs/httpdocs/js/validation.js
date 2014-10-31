	function formValidator()
	{
		var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
		var letters = /^[A-Za-z ]{3,50}$/;
		var letters1 = /^[A-Za-z]{3,50}$/;
		var numericExpression = /^([\(]{1}[0-9]{3}[\)]{1}[\.| |\-]{0,1}|^[0-9]{3}[\.|\-| ]?)?[0-9]{3}(\.|\-| )?[0-9]{4}$/;
		var zip=/^[0-9]{5}$/;
		var pass = /^[A-Za-z0-9]{6,50}$/;
		var first_name=document.getElementById('first_name');
		var last_name=document.getElementById('last_name');
		var email_field=document.getElementById('email_field');	
		var phone_field=document.getElementById('phone_field');
			
		if(first_name.value=="" || first_name.value=="First Name")
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
		else if(last_name.value=="" || last_name.value=="Last Name")
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
		
			else if(phone_field.value=="")
		{
			alert("Please Enter Phone Number");
			phone_field.focus();
			return false;
		}
		else if(numericExpression.test(phone_field.value)==false)
		{
			alert("Please enter a valid Phone no. Ex :- (000-000-0000)");
			phone_field.focus();
			return false;
		} 
		
		else if(email_field.value=="")
		{
			alert("Please Enter Email Address");
			email_field.focus();
			return false;
		}
		else if(!email_field.value.match(emailExp))
		{
			alert("Please Enter Email Address in Valid Format");
			email_field.focus();
			return false;
		}
		


		else
		{
			
			document.frm_get_start.submit()
			return true;
		}
	}

function allownumbers(e) {
    var t = e.which ? e.which : event.keyCode;
    return t > 31 && (48 > t || t > 57) ? !1 : !0
}

function limitText(e, t) {
    e.value.length > t && (e.value = e.value.substring(0, t), alert("Max Length 2000 Charecters"))
}

function mask(e, t) {
    var n = t.value.length,
        l = whichKey(e);
    l > 47 && 58 > l || l > 95 && 106 > l ? t.value = 3 == n ? t.value + "-" : 7 == n ? t.value + "-" : t.value : (t.value = t.value.replace(/[^0-9-]/, ""), t.value = t.value.replace("--", "-"))
}

function whichKey(e) {
    var t;
    if (!e) var e = window.event;
    return e.keyCode ? t = e.keyCode : e.which && (t = e.which), t
}

function gen_search(e) {
    return 0 == e.value.length ? (alert("Please Enter Some Keywords"), e.focus(), !1) : !0
}