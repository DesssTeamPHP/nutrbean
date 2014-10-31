<?php 
//include("smarty_config.php");
include('core/configuration.php');

	$sDate = $_REQUEST['start_date'];
	$sPieces = explode("/", $sDate);
	$startDate = $sPieces[2].'-'.$sPieces[0].'-'.$sPieces[1];

 	$eDate = $_REQUEST['end_date'];
	$ePieces = explode("/", $eDate);
	$endDate = $ePieces[2].'-'.$ePieces[0].'-'.$ePieces[1];
 
   $query="SELECT a.order_created as Date,a.order_id as order_id,b.shipping_firstname as Name,b.shipping_address as shipping_address,b.shipping_city as shipping_city,b.shipping_state as shipping_state,b.shipping_country as shipping_country,b.shipping_zip  as shipping_zip,a.grand_pay as grand_pay,a.shipping_amt as shipping_amt,a.billing_amt as billing_amt,a.order_status as order_status FROM order_tbl a,order_shipping b WHERE a.order_id= b.order_id And order_created between '$startDate' and '$endDate' group BY   order_id DESC";

//$query="SELECT a.price_id,a.companyName,a.model_no,a.model_type,a.moq,price_each,b.delivery,c.description FROM int_pricelist a, int_stock_delivery b,int_description c WHERE a.model_no= b.model_no AND a.model_no= c.model_no AND a.companyName = b.companyName AND a.companyName = c.companyName";
$result = mysql_query($query);
if(!$result)
echo mysql_error();
//exit;
$count = mysql_num_fields($result);
for ($i = 0; $i < $count; $i++){
$header .= mysql_field_name($result, $i)."\t";
}
while($row = mysql_fetch_row($result)){
$line = '';
foreach($row as $value){
if(!isset($value) || $value == ""){
$value = "\t";
}else{
# important to escape any quotes to preserve them in the data.
$value = str_replace('"', '""', $value);
# needed to encapsulate data in quotes because some data might be multi line.
# the good news is that numbers remain numbers in Excel even though quoted.
$value = '"' . $value . '"' . "\t";
}
$line .= $value;
}
$data .= trim($line)."\n";
}
# this line is needed because returns embedded in the data have "\r"
# and this looks like a "box character" in Excel
$data = str_replace("\r", "", $data);


# Nice to let someone know that the search came up empty.
# Otherwise only the column name headers will be output to Excel.
if ($data == "") {
$data = "\nno matching records found\n";
}

# This line will stream the file to the user rather than spray it across the screen
//header("Content-Type: application/vnd.ms-excel; name='excel'");

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=NutraBean.com-".$_REQUEST['start_date']."-To-".$_REQUEST['end_date'].".xls");
header("Pragma: no-cache");
header("Expires: 0");

echo $header."\n".$data;

//print "done";
 ob_end_flush(); ?>