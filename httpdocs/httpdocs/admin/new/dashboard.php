<?php require 'core/configuration.php';


//For Selecting Last 10 Request Quote 
	$Request_tablename      =    REQUESTQUOTE;
	$Get_record_top_ten		= "SELECT SUBSTRING_INDEX( `quote_qustcomments` , ' ', 10 ) AS comment , quote_name,date_time,quote_phone,quote_email FROM ".$Request_tablename." ORDER BY date_time DESC LIMIT 0,5";	
	$Run_record_top_ten		= mysql_query($Get_record_top_ten)	;
	$Get_num_record_top_ten = mysql_num_rows($Run_record_top_ten);	


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php require 'common/admin-top-header.php';?>
<div id="maincontainer" class="clearfix">
<?php require 'common/admin-header.php';?>
<div id="contentwrapper">
  <div class="main_content">
    <div class="row">
      <div class="col-sm-12 tac">
        <ul class="ov_boxes">
          <?php 
	$start_date_ga = date('Y-m-d H:i:s',strtotime('today - 7 days'));
	$end_date_ga = date('Y-m-d H:i:s');		
	  	 $get_order_data ="SELECT DATE(order_created) AS date, SUM(billing_amt) AS billing_amount FROM order_tbl where  order_created >= '".$start_date_ga."' and order_created <='".$end_date_ga."'  GROUP BY order_created DESC limit 0,7";		
		$run_get_order =mysql_query($get_order_data);
		$total_val_weekly="";
		if(mysql_num_rows($run_get_order)>0)  { 
		$weekly = 1;
		$total_cost_week = 0;
		while($row_fetch_weekly =mysql_fetch_array($run_get_order))
		{
		$total_cost_week  = $total_cost_week + $row_fetch_weekly['billing_amount'];
		$total_val_weekly .= $row_fetch_weekly['billing_amount'];
		if($weekly != mysql_num_rows($run_get_order))
		$total_val_weekly .=',';
		$weekly++;
		}
		?>
          <li>
            <div class="p_bar_up p_canvas"><span><?php echo $total_val_weekly ;?></span></div>
            <div class="ov_text"> <strong>$<?php echo $total_cost_week;?></strong> Weekly Sale </div>
          </li>
          <?php } else { ?>
          <li>
            <div class="p_bar_up p_canvas"><span>1,1,1,1,1,1,1</span></div>
            <div class="ov_text"> <strong>$0.000</strong> Weekly Sale </div>
          </li>
          <?php } 
		  
		   
	$start_date_ga_month = date('Y-m-d H:i:s',strtotime('today - 30 days'));
	$end_date_ga_month = date('Y-m-d H:i:s');	
		
	
	 	 $get_order_data_month ="SELECT DATE(order_created) AS date, SUM(billing_amt) AS billing_amount FROM order_tbl where  order_created >= '".$start_date_ga_month."' and order_created <='".$end_date_ga_month."'  GROUP BY order_created DESC limit 0,30";
		
		$run_get_order_month =mysql_query($get_order_data_month);
		$total_val_month="";
		if(mysql_num_rows($run_get_order_month)>0)  { 
		$month = 1;
		$total_cost_month = 0;
		while($row_fetch_month =mysql_fetch_array($run_get_order_month))
		{
		 $total_cost_month  = $total_cost_month+ $row_fetch_month['billing_amount'];
		$total_val_month .= $row_fetch_month['billing_amount'];
		if($month != mysql_num_rows($run_get_order_month))
		$total_val_month .=',';
		$month++;
		}
		?>
          <li>
            <div class="p_bar_up p_canvas"><span><?php echo $total_val_month ;?></span></div>
            <div class="ov_text"> <strong>$<?php echo $total_cost_month;?></strong>  Monthly Sale </div>
          </li>
          <?php } else { ?>
          <li>
            <div class="p_bar_up p_canvas"><span>1,1,1,1,1,1,1</span></div>
            <div class="ov_text"> <strong>$0.000</strong> Monthly Sale  </div>
          </li>
          <?php } ?>
          <li>
            <div class="p_line_up p_canvas"><span>3,5,9,7,12,8,16</span></div>
            <div class="ov_text"> <strong>2304</strong> Unique visitors (last 24h) </div>
          </li>
          <li>
            <div class="p_line_down p_canvas"><span>20,16,14,18,15,14,14,13,12,10,10,8</span></div>
            <div class="ov_text"> <strong>30240</strong> Unique visitors (last week) </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-lg-6">
        <div class="heading clearfix">
          <h3 class="pull-left">Latest Orders</h3>
         <span class="label pull-right"><a href="order_details.php" class="ttip_t" title="View All Orders">View More >></a></span> </div>
        <table class="table table-striped table-bordered mediaTable">
          <thead>
            <tr>
             <th class="optional">Date </th>
              <th class="optional">Order id</th>
              <th class="essential persist">Customer</th>
              <th class="optional">Billing Amount</th>
             
             
             
            </tr>
          </thead>
          <tbody>
          <?php    $get_order_latest ="SELECT customer_id,order_id,DATE(order_created) AS date, SUM(billing_amt) AS billing_amount FROM order_tbl GROUP BY order_id  ORDER BY order_created DESC limit 0,7";		
			$run_get_order =mysql_query($get_order_latest);
          if(mysql_num_rows($run_get_order)>0)
		  {
		  while($fetch_order_details_latest = mysql_fetch_array($run_get_order ))
		  {
		  $get_user= "SELECT first_name FROM user_details WHERE id=".$fetch_order_details_latest['customer_id'];	
		  $get_result =mysql_query( $get_user);	
		  $user_name_order = mysql_fetch_array( $get_result);
		  
		  
		 
		  ?>
		  <tr>
              <td><?php echo  date('m/d/Y',strtotime($fetch_order_details_latest['date'])); ?>    </td>
               <td><?php echo $fetch_order_details_latest['order_id']?></td>
              <td><?php echo $user_name_order['first_name'];?></td>
              <td>$<?php echo $fetch_order_details_latest['billing_amount']?></td>
             
            
             
            </tr>
		  
		<?php }  } else {  ?>
		  
		    
            <tr>
              <td colspan="4">No Record Founds </td>
            </tr> <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="col-sm-5">
          <div class="heading clearfix">
            <h3 class="pull-left">Latest 5 Quotes</h3>
            <span class="label pull-right"><a href="request_quote.php" class="ttip_t" title="View All Quotes">View More >></a></span> </div>
          <table class="table table-striped table-bordered mediaTable">
            <thead>
              <tr>
                <th class="optional">Date</th>
                <th class="essential persist">Name</th>
             <!--   <th class="optional">Comments</th>-->
                <th class="optional">Phone</th>
                <th class="optional">Email</th>
              </tr>
            </thead>
            <tbody>
              <?php if($Get_num_record_top_ten > 0) { 
					while ($Fetch_request_quote_ten=mysql_fetch_array($Run_record_top_ten)) {  ?>
              <tr>
                <td><?php echo  date('m/d/Y H:i:s',strtotime($Fetch_request_quote_ten['date_time'])); ?></td>
                <td><?php echo $Fetch_request_quote_ten['quote_name']?></td>
               <!-- <td><?php echo $Fetch_request_quote_ten['comment']?>..</td>-->
                <td><?php echo $Fetch_request_quote_ten['quote_phone']?></td>
                <td><?php echo $Fetch_request_quote_ten['quote_email']?></td>
              </tr>
              <?php } } else { ?>  <tr>
              <td colspan="4">No Record Founds </td>
            </tr> <?php } ?>
            </tbody>
          </table>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-5">
          <h3 class="heading">Visitors by Country <small>last week</small></h3>
          <div id="fl_2" style="height:200px;width:80%;margin:50px auto 0"></div>
        </div>
        <div class="col-sm-7">
          <div class="heading clearfix">
            <h3 class="pull-left">Visitors</h3>
            <span class="pull-right label label-info ttip_t" title="Here is a sample info tooltip">Info</span> </div>
          <div id="fl_1" style="height:270px;width:100%;margin:15px auto 0"></div>
        </div>
      </div>
  </div>
</div>
<?php require 'common/admin-sidebar.php';require 'common/admin-js-scrips.php';?>
</div>
</body>
</html>
