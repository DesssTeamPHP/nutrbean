<?php 
include('admin/core/configuration.php');
if(isset($_REQUEST['first_name']) !=''){ 

$first_name	                    = $_REQUEST['first_name'];
$last_name                      = $_REQUEST['last_name'];
$email_field                    = $_REQUEST['email_field'];
$phone_field                    = $_REQUEST['phone_field'];
$file_name                      = $_REQUEST['file_name'];

$_SESSION['first_name']   =  $first_name;
$_SESSION['last_name']    = $last_name;
$_SESSION['email_field']  = $email_field;
$_SESSION['phone_field']  = $phone_field;

header('location:product_details.php');exit;
}
include('common/header.php');
?>
  <div class="banner">
    <div class="multivation">
      <h1>Multivitamins</h1>
      <p>Formulated for Coffee Drinkers <br>
        & Caffeine Users</p>
      <ul>
        <li>Increase Nutrient Absorption*</li>
        <li>Improved Hydration*</li>
        <li>Relieve Stress*</li>
        <li>Restore Balance!*</li>
      </ul>
      <div class="supplement">
        <p>Help combat the negative effects caused by caffeine.*</p>
      </div>
      <div class="spacer"></div>
    </div>
     <form name="frm_get_start" id="frm_get_start" method="post" action="">
    <div class="sign_up">
      <div >
        <h4>50% OFF TODAY</h4>
        <p>GET STARTED TODAY!</p>
      </div>
     
      <ul>
        <li>
          <label>First Name</label>
          <br class="spacer">
          <input type="text" name="first_name" id="first_name" value="First Name"  onFocus="if(this.value == 'First Name') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'First Name';}" tabindex="1">
        </li>
        <li>
          <label>Last Name</label>
          <br class="spacer">
          <input type="text" value="Last Name"  name="last_name"  id="last_name" onFocus="if(this.value == 'Last Name') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Last Name';}" tabindex="2">
        </li>
        <li>
          <label>Phone Number</label>
          <br class="spacer">
          <input type="text" id="phone_field"  onKeyDown="return mask(event,this)" onKeyUp="return mask(event,this)" maxlength="12" onBlur="if (this.value == '') {this.value = 'Phone';}" onFocus="if(this.value == 'Phone') {this.value = '';}" name="phone_field" tabindex="3" value="Phone">
        </li>
        <li>
          <label>Email</label>
          <br class="spacer">
          <input type="text" name="email_field" id="email_field"  maxlength="50"  onFocus="if(this.value == 'Email') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Email';}" value="Email" tabindex="4">
        </li>
        <li class="spacer"></li>
        <li>
          <input type="checkbox" style="width:25px;margin:0px;height:auto;margin-bottom:15px;">
          <span>Yes! send me promotions!</span> </li>
        <li class="spacer"></li>
      </ul>
      <a href="#" class="button_1" onClick="return formValidator();">I'M READY!</a> <span class="spacer"></span> <br class="spacer">
      <br>
      <span class="virus" style="margin:-10px  40px;"><a href="#"><img src="images/norton.png" alt="" title=""></a> <a href="#"><img src="images/mc.png" alt="" title=""></a> </span> <br class="spacer">
    </div>
    </form>
    <div> </div>
    <div class="spacer"></div>
  </div>
</div>
<div class="container">
<div class="try">
<ul>
<li><img src="images/30_granteed1.jpg" alt="" title="" /></li>
<li>
<h3>TRY RISH FREE TODAY!</h3>
<p>We are so confident that you will see fast dramatic results in the way you feel that if you are not </p>
<p>competely satisfied within 30 days, simply return your bottle for a full refund. We will even give you a</p>
<p>$5 Starbuck gift card just for trying it out. TRY NOW! </p>
</ul>
</div>
  <div class="heading_1 ">
    <h2>What to Know before you next cup of coffee! </h2>
    <ul>
      <li>
        <div>
          <p>Learn More</p>
          <hr class="hr_1">
          <ol>
            <li>How Caffeine Affects your Body</li>
            <li>Role of Nutrients Affected by Coffee</li>
            <li>How to Take Vitamins with your Coffee</li>
            <li>FAQ</li>
          </ol>
          <br class="spacer">
          <hr class="hr_1">
          <span>
          <p>Alredy take a Multivitamin? </p>
          <br class="spacer">
          <a href="#">Click here</a> <br class="spacer">
          </span> </div>
        <br class="spacer">
      </li>
      <li>
        <embed width="420" height="345"
				src="http://www.youtube.com/v/XGSy3_Czz8k"
				type="application/x-shockwave-flash">
        <h5>Try Now and Get 50% off Your First Bottle</h5>
      </li>
      <li class="spacer"></li>
      <br class="spacer">
    </ul>
    <div class="spacer"></div>
  </div>
</div>
<div class="container">
<div class="specific">
<h2>Nutrabean is safe and specifically For caffeine users</h2>
<hr class="hr_2">
<p>ALL NATURAL DIETARY SUPPLEMENT FORMULATED TO COMBAT THE UNWANTED EFFECTS OF CAFFEINE, HELPING RESTORE BALANCE TO YOUR BODY. NUTRABEAN CAN HELP YOU:</p>
<ul>
<li> <span><img src="images/icon/mental.png" title="" alt="" ></span>
  <p>Enhances Mental Clarity & Concentration</p>
</li>
<li> <span><img src="images/icon/health.png" title="" alt=""></span>
  <p>Promotes Healthy Cardiovascular Function</p>
</li>
<li> <span><img src="images/icon/increase_resit.png" title="" alt=""></span>
  <p>Increases Resistance to Fatigue & Tension</p>
</li>
<li class="spacer"></li>
<li> <span><img src="images/icon/boost.png" title="" alt=""></span>
  <p>Boost Energy Levels</p>
</li>
<li> <span><img src="images/icon/promotes.png" title="" alt="" ></span>
  <p>Promotes Well Being</p>
</li>
<li> <span><img src="images/icon/leaf.png" title="" alt="" ></span>
  <p>All Natural  & Safe</p>
</li>
<li class="spacer"></li>
<li> <span><img src="images/icon/increase.png" title="" alt="" ></span>
  <p>Increases Nutrient Absorption</p>
</li>
<li> <span><img src="images/icon/enhances.png" title="" alt=""></span>
  <p>Enhances Electrolyte & Water Absorption</p>
</li>
<ul>
<div class="spacer"></div>
</div>
<div class="bg_3 fleft specific_1">
  <p>Don´t let life slow you down, get on the road to restoring the balance your body needs today with Nutrabean. Caffeine may provide short-term energy but can actually drain your body of energy a few hours after consumptions. Nutrabean helps provides sustained energy throughout the day.</p>
  <div class="spacer"></div>
</div>
<div class="fleft specific_2">
  <p>The clinically studied ingredient found in Nutrabean Showed a 79% increase in energy compared to a placebo 
    group. The group also had significant reductions in symptoms normally considered side effects of stimulants 
    including flushing and sweating, headche heart palpitations, insomnia,irritability, and inability to concentrate.</p>
  <div class="spacer"</div>
</div>
</div>
<div class="container">
  <div class="doctor_add fleft border_top_bottom">
    <ul>
      <li> <img src="images/doctor.jpg" alt="" title=""> </li>
      <li>
        <div> <img src="images/tablet_box_1.png" alt="" title=""> <span> <img src="images/nutrabean.png" alt="" title=""> <br class="spacer">
          <p>Revolutionary Multivitamin for coffee drinkers formulated using4 clinically proven ingredients to help restore balance.</p>
          </span> </div>
      </li>
    </ul>
    <div class="spacer"></div>
  </div>
  <div class="spacer"></div>
</div>
<div class="spacer"></div>
<div class="container">
<div class="caffine">
  <h2>How Caffeine Effects your Body</h2>
  <div class="spacer"></div>
</div>
<div class="caffine_effects">
  <div class="fleft possitive"> <a class="read_more1" href="#">POSITIVE EFFECTS</a>
    <ul>
      <li>Increases attention and alertness.</li>
      <li>Lower risk of <br>
        cardiovascular disease</li>
      <li style="margin:-80px 0px 0px 0px;">Lower risk of diabetes<br>
        Increase metabolic rate</li>
    </ul>
    <div class="spacer"></div>
  </div>
  <div class="fright negative"> <a class="read_more2" href="#">NEGATIVE EFFECTS</a>
    <ul>
      <li>
        <h6>Stress:</h6>
        Coffee Stimulates the central nervous system, which is interpreted as stress by your adrenal glands. The adrenal glands produce the same stress hormones that prepare your body for "fight or flight". When this occurs repeatedly in response to your for daily caffeine consumption, it can lead to light blood pressure and adrenal fatigue. Short term effects include an increased heart rate taht can cause you to feel jitterthat can cause you to feel jittery or anxious.</li>
      <li>
        <h6>Hydration:</h6>
        The caffeine in coffee has long been considered a diuretic, which is a substance that promotes the formation of urine... making you need to go more frequently,</li>
      <li style="padding:15px 0px 0px 0px;">
        <h6>Nutrient Absorption:</h6>
        Caffeine can affect nutrient balance in your body</li>
    </ul>
    <div class="spacer"></div>
  </div>
</div>
<div class="container">
  <div class="clinic bg_4">
    <p>Clinical studies have indicated that the additional ingredients in Nutrabean. Multivitamins can help combat some of coffees unwanted affects.</p>
  </div>
</div>
<div class="container">
  <div class="caffine">
    <h2>Nutrient Deficiency has many causes</h2>
    <div class="spacer"></div>
  </div>
  <div class="causes">
    <p>Many conditions and lifestyles choices can lead to nutrient deficiency. it is important to understand how these choices impact your health.</p>
    <h6>Some symptoms include:</h6>
    <ul class="causes_ul_1">
      <li>Lack of energy or strength/ tiredness</li>
      <li>Dry Skin</li>
      <li>Inability to fall or stay asleep</li>
      <li>Anxiety or Depression-related Symptoms</li>
    </ul>
    <ul class="causes_ul_2">
      <li>Joint Pain and/or Muscle pain</li>
      <li>Muscle Cramping and Stomach Discomfort</li>
      <li>Compromised Immune System</li>
      <li>Headache and circulatory <br>
        and heart rate problems</li>
      <br class="spacer">
    </ul>
    <div class="spacer"></div>
    <span>
    <p>These Symptoms can affect your work, family, and your overall well being and enjoyment of life. However, you don't have to let lifestyle choices bring you down. </p>
    <h3>Restore balance today with nutrabean!</h3>
    <div class="spacer"></div>
    <img src="images/causes.png" alt="" title="" > </span>
    <div class="spacer"></div>
  </div>
  <div class="key_clinic">
    <h2>Key  Clinically  Studied  Ingredients  For Restoring  A  Healthy  Balance</h2>
    <p>Is restoring a healthy balance is important to you? Nutrabeans 4 unique compounds. each combating the unwanted affects caffeine can have.</p>
    <div > <img src="images/tablet.png" alt="" title=""> <br class="spacer">
      <a href="" class="button_3">Get Started!</a> <br class="spacer">
    </div>
    <ul>
      <li>
        <h3>ASTRAGIN</h3>
        <p>AstraGin is a 100% natural plant-based food ingredient that improves the absorption and bio-availability of essential nutrients including amino acids, glucose and vitamins.</p>
      </li>
      <br class="spacer">
      <li>
        <h3>BIOPERINE</h3>
        <p>Protected by  U.S. Patents 5,36,506,161; 5,972,382 Bioperine Black Peper Extract is clinically tested, patented form of piperine - the alkaloid in black pepper. Bioperine enhances bioavailability by stimulating the body´s natural thermogenic activity, which increases the absortion of nutrients.</p>
      </li>
      <br class="spacer">
      <li>
        <h3>SUSTAMINE</h3>
        <p>Sustamine is the only GRAS (Generally Recognized as Safe) form of L-Ananyl-L-Glutamine. It increases electrolyte and fluid uptake in the intestines and protects the gastrointestinal tract to help enhance nutrient absorption.</p>
      </li>
      <br class="spacer">
      <li>
        <h3>SENSORIL</h3>
        <p>Protected by U.S. Patents 6,153,198; 6,713,092 NutraBean utilizes Sensoril, a multi-patented, all natural, standardized extract of Ashwagandha (Witania somnifera) with the highest, most potent levels of stress-fighting, cognition-enhancing Aswagandha bioactive constituents in the industry.</p>
      </li>
    </ul>
    <br class="spacer">
    <h6>Nutrabean´s  unique blend is all-natural and safe. Manufactured in US laboratories under FDA GMP Guidelines (Good Manufacturing Practices) to ensure purity and quality.</h6>
  </div>
  <div class="role">
    <h2>Role of Nutrients Affected by Coffee</h2>
    <ul class="role_1">
      <li> <span> <img src="images/ca.jpg" alt="" title=""> </span>
        <div>
          <h6>Calcium</h6>
          <p>With regular consumption, caffeine may reduce quantities of the alkalizing mineral calcium in your body.</p>
        </div>
      </li>
      <li> <span> <img src="images/mg.jpg" alt="" title=""> </span>
        <div>
          <h6>Magnesium</h6>
          <p>Magnesium is a mineral essential to every organ in the body.</p>
        </div>
      </li>
      <br class="spacer">
    </ul>
    <ul class="role_2">
      <li> <span><img src="images/icon/right_icon.png" alt="" title=""></span>
        <p>Builds strong bones & teeth</p>
      </li>
      <li> <span><img src="images/icon/right_icon.png" alt="" title=""></span>
        <p>Magnesium Regulates Heart Rhythm & Blood Pressure.</p>
      </li>
      <br class="spacer">
      <li> <span><img src="images/icon/right_icon.png" alt="" title=""></span>
        <p>Plays a critical role in heart function & blood pressure regulation.</p>
      </li>
      <li> <span><img src="images/icon/right_icon.png" alt="" title=""></span>
        <p>Stimulates energy production.</p>
      </li>
      <br class="spacer">
    </ul>
    <ul class="role_1">
      <li> <span> <img src="images/bv.jpg" alt="" title=""> </span>
        <div>
          <h6>B Vitamins</h6>
          <p>B Vitamins contribute to a variety of critical body processes including.</p>
        </div>
      </li>
      <li> <span> <img src="images/fe.jpg" alt="" title=""> </span>
        <div>
          <h6>Iron</h6>
          <p>According to the University of Notre Dame, coffee can decrease the absorption of iron by as much as 39 percent.</p>
        </div>
      </li>
      <br class="spacer">
    </ul>
    <ul class="role_2">
      <li> <span><img src="images/icon/right_icon.png" alt="" title=""></span>
        <p>Helps the body convert food into glucose, which provides energy.</p>
      </li>
      <li> <span><img src="images/icon/right_icon.png" alt="" title=""></span>
        <p>Iron is a necesary mineral for red blood cell development.</p>
      </li>
      <br class="spacer">
      <li> <span><img src="images/icon/right_icon.png" alt="" title=""></span>
        <p>Helps boost the inmune system.</p>
      </li>
      <li> <span><img src="images/icon/right_icon.png" alt="" title=""></span>
        <p>Delivers oxygen to your cells.</p>
      </li>
      <br class="spacer">
    </ul>
    <div class="spacer"></div>
  </div>
</div>
<div class="nutra_works">
  <h2>How Nutrabean Works</h2>
  <div class="spacer"></div>
  <div class="step_follows">
    <div class="step_1">
      <ul>
        <li> <img src="images/work_steps1.jpg" alt="" title=""> <br class="spacer">
          <span>Increases Nutrient Absorption</span> </li>
        <li class="spacer"></li>
        
        <li style="margin:22px 14px 0px 5px">
        <img src="images/work_steps2.png" alt="" title=""> 
          <p>Increases Resistance to Fatigue & Tension</p>
          </li>
          
          
        <li style="margin:-164px 0 0 245px">
          <img src="images/work_steps3.png" alt="" title="">
          <p class="step_2">Boost Energy Levels</p>
           </li>
        <br class="spacer">
      </ul>
      <div >
        <p>Are you ready to feel the difference you have been waiting for?</p>
        <br class="spacer">
        <a href="#" class="fleft">Try Now !
        <p>And save 50% off today!</p>
        </a> <img src="images/mcaee.png" class="fright" alt="" title=""> <br class="spacer">
      </div>
      <br class="spacer">
    </div>
    <div class="step_2">
      <ul>
        <li><img src="images/logo_1.png" alt="" title=""></li>
        <li><img src="images/logo_2.png" alt="" title=""></li>
        <li><img src="images/logo_3.png" alt="" title=""></li>
        <li class="spacer"></li>
      </ul>
      <br class="spacer">
      <div> <span>STEP 1</span>
        <p>AstraGin increases chemicals in the human body called "transporter" and "mRNA". These chemicals determine how much or less specific nutrients are absorbed into the intestinal cells and thus are available to support and promote our health and well being. By allowing a greater amount of these nutrients to pass from the blood stream into the cells, AstraGin TM provides for truly improved bioavailability. </p>
        <span>STEP 2</span>
        <p>Sensoril decreasing serum cortisol and acts as a metabolic regulator that increases your body´s ability to adjust to environmental stressors. Sensoril also help boost energy at the cellular level by increasing ATP and DHEA </p>
        <span>STEP 3</span>
        <p>Nutrabean is enhanced with key vitamins and minerals needed to support energy production and nutrient metabolism. Each serving contains potent levels of antioxidants such as Vitamin C, E, and Selenium. </p>
      </div>
      <br class="spacer">
    </div>
  </div>
</div>
<div class="spacer"></div>
<div class="vitamins">
  <div class="common_head">
    <h2>How to take Vitamins with your Coffee</h2>
  </div>
  <div class="spacer"></div>
  <ul>
    <li> <img src="images/step1.jpg" alt="" title="">
      <p style="text-align:left;"> For best results take your Nutrabean multivitamins one hours prior to of after consuming caffeine. </p>
    </li>
    <li style="width:238px;"> <img src="images/step2.jpg" alt="" title="">
      <p> Stimulate your inner brillance! </p>
    </li>
    <li style="width:238px;"> <img src="images/step3.jpg" alt="" title="">
      <p> Restore Balance </p>
    </li>
  </ul>
</div>
<div class="container">
  <div class="drinkers">
    <div class="common_head2">
      <h2> Nutrabeans is the Best Multimitavin choice for coffee drinkers </h2>
    </div>
    <p>When searching for a multavitamin, look for a dietary supplement that takes your lifestyle into consideration.</p>
    <hr class="hr_3">
    </hr>
    <div class="multi">
      <ul class="multi_head">
        <li>
          <h4>&nbsp;</h4>
        </li>
        <li>
          <h4>Nutrabean ™</h4>
        </li>
        <li>
          <h4>Centrum &reg;</h4>
        </li>
        <li>
          <h4>One A Day &reg;</h4>
        </li>
        <br class="spacer">
      </ul>
      <hr class="hr_4">
      </hr>
      <ul class="multi_inner">
        <li>
          <p>Vitamin A,B,C,D,E</p>
        </li>
        <li><img src="images/icon/right_green.jpg" alt="" title=""></li>
        <li><img src="images/icon/right_grey.jpg" alt="" title=""></li>
        <li><img src="images/icon/right_grey.jpg" alt="" title=""></li>
        <br class="spacer">
      </ul>
      <ul class="multi_inner">
        <li>
          <p>Mineral Blend</p>
        </li>
        <li><img src="images/icon/light_green2.jpg" alt="" title=""></li>
        <li><img src="images/icon/right_grey.jpg" alt="" title=""></li>
        <li><img src="images/icon/right_grey.jpg" alt="" title=""></li>
        <br class="spacer">
      </ul>
      <ul class="multi_inner">
        <li>
          <p>Sustamine for Fluid Balance Support</p>
        </li>
        <li><img src="images/icon/right_green.jpg" alt="" title="" ></li>
        <li>&nbsp;</li>
        <li>&nbsp;</li>
        <br class="spacer">
      </ul>
      <ul class="multi_inner">
        <li>
          <p>Sensoril for AdrenalSupport</p>
        </li>
        <li><img src="images/icon/light_green2.jpg" alt="" title=""></li>
        <li>&nbsp;</li>
        <li>&nbsp;</li>
        <br class="spacer">
      </ul>
      <ul class="multi_inner">
        <li>
          <p>Astragin for Nutrient absorption support</p>
        </li>
        <li><img src="images/icon/right_green.jpg" alt="" title=""></li>
        <li>&nbsp;</li>
        <li>&nbsp;</li>
        <br class="spacer">
      </ul>
      <ul class="multi_inner">
        <li>
          <p>Multi Enzyme Blend</p>
        </li>
        <li><img src="images/icon/light_green2.jpg" alt="" title=""></li>
        <li>&nbsp;</li>
        <li>&nbsp;</li>
        <br class="spacer">
      </ul>
      <ul class="multi_inner">
        <li>
          <p>Antioxidants</p>
        </li>
        <li><img src="images/icon/right_green.jpg" alt="" title=""></li>
        <li>&nbsp;</li>
        <li>&nbsp;</li>
        <br class="spacer">
      </ul>
      <ul class="multi_inner">
        <li>
          <p>Recommended Choice</p>
        </li>
        <li><img src="images/icon/light_green1.jpg" alt="" title=""></li>
        <li>&nbsp;</li>
        <li>&nbsp;</li>
        <br class="spacer">
      </ul>
      <br class="spacer">
      <br class="spacer">
    </div>
    <br class="spacer">
    <span> *Centrum Multivitamin Multimineral Supplement for Adults Under 50 <br class="spacer">
    </span> <span> * One Day Men & Women multivitamins </span> </div>
  <br class="spacer">
</div>
<div class="container">
<div class="faq">
<div class="common_head">
  <h2>Frequently Asked Questions About Nutrabean</h2>
</div>
<ul>
<?php 
	                  $select_frequent               =             'select * from   frequent_tbl limit 0,3';
                      $frequent_execute              =              mysql_query($select_frequent);
                      if(!$frequent_execute)
                      echo mysql_error();
                      $frequent_count                =              1;
                      $frequent_num_Records          =              mysql_num_rows($frequent_execute);
                      if(mysql_num_rows($frequent_execute)>0)
	                  {
	                  while ($frequent_results       =              mysql_fetch_array($frequent_execute)) 
	                  { 
	                  if($frequent_count ==1)
		              {
		              $frequent_style                =              '';
		              }
		              else
		              {
		              $frequent_style                =              '';
		              }
                      echo '<li>
					  	                 <span><strong>Q :'.stripslashes($frequent_results['frequent_name']).'</strong></span>
                    <p>A:'.stripslashes(substr($frequent_results['frequent_desc'],0,500)).'</p>
                    </li>';
	                $frequent_count++;
			
 }}
?>

<ul>
<div class="spacer"></div>
</div>
</div>
<div class="people_say">
  <div class="common_head3">
    <h2>Read What People Like You Are Saying About Nutrabean</h2>
  </div>
  <p>These Are Actual Reviews From Real Customers. Results May Vary.</p>
  
  <?php 
	            $select_testiomial             =     'select * from  testimonial_tbl limit 0,2';
                $testiomial_execute            =     mysql_query($select_testiomial);
                if(!$testiomial_execute)
                echo mysql_error();
                $testiomial_count              =     1;
                $testiomial_num_Records        =     mysql_num_rows($testiomial_execute);
                if(mysql_num_rows($testiomial_execute)>0)
	            {
	            while($testiomial_results      =     mysql_fetch_array($testiomial_execute)) 
	            { 
	            if($testiomial_count ==1)
		        {
		        $testiomial_style               =    'class="testimonials MT_10"';
		        }
		        else
		        {
		        $testiomial_style               =    'class="testimonials"';
		        }
                echo ' <div class="box_nav"> 
	 
	            <img src="admin/uplodeImage/testimonial/'.$testiomial_results['testimonial_image'].'" width="130" height="133"  alt="'.$testiomial_results['testimonial_image'].'" title="'.$testiomial_results['testimonial_image'].'" />
			     
			   <div class="arrow_box1 ">
                <p>'.substr(stripslashes($testiomial_results['testimonial_comment']),0,1000).'</p>
               </div>
               <span>
              <p><small>-'.$testiomial_results['testimonial_name'].'</small></p>
               </span> </div>';
			   $testiomial_count++;
			
 }}
 ?>
  
  
</div>
<div class="satisfaction">
  <div class="common_head5">
    <h2>SATISFACTION GAURANTEED! </h2>
  </div>
  <p>We are so confident that you´ll see fast dramatic results in theway you feel that if you 
    aren´t completely satisfied after 30 days, simply return your bottle for a full refund. 
    We will even give you a $5 Starbuck gift card just for trying it out.</p>
  <img src="images/medical.jpg" alt="" title="">
  <h5>Get on the Road to Restoring the Balance
    your Body needs Today! </h5>
  <div> <a href="" style="margin:0px 0px 0px 100px;" ><img  src="images/get_started.png" alt=""  title=""> </a> </div>
  <a href="" style="margin:-100px 0px 0px 145px; !important"><img src="images/mcc.png" alt="" title=""></a> <span> </span> </div>
<div class="spacer"></div>
</div>
</div>
</div>
</body>
</html>
