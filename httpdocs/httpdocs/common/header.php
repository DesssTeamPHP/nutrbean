<!doctype html>
<html >
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width" />
<title>Nutrabean</title>
<link href="css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="css/support.css" rel="stylesheet" type="text/css" />
<link href="css/font_face.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/validation.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>

	$(document).ready(function(){
		
		$('#product1').show();
		$('#product2').hide();
		$('#product3').hide();
		$('#product4').hide();
			
	});
	
	function showproducts(id)
	{
		$('#product1').hide();
		$('#product2').hide();
		$('#product3').hide();
		$('#product4').hide();
		$(id).show();
	}

</script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic,300' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="wrapper">
<div class="container">
  <header>
    <div class="logo"> <a href="index.php"><img src="images/logo.png" alt="Nutrabean" title="Nutrabean"></a>
      <div class="spacer"></div>
    </div>
    <div class="brand_logo">
      <ul>
        <li><img src="images/made_in_usa.png" alt="" title="" ></li>
        <li><img src="images/gmp.png" alt="" title="" ></li>
        <li><img src="images/natural.png" alt="" title="" ></li>
        <li><img src="images/100_Per.png" alt="" title="" ></li>
        <li class="spacer"></li>
      </ul>
    </div>
  </header>