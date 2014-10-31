<?php require 'core/configuration.php';?>
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
            <li>
              <div class="p_bar_up p_canvas"><span>2,4,9,7,12,8,16</span></div>
              <div class="ov_text"> <strong>$3 458,00</strong> Weekly Sale </div>
            </li>
            <li>
              <div class="p_bar_down p_canvas"><span>20,15,18,14,10,13,9,7</span></div>
              <div class="ov_text"> <strong>$43 567,43</strong> Monthly Sale </div>
            </li>
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
        <div class="col-sm-12">
          <ul class="dshb_icoNav clearfix">
            <li><a href="javascript:void(0)" style="background-image: url(img/gCons/multi-agents.png)"><span class="label label-info">+10</span> Users</a></li>
            <li><a href="javascript:void(0)" style="background-image: url(img/gCons/world.png)">Map</a></li>
            <li><a href="javascript:void(0)" style="background-image: url(img/gCons/configuration.png)">Settings</a></li>
            <li><a href="javascript:void(0)" style="background-image: url(img/gCons/lab.png)">Lab</a> </li>
            <li><a href="javascript:void(0)" style="background-image: url(img/gCons/van.png)"><span class="label label-success">$2851</span> Delivery</a></li>
            <li><a href="javascript:void(0)" style="background-image: url(img/gCons/pie-chart.png)">Charts</a></li>
            <li><a href="javascript:void(0)" style="background-image: url(img/gCons/edit.png)">Add New Article</a></li>
            <li><a href="javascript:void(0)" style="background-image: url(img/gCons/add-item.png)"> Add New Page</a></li>
            <li><a href="javascript:void(0)" style="background-image: url(img/gCons/chat-.png)"><span class="label label-danger">26</span> Comments</a></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <h3 class="heading">Visitors by Country <small>last week</small></h3>
          <div id="fl_2" style="height:200px;width:80%;margin:50px auto 0"></div>
        </div>
        <div class="col-sm-7">
          <div class="heading clearfix">
            <h3 class="pull-left">Another Chart</h3>
            <span class="pull-right label label-info ttip_t" title="Here is a sample info tooltip">Info</span> </div>
          <div id="fl_1" style="height:270px;width:100%;margin:15px auto 0"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-lg-6">
          <div class="heading clearfix">
            <h3 class="pull-left">Latest Orders</h3>
            <span class="pull-right label label-danger">5 Orders</span> </div>
          <table class="table table-striped table-bordered mediaTable">
            <thead>
              <tr>
                <th class="optional">id</th>
                <th class="essential persist">Customer</th>
                <th class="optional">Status</th>
                <th class="optional">Date Added</th>
                <th class="essential">Total</th>
                <th class="essential">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>134</td>
                <td>Summer Throssell</td>
                <td>Pending</td>
                <td>24/04/2012</td>
                <td>$120.23</td>
                <td><a href="#" title="Edit"><i class="splashy-document_letter_edit"></i></a> <a href="#" title="Accept"><i class="splashy-document_letter_okay"></i></a> <a href="#" title="Remove"><i class="splashy-document_letter_remove"></i></a> </td>
              </tr>
              <tr>
                <td>133</td>
                <td>Declan Pamphlett</td>
                <td>Pending</td>
                <td>23/04/2012</td>
                <td>$320.00</td>
                <td><a href="#" title="Edit"><i class="splashy-document_letter_edit"></i></a> <a href="#" title="Accept"><i class="splashy-document_letter_okay"></i></a> <a href="#" title="Remove"><i class="splashy-document_letter_remove"></i></a> </td>
              </tr>
              <tr>
                <td>132</td>
                <td>Erin Church</td>
                <td>Pending</td>
                <td>23/04/2012</td>
                <td>$44.00</td>
                <td><a href="#" title="Edit"><i class="splashy-document_letter_edit"></i></a> <a href="#" title="Accept"><i class="splashy-document_letter_okay"></i></a> <a href="#" title="Remove"><i class="splashy-document_letter_remove"></i></a> </td>
              </tr>
              <tr>
                <td>131</td>
                <td>Koby Auld</td>
                <td>Pending</td>
                <td>22/04/2012</td>
                <td>$180.20</td>
                <td><a href="#" title="Edit"><i class="splashy-document_letter_edit"></i></a> <a href="#" title="Accept"><i class="splashy-document_letter_okay"></i></a> <a href="#" title="Remove"><i class="splashy-document_letter_remove"></i></a> </td>
              </tr>
              <tr>
                <td>130</td>
                <td>Anthony Pound</td>
                <td>Pending</td>
                <td>20/04/2012</td>
                <td>$610.42</td>
                <td><a href="#" title="Edit"><i class="splashy-document_letter_edit"></i></a> <a href="#" title="Accept"><i class="splashy-document_letter_okay"></i></a> <a href="#" title="Remove"><i class="splashy-document_letter_remove"></i></a> </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-sm-6 col-lg-6">
          <div class="heading clearfix">
            <h3 class="pull-left">Latest Images <small>(gallery grid)</small></h3>
            <span class="pull-right label label-success">10</span> </div>
          <div id="small_grid" class="wmk_grid">
            <ul>
              <li class="thumbnail"> <a href="gallery/Image04.jpg" title="Image_4 title long title long title long"> <img src="gallery/Image04_tn.jpg" alt=""> </a>
                <p> <span>163KB<br>
                  17/06/2012</span> </p>
              </li>
              <li class="thumbnail"> <a href="gallery/Image05.jpg" title="Image_5 title long title long title long"> <img src="gallery/Image05_tn.jpg" alt=""> </a>
                <p> <span>136KB<br>
                  12/06/2012</span> </p>
              </li>
              <li class="thumbnail"> <a href="gallery/Image06.jpg" title="Image_6 title long title long title long"> <img src="gallery/Image06_tn.jpg" alt=""> </a>
                <p> <span>372KB<br>
                  17/05/2012</span> </p>
              </li>
              <li class="thumbnail"> <a href="gallery/Image07.jpg" title="Image_7 title long title long title long"> <img src="gallery/Image07_tn.jpg" alt=""> </a>
                <p> <span>209KB<br>
                  20/06/2012</span> </p>
              </li>
              <li class="thumbnail"> <a href="gallery/Image08.jpg" title="Image_8 title long title long title long"> <img src="gallery/Image08_tn.jpg" alt=""> </a>
                <p> <span>263KB<br>
                  20/06/2012</span> </p>
              </li>
              <li class="thumbnail"> <a href="gallery/Image09.jpg" title="Image_9 title long title long title long"> <img src="gallery/Image09_tn.jpg" alt=""> </a>
                <p> <span>287KB<br>
                  22/05/2012</span> </p>
              </li>
              <li class="thumbnail"> <a href="gallery/Image10.jpg" title="Image_10 title long title long title long"> <img src="gallery/Image10_tn.jpg" alt=""> </a>
                <p> <span>176KB<br>
                  15/06/2012</span> </p>
              </li>
              <li class="thumbnail"> <a href="gallery/Image11.jpg" title="Image_11 title long title long title long"> <img src="gallery/Image11_tn.jpg" alt=""> </a>
                <p> <span>167KB<br>
                  10/06/2012</span> </p>
              </li>
              <li class="thumbnail"> <a href="gallery/Image12.jpg" title="Image_12 title long title long title long"> <img src="gallery/Image12_tn.jpg" alt=""> </a>
                <p> <span>358KB<br>
                  15/05/2012</span> </p>
              </li>
              <li class="thumbnail"> <a href="gallery/Image13.jpg" title="Image_13 title long title long title long"> <img src="gallery/Image13_tn.jpg" alt=""> </a>
                <p> <span>121KB<br>
                  14/05/2012</span> </p>
              </li>
              <li class="thumbnail"> <a href="gallery/Image14.jpg" title="Image_14 title long title long title long"> <img src="gallery/Image14_tn.jpg" alt=""> </a>
                <p> <span>327KB<br>
                  18/06/2012</span> </p>
              </li>
              <li class="thumbnail"> <a href="gallery/Image15.jpg" title="Image_15 title long title long title long"> <img src="gallery/Image15_tn.jpg" alt=""> </a>
                <p> <span>271KB<br>
                  20/06/2012</span> </p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8 col-lg-8">
          <h3 class="heading">Calendar</h3>
          <div id="calendar"></div>
        </div>
        <div class="col-sm-4 col-lg-4" id="user-list">
          <h3 class="heading">Users <small>last 24 hours</small></h3>
          <div class="row">
            <div class="col-lg-12">
              <div class="input-group input-group-sm sepH_b"> <span class="input-group-addon"> <i class="glyphicon glyphicon-user"></i> </span>
                <input class="user-list-search search form-control input-sm" placeholder="Search user" type="text">
              </div>
              <ul class="nav nav-pills line_sep">
                <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sort by <b class="caret"></b></a>
                  <ul class="dropdown-menu sort-by">
                    <li><a href="javascript:void(0)" class="sort" data-sort="sl_name">by name</a></li>
                    <li><a href="javascript:void(0)" class="sort" data-sort="sl_status">by status</a></li>
                  </ul>
                </li>
                <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Show <b class="caret"></b></a>
                  <ul class="dropdown-menu filter">
                    <li class="active"><a href="javascript:void(0)" id="filter-none">All</a></li>
                    <li><a href="javascript:void(0)" id="filter-online">Online</a></li>
                    <li><a href="javascript:void(0)" id="filter-offline">Offline</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <ul class="list user_list">
            <li> <span class="label label-success pull-right sl_status">online</span> <a href="#" class="sl_name">John Doe</a><br>
              <small class="s_color sl_email">johnd@example1.com</small> </li>
            <li> <span class="label label-success pull-right sl_status">online</span> <a href="#" class="sl_name">Kate Miller</a><br>
              <small class="s_color sl_email">kmiller@example1.com</small> </li>
            <li> <span class="label label-danger pull-right sl_status">offline</span> <a href="#" class="sl_name">James Vandenberg</a><br>
              <small class="s_color sl_email">jamesv@example2.com</small> </li>
            <li> <span class="label label-danger pull-right sl_status">offline</span> <a href="#" class="sl_name">Donna Doerr</a><br>
              <small class="s_color sl_email">donnad@example3.com</small> </li>
            <li> <span class="label label-danger pull-right sl_status">offline</span> <a href="#" class="sl_name">Perry Weitzel</a><br>
              <small class="s_color sl_email">perryw@example2.com</small> </li>
            <li> <span class="label label-success pull-right sl_status">online</span> <a href="#" class="sl_name">Charles Bledsoe</a><br>
              <small class="s_color sl_email">charlesb@example3.com</small> </li>
            <li> <span class="label label-danger pull-right sl_status">offline</span> <a href="#" class="sl_name">Wendy Proto</a><br>
              <small class="s_color sl_email">wnedyp@example1.com</small> </li>
            <li> <span class="label label-success pull-right sl_status">online</span> <a href="#" class="sl_name">Nancy Ibrahim</a><br>
              <small class="s_color sl_email">nancyi@example2.com</small> </li>
            <li> <span class="label label-danger pull-right sl_status">offline</span> <a href="#" class="sl_name">Eric Cantrell</a><br>
              <small class="s_color sl_email">ericc@example4.com</small> </li>
            <li> <span class="label label-success pull-right sl_status">online</span> <a href="#" class="sl_name">Andre Hill</a><br>
              <small class="s_color sl_email">andreh@example2.com</small> </li>
            <li> <span class="label label-success pull-right sl_status">online</span> <a href="#" class="sl_name">Laura Taggart</a><br>
              <small class="s_color sl_email">laurat@example3.com</small> </li>
            <li> <span class="label label-danger pull-right sl_status">offline</span> <a href="#" class="sl_name">Doug Singer</a><br>
              <small class="s_color sl_email">dougs@example2.com</small> </li>
            <li> <span class="label label-success pull-right sl_status">online</span> <a href="#" class="sl_name">Douglas Arnott</a><br>
              <small class="s_color sl_email">douglasa@example1.com</small> </li>
            <li> <span class="label label-danger pull-right sl_status">offline</span> <a href="#" class="sl_name">Lauren Henley</a><br>
              <small class="s_color sl_email">laurenh@example3.com</small> </li>
            <li> <span class="label label-danger pull-right sl_status">offline</span> <a href="#" class="sl_name">William Jardine</a><br>
              <small class="s_color sl_email">williamj@example4.com</small> </li>
            <li> <span class="label label-success pull-right sl_status">online</span> <a href="#" class="sl_name">Yves Ouellet</a><br>
              <small class="s_color sl_email">yveso@example2.com</small> </li>
            <li> <span class="label label-success pull-right sl_status">online</span> <a href="#" class="sl_name">John Doe</a><br>
              <small class="s_color sl_email">johnd@example1.com</small> </li>
            <li> <span class="label label-success pull-right sl_status">online</span> <a href="#" class="sl_name">Kate Miller</a><br>
              <small class="s_color sl_email">kmiller@example1.com</small> </li>
            <li> <span class="label label-danger pull-right sl_status">offline</span> <a href="#" class="sl_name">James Vandenberg</a><br>
              <small class="s_color sl_email">jamesv@example2.com</small> </li>
            <li> <span class="label label-danger pull-right sl_status">offline</span> <a href="#" class="sl_name">Donna Doerr</a><br>
              <small class="s_color sl_email">donnad@example3.com</small> </li>
            <li> <span class="label label-danger pull-right sl_status">offline</span> <a href="#" class="sl_name">Perry Weitzel</a><br>
              <small class="s_color sl_email">perryw@example2.com</small> </li>
            <li> <span class="label label-success pull-right sl_status">online</span> <a href="#" class="sl_name">Charles Bledsoe</a><br>
              <small class="s_color sl_email">charlesb@example3.com</small> </li>
            <li> <span class="label label-danger pull-right sl_status">offline</span> <a href="#" class="sl_name">Wendy Proto</a><br>
              <small class="s_color sl_email">wnedyp@example1.com</small> </li>
            <li> <span class="label label-success pull-right sl_status">online</span> <a href="#" class="sl_name">Nancy Ibrahim</a><br>
              <small class="s_color sl_email">nancyi@example2.com</small> </li>
            <li> <span class="label label-danger pull-right sl_status">offline</span> <a href="#" class="sl_name">Eric Cantrell</a><br>
              <small class="s_color sl_email">ericc@example4.com</small> </li>
            <li> <span class="label label-success pull-right sl_status">online</span> <a href="#" class="sl_name">Andre Hill</a><br>
              <small class="s_color sl_email">andreh@example2.com</small> </li>
            <li> <span class="label label-success pull-right sl_status">online</span> <a href="#" class="sl_name">Laura Taggart</a><br>
              <small class="s_color sl_email">laurat@example3.com</small> </li>
            <li> <span class="label label-danger pull-right sl_status">offline</span> <a href="#" class="sl_name">Doug Singer</a><br>
              <small class="s_color sl_email">dougs@example2.com</small> </li>
            <li> <span class="label label-success pull-right sl_status">online</span> <a href="#" class="sl_name">Douglas Arnott</a><br>
              <small class="s_color sl_email">douglasa@example1.com</small> </li>
            <li> <span class="label label-danger pull-right sl_status">offline</span> <a href="#" class="sl_name">Lauren Henley</a><br>
              <small class="s_color sl_email">laurenh@example3.com</small> </li>
            <li> <span class="label label-danger pull-right sl_status">offline</span> <a href="#" class="sl_name">William Jardine</a><br>
              <small class="s_color sl_email">williamj@example4.com</small> </li>
            <li> <span class="label label-success pull-right sl_status">online</span> <a href="#" class="sl_name">Yves Ouellet</a><br>
              <small class="s_color sl_email">yveso@example2.com</small> </li>
          </ul>
          <ul class="pagination paging bottomPaging">
          </ul>
        </div>
      </div>
    </div>
  </div>
  <?php require 'common/admin-sidebar.php';require 'common/admin-js-scrips.php';?>
</div>
</body>
</html>
