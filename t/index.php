<?php
//echo @$_POST["yearmodel-top"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>carqualifier.com</title>
        <!-- Bootstrap core CSS -->
        <!-- Custom styles for this template -->

		<?php if ($qualified['status'] == '1') { ?>
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/qualified_virtual-showroom.css">
		<?php } else { ?>
			<link href="<?php echo base_url(); ?>assets/css/virtual-showroom.css" rel="stylesheet">
		<?php } ?>


        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.mCustomScrollbar.css"/>


		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.mCustomScrollbar.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lightbox.css">
        <link href="<?php echo base_url(); ?>assets/css/video-js.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>assets/js/video.js"></script>

        <!--[if lt IE 9]>
          <script src="<?php echo base_url(); ?>assets/js/html5shiv.min.js"></script>
        <![endif]-->

        <style>

            .amit {
                background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
                border: medium none;
                height: 36px;
                margin: 0 0 0 17px;
                min-width: 100%;
                outline: medium none;
                padding-bottom: 6px;
                text-align: left;
            }
            .spritespin
            {
                position:none important;


            }
            .modelImg{

            }
        </style>
        <script>
			$(document).ready(function() {
				$("#ak").click(function() {
					$(".fav").slideToggle();
				});

				$(".menu_tog").click(function() {
					//alert("dfdfdfdfdf");
					$("#monthly_budget").slideToggle();
					$("#calculation").hide();
				});

				$("#amt").click(function() {
					//alert("yogeshfdfdfdf");
					$("#monthly_budget").hide();
					$("#calculation").slideToggle();
				});
			});

			img_url = '<?php echo base_url(); ?>';
			session_id = '<?php echo $qualified['users_id']; ?>';

        </script>
    </head>0
    <body>
		<?php
		if (!empty($this->pagination)) {
			$pages = ($this->pagination->per_page * $this->pagination->cur_page);
			$total_num_page = $this->pagination->total_rows;
			$currentpage = $this->pagination->cur_page;
			if ($currentpage == '1') {
				$currentpage = $currentpage;
				if ($total_num_page < 10) {
					$ofpage = $total_num_page;
				} else {
					$ofpage = $this->pagination->per_page;
				}
			} else {
				$currentpage = ($currentpage * $this->pagination->per_page) + 1;
				if ($total_num_page < 10) {
					$ofpage = $total_num_page;
				} else {
					$ofpage = ($this->pagination->num_links * $this->pagination->per_page);
				}
			}

			$current_num_page = ($pages > $total_num_page) ? $total_num_page : $pages;
		} else {
			$total_num_page = 1;
			$current_num_page = 1;
		}

		$year = $this->uri->segment(4);

		$model = $this->uri->segment(5);
		$model = urldecode(trim($model));

		$submodel = $this->uri->segment(6);
		$submode = urldecode(trim($submodel));
		$ld = $this->session->all_userdata();

		if (!empty($ld['filterpaycq'])) {
			$filterpaycq = $ld['filterpaycq'];
			if ($filterpaycq == 'lth') {
				$sel1 = 'selected="selected"';
				$sel2 = '';
			}
			if ($filterpaycq == 'htl') {
				$sel2 = 'selected="selected"';
				$sel1 = '';
			}
			if ($filterpaycq == 'a-z') {
				$az = 'selected="selected"';
				$za = '';
			}
			if ($filterpaycq == 'z-a') {

				$za = 'selected="selected"';
				$az = '';
			}
		}
		?>
        <form  method="post" id="virtual-show-room" action='<?php echo $_SERVER['PHP_SELF']; ?>'>
			<input type="hidden" value="0" id="frmtype" name="frmtype"/>
			<div style="width:1350px; margin:auto">
                <div class="main">
                    <div class="row full-width panel1">
                        <div class="col-md-9 main-left-side">
                            <div class="main_slider">
                                <div class="main_slider1">
                                    <div class="main_slider_box">
                                        <img src="<?php echo base_url(); ?>assets/img/2.png" alt="" />
                                        <div class="main_slider_detail" style="margin-left:-80px; margin-top:30px">
                                            <label class="head" style=" font-size:40px; margin-left:100px"><span style="color:#F12932;">Virtual</span> Showroom</label>
                                            <label class="des" style="  margin-left:44px; font-family: 'cq-ttf';color: #d8dce0; font-weight:530; font-size:21px; font-stretch:extra-expanded; ">Click or Tap the Virtual Showroom<span style="position:relative; top:-4px"><sup style="font-size:9px;  ">TM</sup></span> buttons or Auto Images, to view Photos, Videos, Colors,</label>
                                            <label class="des1" style="  margin-left:90px;  font-family: 'cq-ttf';color: #d8dce0; font-weight:530; font-size:18px; font-stretch:extra-expanded;">Specifications, Factory Rebates, Standard Equipment, and Avilable Options.</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="main_slider2">
                                    <div class="main_slider_box">
                                        <img src="<?php echo base_url(); ?>assets/img/2.png" alt="" />
                                        <div class="main_slider_detail" style="margin-left:-80px; margin-top:30px">
                                            <label class="head" style=" font-size:40px; margin-left:100px"><span style="color:#F12932;">Virtual</span> Showroom</label>
                                            <label class="des" style="  margin-left:44px; font-family: 'cq-ttf';color: #d8dce0; font-weight:530; font-size:21px; font-stretch:extra-expanded; ">Click or Tap the Virtual Showroom<span style="position:relative; top:-4px"><sup style="font-size:9px;  ">TM</sup></span> buttons or Auto Images, to view Photos, Videos, Colors,</label>
                                            <label class="des1" style="  margin-left:90px;  font-family: 'cq-ttf';color: #d8dce0; font-weight:530; font-size:18px; font-stretch:extra-expanded;">Specifications, Factory Rebates, Standard Equipment, and Avilable Options.</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="main_slider3">
                                    <div class="main_slider_box">
                                        <img src="<?php echo base_url(); ?>assets/img/2.png" alt="" />
                                        <div class="main_slider_detail" style="margin-left:-80px; margin-top:30px">
                                            <label class="head" style=" font-size:40px; margin-left:100px"><span style="color:#F12932;">Virtual</span> Showroom</label>
                                            <label class="des" style="  margin-left:44px; font-family: 'cq-ttf';color: #d8dce0; font-weight:530; font-size:21px; font-stretch:extra-expanded; ">Click or Tap the Virtual Showroom<span style="position:relative; top:-4px"><sup style="font-size:9px;  ">TM</sup></span> buttons or Auto Images, to view Photos, Videos, Colors,</label>
                                            <label class="des1" style="  margin-left:90px;  font-family: 'cq-ttf';color: #d8dce0; font-weight:530; font-size:18px; font-stretch:extra-expanded;">Specifications, Factory Rebates, Standard Equipment, and Avilable Options.</label>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div  style="margin-top:-15px">
							<?php echo $this->load->view('cq_templates/cq_right_menubar'); ?>
                        </div>
                        <div class="main_bottom_bar"  style=" height:200px; position:absolute; width:1000px; top:660px;">
							<div id="calculation" style="display:none">
								<div class="sel_vec1" style="margin-left:-28px;  ">
									<label>Select Your Monthly Budget:</label>
									<div class="minimum">
										<p style="position:relative; left:5px;">
											Minimum Payment
										</p>

										<input type="text" value="<?php
										if (!empty($minpay)) {
											echo $minpay;
										} else {
											echo '100';
										}
										?>" id="minpay" name="minpay" class="model" style="padding-left:5px !important; color:#CCC; font-size:14px; width:135px !important; margin-right:15px;" onkeyup="if (/\D/g.test(this.value))
			this.value = this.value.replace(/\D/g, '')">
										<span style="position: relative; right: -13px; top: -28px;">$</span>
									</div>
									<div class="maximum">
										<p style="position:relative; left:15px;">
											Maximum Payment
										</p>
										<span style="position: relative; left: 22px; top: -1px">$</span>
										<input type="text" value="<?php
										if (!empty($maxpay)) {
											echo $maxpay;
										} else {
											echo '1000';
										}
										?>" id="maxpay" name="maxpay" class="model_boby" style="padding-left:5px !important; font-size:14px;  width:135px !important; " onkeyup="if (/\D/g.test(this.value))
														   this.value = this.value.replace(/\D/g, '')">
										<input type="button" style="  border:2px solid #2ab704 !important; margin-left:20px" value="GO" class="model_boby_go bg_green"  id="btnmaxFilter">
									</div>
								</div>

								<div class="get_certificate1">

									<label>Choose a Body Style:</label><img src="<?php echo base_url(); ?>/assets/images/menu_icon.jpg" class="menu_tog" style=" position:absolute; right:22px; opacity:0.7; cursor:pointer;  top:30px">
									<div class="choose_body">
										<ul>
											<li><input type="checkbox" name="bt_coupe" id="checkboxG1" class="css-checkbox checkboxG" value="Coupe" /><label for="checkboxG1" class="css-label">Coupe</label></li>
											<li><input type="checkbox" name="bt_sedan" id="checkboxG2" class="css-checkbox checkboxG" value="Sedan" /><label for="checkboxG2" class="css-label">Sedan</label></li>
											<li><input type="checkbox" name="bt_hybrid" id="checkboxG3" class="css-checkbox checkboxG" value="Hybrid" /><label for="checkboxG3" class="css-label">Hybrid</label></li>
											<li><input type="checkbox" name="bt_minivan" id="checkboxG4" class="css-checkbox checkboxG" value="Minivan" /><label for="checkboxG4" class="css-label">Mini Van</label></li>
											<li><input type="checkbox" name="bt_suv" id="checkboxG5" class="css-checkbox checkboxG" value="SportUtilityVehicles"  /><label for="checkboxG5" class="css-label">SUV</label></li>
											<li><input type="checkbox" name="bt_truck" id="checkboxG6" class="css-checkbox checkboxG" value="truck" /><label for="checkboxG6" class="css-label">Truck</label></li>
											<li><input type="checkbox" name="bt_wagon" id="checkboxG7" class="css-checkbox checkboxG" value="Wagon" /><label for="checkboxG7" class="css-label">Wagon</label></li>
											<li><input type="checkbox" name="bt_convertible" id="checkboxG8" class="css-checkbox checkboxG" value="Convertible" /><label for="checkboxG8" class="css-label">Convertible</label></li>
										</ul>
									</div>                    
								</div>   
							</div>				
							<div id="monthly_budget" >

								<div class="sel_vec">
									<label>Adjust Lease Terms:</label>
									<table border="0" cellpadding="10" style="margin-top: 16px;">
										<tr>
											<td width="152">
												<p style="margin-bottom:5.9px;">Total Cash</p></td>
											<td width="40">
												<p style="margin-left:1em; margin-bottom:5.9px;">Term</p></td>
											<td>&nbsp;&nbsp;&nbsp;</td>
											<td width="195">
												<p style=" margin-left:-105px; margin-bottom:5.9px;">Miles Per Year</p></td>
										</tr>
										<tr>
											<td>
												<input type="text"   class="mik" name="total_cash" value="<?php
												if (!empty($_POST['total_cash'])) {
													echo $_POST['total_cash'];
												} else {
													echo '$2000';
												}
												?>"  style="background-color: #fff; color:#000; border:1px solid #CCC; font-size:14px;  padding: 6px 6px 6px 15px; text-align:left; margin-left:0px; width:120px;" onkeyup="if (/\D/g.test(this.value))
																   this.value = this.value.replace(/\D/g, '')">

											</td>
											<td width="185">
												<div class="join_select" style=" margin-left:13px; color:#333 important; width:120px;">
													<select id="amit" name="term_lease" >
														<?php
														if (!empty($_POST['term_lease'])) {
															$tm = $_POST['term_lease'];
														}
														?>
														<option value="12" <?php
														if ($tm == '12') {
															echo 'selected="selected"';
														} else {
															echo '';
														}
														?>>12 Months</option>
														<option value="24" <?php
														if ($tm == '24') {
															echo 'selected="selected"';
														} else {
															echo '';
														}
														?>>24 Months</option>
														<option value="36" selected <?php
														if ($tm == '36') {
															echo 'selected="selected"';
														} else {
															echo '';
														}
														?>>36 Months</option>
														<option value="48" <?php
														if ($tm == '48') {
															echo 'selected="selected"';
														} else {
															echo '';
														}
														?>>48 Months</option>
													</select>
												</div>
											</td><td>
												<div class="join_select" style="margin-left:8px;">
													<select id="amit" name="miles_per_year">
														<?php
														if (!empty($_POST['miles_per_year'])) {
															$ml = $_POST['miles_per_year'];
														}
														?>
														<option value="12000" selected <?php
														if ($ml == '12000') {
															echo 'selected="selected"';
														} else {
															echo '';
														}
														?>>12,000</option>
														<option value="15000" <?php
														if ($ml == '15000') {
															echo 'selected="selected"';
														} else {
															echo '';
														}
														?>>15,000</option>
														<option value="20000" <?php
														if ($ml == '20000') {
															echo 'selected="selected"';
														} else {
															echo '';
														}
														?>>20,000</option>
													</select>
												</div>
											</td>
											<td width="141">
												<div style="margin-left:20px;">
													<input type="submit" name="xc" value="GO" style="width:70px;" class="bg_green" id="btnLease"></div>
											</td>
										</tr>
									</table>

								</div>
								<div class="get_certificate">

									<label>Adjust Loan Terms:</label><img src="<?php echo base_url(); ?>/assets/images/menu_icon.jpg" id="amt" style=" position:absolute; right:21px; opacity:0.7;  top:29px; cursor:pointer;">
									<table border="0" cellpadding="10"  style="margin-top: 16px;">
										<tr>
											<td>
												<p style="margin-bottom:6.3px;">Down Payment</p></td>
											<td>
												<p style="margin-left:1.5em; margin-bottom:6.3px;">Term</p></td>
										</tr>
										<tr>
											<td>
												<input type="text" class="mik" name="down_payment"  value="<?php
												if (!empty($_POST['down_payment'])) {
													echo $_POST['down_payment'];
												} else {
													echo '$2000';
												}
												?>"  style="background-color: #fff; color:#000; border:1px solid #CCC;font-size:14px; padding: 6px 6px 6px 15px; text-align:left; width:120px;" onkeyup="if (/\D/g.test(this.value))
																   this.value = this.value.replace(/\D/g, '')">
											</td>
											<td>
												<div class="join_select" style="margin-left:20px; width:120px;">
													<select id="amit" name="term_down_payment">
														<?php
														if (!empty($_POST['term_down_payment'])) {
															$tdm = $_POST['term_down_payment'];
														}
														?>
														<option value="24" <?php
														if ($tdm == '24') {
															echo 'selected="selected"';
														} else {
															echo '';
														}
														?>>24 Months</option>
														<option value="36" <?php
														if ($tdm == '36') {
															echo 'selected="selected"';
														} else {
															echo '';
														}
														?>>36 Months</option>
														<option value="48" <?php
														if ($tdm == '48') {
															echo 'selected="selected"';
														} else {
															echo '';
														}
														?>>48 Months</option>
														<option value="60" selected <?php
														if ($tdm == '60') {
															echo 'selected="selected"';
														} else {
															echo '';
														}
														?>>60 Months</option>
														<option value="72" <?php
														if ($tdm == '72') {
															echo 'selected="selected"';
														} else {
															echo '';
														}
														?>>72 Months</option>
													</select>
												</div>
											</td>
											<td>
												<div style="margin-left:20px;">
													<input type="submit" name="finance" value="GO" style="width:70px;" class="bg_green" id="btnLoan"></div>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<!-- lease term end---->
						</div>
					</div>
				</div>
            </div><!-- /.container -->
            <div class="clearfix"></div>
            <!-- favorites start-------------->
            <div  class="fav" style="position:absolute;z-index: 3; width:310px; padding:10px 5px 10px 25px;;top:935px; left:950px; ;background:#FFF; border:1px solid #CCC; box-shadow:1px ;-webkit-box-shadow: 2px 2px 27px 0px rgba(50, 50, 50, 0.75);
                  -moz-box-shadow:    2px 2px 27px 0px rgba(50, 50, 50, 0.75);
                  box-shadow:         2px 2px 27px 0px rgba(50, 50, 50, 0.75); border-radius:5px ;display:none;">
                <img src="<?php echo base_url(); ?>/assets/images/arrow-up.png"  style="position:relative; top:-30px; left:165px;"/>
                <section id="examples" >
                    <div class="mCustomScrollbar">
                        <div class="favorites-detail-listing content" >
<?php
if (count($fav) > 0) {
	foreach ($fav as $favs) {
		?>
									<div class="row">
										<img src="<?php echo $favs['stockPhotoUrl']; ?>" style="width:45px; height:45px; border-radius:45px;" />
										<label style="color:black;"><?php echo $favs['modelYear']; ?> <?php echo $favs['divisionName']; ?> <?php echo $favs['modelName']; ?> <?php echo $favs['consumerFriendlyStyleName']; ?> <span>Starting at: <span  style="color:black;">$<?php echo $favs['baseMsrp']; ?>/month</span></span></label>
										<input type="button" value="" class="close_fav" data-id="<?php echo $favs['styleId']; ?>">
									</div>
		<?php
	}
} else {
	?>

								<div class="row">
									<label style="color:black;">No Favorites Added </label>
								</div>
<?php } ?>
                        </div>
                    </div>
                </section>
            </div>
            <div style="width:100%; height:80px; padding:18px; margin:auto; background:#2E3235">
                <div style=" width:1205px;  padding:5px; margin:auto;">
                    <ul>
                        <li style="margin-left:-15px;"><img src="<?php echo base_url(); ?>assets/img/circle_red.png" style="padding-bottom:5px; width:12px" ><span class="lik red_color">Research</span></li>
                        <li><img src="<?php echo base_url(); ?>assets/img/line.png"></li>
                        <li><img src="<?php echo base_url(); ?>assets/img/circle.PNG" style="padding-bottom:5px; width:12px"><span class="lik">Get Qualified</span></li>
                        <li><img src="<?php echo base_url(); ?>assets/img/line.png"></li>
                        <li><img src="<?php echo base_url(); ?>assets/img/circle.PNG" style="padding-bottom:5px; width:12px"><span class="lik">Buy Like A Pro</span></li>
                        <li>
							<?php if (count($fav) > 0) {
								?>
								<div class="join_select2" id="ak"  style="width:150px;border: 2px solid #FFC000; float:right; margin-right:84px; min-height: 37px; color:#fff;  background-image:url(<?php echo base_url(); ?>assets/img/arrow1.png);background-color: #2e3235;border-radius: 20px;background-position: right 15px center;background-repeat: no-repeat;">
									<span style=" font-size:17px; position:relative; top:4px; left:15px;">Favorites</span>
								</div>
							<?php } else { ?>
								<div class="join_select2" id="ak"  style="width:187px;border: 2px solid #df1111; float:right;  margin: 0 15px 0 0; color:#fff;  background-image:url(<?php echo base_url(); ?>assets/img/arrow1.png);background-color: #2e3235;border-radius: 20px;background-position: right 15px center;background-repeat: no-repeat;">
									<span style=" font-size:17px; position:relative; top:4px; left:15px;">Favorites</span>
								</div>
<?php } ?>
						</li>
                    </ul>
                </div>
            </div>
            <div style="width:1350px; height:80px; padding:18px; margin:auto; background:#FCFEFD;z-index:1;">
                <div style=" width:1200px;  padding:5px; margin:auto; ">
                    <div class="col-md-1">
                        <div class="join_select1" style="width:200px; margin-left:15px;">
                            <select id="amit"  class="spay subdivisionName amit" name="filter-pay">
								<option value="">--Select--</option>
								<option value="a-z"  <?php echo $az; ?> selected="selected">A-Z</option>
								<option value="z-a"  <?php echo $za; ?>>Z-A</option>
								<option value="lth" <?php echo $sel1; ?>>Payment Low to High</option>
								<option value="htl" <?php echo $sel2; ?>>Payment High to Low</option> 
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1" style="float:left; margin-left:200px ">
                        <div class="join_select2" style="width:120px" >
                            <select id="yearmodelup" class="yearmodel amit" name="yearmodel-top">
								<?php
								printf("<option value=\"\">%s</option>", "Select");
								foreach ($yearmodel as $val) {
									$s = ($val->modelYear == $year) ? "selected='selected'" : "";
									printf("<option value=\"%s\" %s>%s</option>", $val->modelYear, $s, $val->modelYear);
								}
								?>
							</select>
                        </div>

                    </div>
                    <div class="col-md-1" style="margin-left:130px;">
                        <div class="join_select2" style="width:200px">
                            <select id="amitup" class="subdivisionName amit tseldivname" name="subdivisionName-top">
								<?php
								printf("<option value=\"\">%s</option>", "Select");
								foreach ($subdivisionName as $val) {
									$s = (trim($val->divisionName) == trim($model)) ? "selected='selected'" : "";

									printf("<option value=\"%s\" %s>%s</option>", $val->divisionName, $s, $val->divisionName);
								}
								?>
                            </select>
                        </div>


                    </div>
                    <div class="col-md-1" style="margin-left:130px;">
                        <div class="join_select2" style="width:200px">
                            <select id="modelName-top" class="modelName amit tselsubdivname " name="modelName-top">
								<?php
								printf("<option value=\"\">%s</option>", "Select");
								foreach ($modelName as $val) {

									$s = (trim($val->modelName) == trim($submode)) ? "selected='selected'" : "";

									printf("<option value=\"%s\" %s>%s</option>", $val->modelName, $s, $val->modelName);
								}
								?>
							</select>
                        </div>


                    </div>

                    <span style="margin-left:0px;"><img src="<?php echo base_url(); ?>assets/img/line1.png"> </span>
                    <span style="margin-left:20px" class="payment_number">

<?php
echo $links;
?>
<?php printf("%s - %s", $currentpage, $ofpage); ?> Of <?php printf("%s", $total_num_page); ?> </span>
                    <span style="margin-left:12px;">

                        <span style="float:right; margin-right:16px;">
                            <a class="payment_left_arrow" href="#NULL" target="_self">&nbsp;</a>
                            <a class="payment_right_arrow" href="#NULL" target="_self">&nbsp;</a>
                        </span></span>

                </div>
			</div>
            <div class="cont"  >
                <div class="cont1"  >
					<?php
					$i = 1;
					foreach ($car_data as $val) {

						if (!empty($incentive_data) && array_key_exists($val->styleId, $incentive_data)) {
							$class_color = "dollargreen.png";
							$incentiveAmount = @$incentive_data[$val->styleId]->Incentive_finance_amount;
						} else {
							$class_color = "dollar.png";
							$incentiveAmount = @$incentive_data[$val->styleId]->Incentive_finance_amount;
						}

						$value_constructobject = @unserialize(html_entity_decode($val->constructobject, ENT_QUOTES));
						//pr($value_constructobject,1);

						/**
						 * Defaults variable to calculation
						 * Comes from config calculation
						 */
						$leaseAmount = '';
						$loanAmount = '';
						$fees = $this->config->item('Fees');
						$credit_score = $this->config->item('Credit_Score');
						//$zipcode = $this->config->item('Zip_Code');
						$yearly_income = $this->config->item('Yearly_income');
						$Yearly_Debt = $this->config->item('Credit_Score');
						$Residual = $this->config->item('Residual');
						$Money_Factor = $this->config->item('Money_Factor');
						$Rate = $this->config->item('Rate');
						$Mileper_year = $this->config->item('Mileper_year');
						$Total_cash = $this->config->item('Total_cash');
						$Lease_Term = $this->config->item('Lease_Term');
						$Destination_Charge = $this->config->item('Destination_Charge');
						$MSRP = $this->config->item('MSRP');
						
						//print_r($_POST);exit;
						/**
						 * Require varialbe for lease calculation
						 */
						$Total_cash = !empty($_POST["total_cash"]) ? $_POST["total_cash"] : $Total_cash;
						$Lease_Term = !empty($_POST["term_lease"]) ? $_POST["term_lease"] : $Lease_Term;
						$th4 = $Lease_Term . 'mo';
						if (array_key_exists($th4, $val)) {
							$mo = $val->$th4;
							$ms = $val->msrp;
						}
						$Mileper_year = !empty($_POST["miles_per_year"]) ? $_POST["miles_per_year"] : $Mileper_year;
						$MRP = !empty($val->baseMsrp) ? $val->baseMsrp : $MSRP;
						
						/* by ankit date */
						$Total_cash = $this->config->item('Total_cash');// default total cash
						$Total_cash = !empty($_POST["total_cash"]) ? $_POST["total_cash"] : $Total_cash;
						$Total_cash = str_replace('$', ' ', $Total_cash);
						$Lease_Term = $this->config->item('Lease_Term');//default lease term 36 month
						$Lease_Term = !empty($_POST["term_lease"]) ? $_POST["term_lease"] : $Lease_Term;
						$Mileper_year = $this->config->item('Mileper_year');// default mileper year 
						$Mileper_year = !empty($_POST["miles_per_year"]) ? $_POST["miles_per_year"] : $Mileper_year;
						?>
                        <script>
						function leasecalculation<?php echo $val->styleId?>(selectedoption){
							var Dealer_Fee<?php echo $val->styleId?>=<?php echo $this->config->item('Fees');?>;
							var Total_cash<?php echo $val->styleId?>=<?php echo $Total_cash;?>;
							var Lease_Cach_Rebats<?php echo $val->styleId?>=<?php echo $this->config->item('Lease_Cach_Rebats');?>;
							var Mileper_year<?php echo $val->styleId?>=<?php echo $Mileper_year;?>;
							var Mileper_year_static<?php echo $val->styleId?>=<?php echo $this->config->item('Mileper_year_static');?>;
							var Residual_Percentage_Month<?php echo $val->styleId?>=<?php echo $this->config->item('Residual_Percentage_Month');?>;
							var Credit_Score<?php echo $val->styleId?>=<?php echo $this->config->item('Credit_Score');?>;
							var Lease_Term<?php echo $val->styleId?>=<?php echo $Lease_Term;?>;
							<?php $Mileage_Adjustment_Factor=$this->config->item('Mileage_Adjustment_Factor');?>
							var Mileage_Adjustment_Factor<?php echo $val->styleId?>=<?php echo $Mileage_Adjustment_Factor[$Lease_Term];?>;
							var Total_cash<?php echo $val->styleId?>=<?php echo $Total_cash;?>;
							var Destination_Charge<?php echo $val->styleId?>=<?php echo $val->destination;?>;
							var baseMsrp<?php echo $val->styleId?>=<?php echo $val->baseMsrp;?>;
							<?php $rp_mf=getvalue_rp_mf($val->styleId,$Lease_Term,$zipcode,$this->config->item('Credit_Score'));?>
							var Residual_Percentage<?php echo $val->styleId?>=<?php echo $rp_mf['Residual_Percentage'];?>;
							var Money_Factor<?php echo $val->styleId?>=<?php echo $rp_mf['Money_Factor'];?>;
							var ConfiguredMSRP<?php echo $val->styleId?>=baseMsrp<?php echo $val->styleId?>+Destination_Charge<?php echo $val->styleId?>+selectedoption;
							var CapCost<?php echo $val->styleId?>=ConfiguredMSRP<?php echo $val->styleId?>+Dealer_Fee<?php echo $val->styleId?>;
							var CapCostReduction<?php echo $val->styleId?>=Total_cash<?php echo $val->styleId?>+Lease_Cach_Rebats<?php echo $val->styleId?>;
							var Mileage_Adjustment<?php echo $val->styleId?>=((Mileper_year_static<?php echo $val->styleId?>-Mileper_year<?php echo $val->styleId?>)*Mileage_Adjustment_Factor<?php echo $val->styleId?>);
							var Residual<?php echo $val->styleId?>=((ConfiguredMSRP<?php echo $val->styleId?>*Residual_Percentage<?php echo $val->styleId?>)+Mileage_Adjustment<?php echo $val->styleId?>);
							var leaseamount=(((CapCost<?php echo $val->styleId?>-CapCostReduction<?php echo $val->styleId?>+Residual<?php echo $val->styleId?>)*Money_Factor<?php echo $val->styleId?>)+((CapCost<?php echo $val->styleId?>-CapCostReduction<?php echo $val->styleId?>-Residual<?php echo $val->styleId?>)/Lease_Term<?php echo $val->styleId?>));
							var finalleaseamount=Math.round(leaseamount);
							$(".lease_<?php echo $val->styleId?>").text("Lease Estimate : $"+finalleaseamount+"  /month*");
							//console.log("Lease amount for <?php echo $val->styleId?>:"+finalleaseamount);
						}
						leasecalculation<?php echo $val->styleId?>(0);
						</script>
                        <?php
						$leaseAmount=leasecalculation($val->styleId,$val->baseMsrp,$val->destination,$zipcode,$Total_cash,$Lease_Term,$Mileper_year);
						/* edn by ankit */
						$mfactor = !empty($money_factor) ? $money_factor : $Money_Factor;
						$Money_Factor = $mfactor;

						$Destination_Charge = $val->destination;
						$CapCost = $val->baseMsrp + $fees + $Destination_Charge;

						$Residual_percentage = $mo / $ms;
						@$Lease_Per_Year = @$Lease_Term / 12;
						@$Centspermile = '';
						if ($val->groupnum == $Lease_Per_Year) {
							$Centspermile = '18';
						} else if ($val->groupnum == $Lease_Per_Year) {
							$Centspermile = '14';
						} else if ($val->groupnum == $Lease_Per_Year) {
							$Centspermile = '12';
						} else if ($val->groupnum == $Lease_Per_Year) {
							$Centspermile = '12';
						} else {
							$Centspermile = '10';
						}
						$Centspermile = $Centspermile / 100;
						@$Mileadjustment = $Lease_miles - 12000;
						@$Mileadjustcost = @$Mileadjustment * @$Centspermile;
						@$Residual = $MRP * $Residual_percentage + $Mileadjustcost;
						$Total_cash = $Total_cash + $incentiveAmount;
						//echo "cc=".$CapCost."tc=".$Total_cash."rp".$Residual_percentage."mf=".$Money_Factor."lt=".$Lease_Term;
						//$leaseAmount = lease_payment($CapCost, $Total_cash, $Residual, $Money_Factor, $Lease_Term);
						

						/**
						 * Required variable for loan calculation
						 *
						 */
						/*$fees1 = $this->config->item('fdf');
						$CapCost1 = $val->baseMsrp + $fees1;*/
						$Down_Payment = $this->config->item('down_payment');
						$Loan_Term = $this->config->item('Term_down_payment');
						$Down_Payment = !empty($_POST["down_payment"]) ? $_POST["down_payment"] : $Down_Payment;
						$Down_Payment = str_replace('$', '', $Down_Payment);
						$Loan_Term = !empty($_POST["term_down_payment"]) ? $_POST["term_down_payment"] : $Loan_Term;
						//@$loanAmount = loan_payment($CapCost1, $fees, @$down_payment, $Money_Factor, $term_down_payment);
						?>
                        <script>
						function loancalculation<?php echo $val->styleId?>(selectedoption){
							var baseMSRP<?php echo $val->styleId?>=<?php echo $val->baseMsrp;?>;
							var destination<?php echo $val->styleId?>=<?php echo $val->destination;?>;
							var Down_Payment<?php echo $val->styleId?>=<?php echo $Down_Payment;?>;
							var Loan_Term<?php echo $val->styleId?>=<?php echo $Loan_Term;?>;
							var Loan_Dealer_Fee<?php echo $val->styleId?>=<?php echo $this->config->item('Loan_Dealer_Fee');?>;
							var Financing_Cash<?php echo $val->styleId?>=<?php echo $this->config->item('Financing_Cash');?>;
							var Credit_Score<?php echo $val->styleId?>=<?php echo $this->config->item('Credit_Score');?>;
							var avg<?php echo $val->styleId?>=<?php echo getavgvalue($zipcode,$Loan_Term,$this->config->item('Credit_Score'))?>;
							var TotalAmountFinance<?php echo $val->styleId?>=(((baseMSRP<?php echo $val->styleId?>+selectedoption+destination<?php echo $val->styleId?>+Loan_Dealer_Fee<?php echo $val->styleId?>)-Down_Payment<?php echo $val->styleId?>-Financing_Cash<?php echo $val->styleId?>)*(avg<?php echo $val->styleId?>/1200));
							var intersect<?php echo $val->styleId?>=(1-(Math.pow((1+(avg<?php echo $val->styleId?>/1200)),(-Loan_Term<?php echo $val->styleId?>))));
							var loanamount=(TotalAmountFinance<?php echo $val->styleId?>/intersect<?php echo $val->styleId?>);
							var finalloanamount=Math.round(loanamount);
							$(".loan_<?php echo $val->styleId?>").text("Loan Estimate : $"+finalloanamount+"  /month*");
							//console.log("Loan amount for <?php echo $val->styleId?>:"+finalloanamount);
							
						}
						loancalculation<?php echo $val->styleId?>(0);
						</script>
                        <?php
						$loanAmount=loancalculation($val->styleId,$val->baseMsrp,$val->destination,$zipcode,$Down_Payment,$Loan_Term);
						//pr($value_constructobject,1);

						if ($i % 2 != 0) {
							echo "<div class=\"v-showroom-row\">";
						}
						?>

						<div class="group_class <?php echo ($i % 2 != 0) ? "cell_odd" : "cell_even"; ?>">
							<?php
							//pr($val);

							if ($i % 2 != 0) {
								?>

								<div class="dis">
									<div class="top_1">

										<span class="heading">


											<h1><?php printf("%s %s %s %s", $val->modelYear, $val->divisionName, $val->modelName, $val->consumerFriendlyStyleName); ?></h1>
											<span class="startng" id="price_<?php echo $val->styleId; ?>">Base MSRP: <span>$<?php echo $val->baseMsrp; ?></span></span>

										</span>
		<?php if ($incentiveAmount != '0' && $incentiveAmount != '') { ?>
											<img src="<?php echo base_url(); ?>assets/images/<?php echo $class_color; ?>" class="dollar"  id="dollar_<?php echo $i; ?>" style="cursor: pointer;left:-117px;position: relative; top:35px;z-index:1;">
											<img src="<?php echo base_url(); ?>assets/images/dollarred.jpg" class="dollar1" style="position: relative; top:37px; cursor: pointer; left:-29%; z-index: 999; display:none;">
											<!--- hover effect dollar---->
											<div style="width:192px; height:125px; opacity:0.8;  padding:35px 15px 35px 15px; background:#000; display:none; z-index:99; position:absolute; margin-top:10px;   "  class="dollarshow">
												<div style="width:100%;margin-left:10px ">
													<span  style="color:#CCC; font-family: 'cq-ttf-semi-bold' important; font-size:12px;">Factory Lease Cash:</span><span style="color:#FFF; font-family: 'cq-ttf-semi-bold' important; font-size:16px;" > N/A</span><br>
													<img src="<?php echo base_url(); ?>assets/images/left_sep_img.png">
												</div>
												<div style="width:100%; float:left; margin-left:10px ">
													<span  style="color:#CCC; font-family: 'cq-ttf-semi-bold' important; font-size:12px;">Factory Loan Cash:</span><span style="color:#FFF; font-family: 'cq-ttf-semi-bold' important; font-size:16px;" > $<?php echo number_format($incentiveAmount); ?></span><br>
													<img src="<?php echo base_url(); ?>assets/images/left_sep_img.png">
												</div>
											</div>
									<?php } ?>
									</div>
									<!----------------- grid image start------------->
		<?php
		if ($val->stockPhotoUrl != "") {
			?>
										<div class="v-showroom-box-bg">
											<img src="<?php echo $val->stockPhotoUrl; ?>" style="margin-left:20px; margin-top:-4px"  width="500" height="348" border="0">
										</div>
									<?php } else { ?>
										<div class="v-showroom-box-bg">
											<img class="not-available-image" src="<?php echo base_url(); ?>assets/images/not_avil.jpg" width="558" height="282" border="0">
										</div>
		<?php } ?>

									<!--- grid image start------------>
									<!--- hover effect---->

									<span class="toolhover"><img  src="<?php echo base_url(); ?>assets/images/cirgrey.png"  ></span>
									<div class="toolshow">
										<div style="width:100%; ">
											<span style="color:#CCC; font-family: 'cq-ttf-semi-bold' important; font-size:12px;">
												<?php
												echo 'Loan Calculation' . "<div style=\"clear:both\"></div>";
												echo "Fees=" . $fees1 . "<div style=\"clear:both\"></div>";
												echo "CapCost=" . $CapCost1 . "<div style=\"clear:both\"></div>";
												echo "Rate=" . $Rate . "<div style=\"clear:both\"></div>";
												echo "Down payment=" . $down_payment . "<div style=\"clear:both\"></div>";
												echo "Term down payment=" . $term_down_payment . "<div style=\"clear:both\"></div>";
												?>
											</span>
											<span style="color:#FFF; font-family: 'cq-ttf-semi-bold' important; font-size:14px;">&nbsp;<?php
												if (!empty($value_constructobject->configuration->technicalSpecifications)) {
													foreach ($value_constructobject->configuration->technicalSpecifications as $objMPG) {
														if ($objMPG->headerName == 'Engine' && $objMPG->titleName == 'Displacement' && $objMPG->groupName == 'Powertrain') {
															echo $objMPG->value;
														}
													}
												}
												?></span><br>
											<img src="<?php echo base_url(); ?>assets/images/left_sep_img.png">
										</div>
										<div style="width:100%; float:left">
											<span style="color:#CCC; font-family: 'cq-ttf-semi-bold' important; font-size:12px;">Horse Power:</span><span style="color:#FFF; font-family: 'cq-ttf-semi-bold' important; font-size:14px;">&nbsp;<?php
												if (!empty($value_constructobject->configuration->technicalSpecifications)) {
													foreach ($value_constructobject->configuration->technicalSpecifications as $objMPG) {
														if ($objMPG->headerName == 'Engine' && $objMPG->titleName == 'SAE Net Horsepower @ RPM' && $objMPG->groupName == 'Powertrain') {
															echo $objMPG->value;
														}
													}
												}
												?></span><br>
											<img src="<?php echo base_url(); ?>assets/images/left_sep_img.png">
										</div>
										<div style="width:100%; float:left">
											<span style="color:#CCC; font-family: 'cq-ttf-semi-bold' important; font-size:12px;">Torque:</span><span style="color:#FFF; font-family: 'cq-ttf-semi-bold' important; font-size:14px;">&nbsp;<?php
												if (!empty($value_constructobject->configuration->technicalSpecifications)) {
													foreach ($value_constructobject->configuration->technicalSpecifications as $objMPG) {
														if ($objMPG->headerName == 'Engine' && $objMPG->titleName == 'SAE Net Torque @ RPM' && $objMPG->groupName == 'Powertrain') {
															echo $objMPG->value;
														}
													}
												}
												?></span><br>
											<img src="<?php echo base_url(); ?>assets/images/left_sep_img.png">
										</div>
										<div style="width:100%; float:left">
											<span style="color:#CCC; font-family: 'cq-ttf-semi-bold' important; font-size:12px;">MPG:</span><span style="color:#FFF; font-family: 'cq-ttf-semi-bold' important; font-size:14px;">&nbsp;
												<?php
												if (!empty($value_constructobject->configuration->technicalSpecifications)) {
													foreach ($value_constructobject->configuration->technicalSpecifications as $objMPG) {
														if ($objMPG->headerName == 'Mileage' && $objMPG->titleName == 'EPA Fuel Economy Est - Hwy' && $objMPG->measurementUnit == 'MPG') {
															echo $objMPG->value;
														}
													}
												}
												?>
											</span><br>
										</div>
									</div>

									<div class="top0_1">

										<div class="rate">

												<?php if ($qualified['status'] == 1) { ?>
												<span rel="<?php echo $i ?>" id="bt" style="color:#2ab704 "> Lease to Beat:$<?php
													if ($leaseAmount != '') {
														echo $leaseAmount;
													} else {
														echo 'N/A';
													}
													?> &nbsp;/month*</span>
												<?php } else { ?>



												<span rel="<?php echo $i ?>" id="bt" class="lease_<?php echo $val->styleId;?>" style="color:#ff2d35;"> <?php if ($this->session->userdata('users_id')) { ?>Lease to Beat <?php } else { ?>Lease Estimate <?php } ?>:$<?php
													if ($leaseAmount != '') {
														echo $leaseAmount;
													} else {
														echo 'N/A';
													}
													?> &nbsp;/month*</span>
											<?php } ?>

										</div>
										<div  class="rate1">
												<?php if ($qualified['status'] == 1) { ?>
												<span rel="<?php echo $i ?>" id="bt" style="color: #2ab704 "> Loan to Beat: $<?php
													if ($loanAmount != '') {
														echo $loanAmount;
													} else {
														echo 'N/A';
													}
													?> &nbsp;/month*</span>

												<?php } else { ?>
												<span rel="<?php echo $i ?>" id="bt" class="loan_<?php echo $val->styleId;?>" style="color: #ff2d35 "> <?php if ($this->session->userdata('users_id')) { ?>Loan to Beat<?php } else { ?>Loan Estimate <?php } ?>: $<?php
													if ($loanAmount != '') {
														echo $loanAmount;
													} else {
														echo 'N/A';
													}
													?> &nbsp;/month*</span>

		<?php } ?>

										</div>
									</div>
									<div class="top1_0"  >

										<span class="vs">
											<span class="sonu1 virtual-showroom-button fetch_thumbnail_interior" row_count_id="<?php echo $i; ?>" style_id_filter_val="<?php echo $val->styleId; ?>" model_year="<?php echo $val->modelYear; ?>"  param='<?php echo $i ?>'  <a href="javascript: void(0);" onclick="check_virtual_photo_interior(<?php echo $val->styleId; ?>,<?php echo $i; ?>,<?php echo $val->modelYear; ?>);">Virtual Showroom</a></span>
										</span>
										<img src="<?php echo base_url(); ?>assets/img/line1.png">
										<span class="vs">
		<?php if ($this->session->userdata('users_id') != "") { ?>
												<a  class="virtual-showroom-gc-button" href="<?php echo base_url(); ?>index.php/certificate/get/<?php echo $val->styleId; ?>/<?php echo $leaseAmount; ?>/<?php echo $loanAmount ?>"  target="_blank">Get Certificate</a><?php } else { ?>
												<a class="virtual-showroom-gc-button" href="#NULL">Get Certificate</a>
		<?php } ?>
										</span>
										<img src="<?php echo base_url(); ?>assets/img/line1.png">
										<span class="favvs add_fav" data-mid="<?php echo $this->session->userdata('users_id'); ?>" data-id="<?php echo $val->styleId; ?>">
											<span class="virtual-showroom-addto-button"  >Add To Favorites</span>
										</span>

									</div>

								</div>
	<?php } elseif ($i % 2 == 0) {
		?>
								<div  class="yog dis"  >
									<div class="top1__0" >
										<span class="heading">
											<h1><?php printf("%s %s %s", $val->modelYear, $val->divisionName, $val->modelName); ?></h1>
											<span class="startng" id="price_<?php echo $val->styleId; ?>">Base MSRP: <span>$<?php echo $val->baseMsrp; ?></span></span>
										</span>
		<?php if ($incentiveAmount != '0' && $incentiveAmount != '') { ?>
											<img src="<?php echo base_url(); ?>assets/images/<?php echo $class_color; ?>" class="dollar"  id="dollar_<?php echo $i; ?>" style="cursor: pointer;left:-117px;position: relative; top:35px; z-index:1">
											<img src="<?php echo base_url(); ?>assets/images/dollarred.jpg" class="dollar1" style="position: absolute; top:67px; cursor: pointer; left: 4%; z-index: 999; display:none;">
											<!--- hover effect dollar---->

											<div style="width:192px; height:125px; opacity:0.8;  padding:35px 15px 35px 15px; background:#000; display:none; z-index:99; position:absolute; margin-top:10px;   "  class="dollarshow">
												<div style="width:100%;margin-left:10px ">
													<span  style="color:#CCC; font-family: 'cq-ttf-semi-bold' important; font-size:12px;">Factory Lease Cash:</span><span style="color:#FFF; font-family: 'cq-ttf-semi-bold' important; font-size:16px;" > N/A</span><br>
													<img src="<?php echo base_url(); ?>assets/images/left_sep_img.png">
												</div>
												<div style="width:100%; float:left; margin-left:10px ">
													<span  style="color:#CCC; font-family: 'cq-ttf-semi-bold' important; font-size:12px;">Factory Loan Cash:</span><span style="color:#FFF; font-family: 'cq-ttf-semi-bold' important; font-size:16px;" > $<?php echo number_format($incentiveAmount); ?></span><br>
													<img src="<?php echo base_url(); ?>assets/images/left_sep_img.png">
												</div>
											</div>
									<?php } ?>

									</div>

									<!--- grid image start------------>
		<?php
		if ($val->stockPhotoUrl != "") {
			?>
										<div class="v-showroom-box-bg">
											<img src="<?php echo $val->stockPhotoUrl; ?>" style="margin-left:20px; margin-top:-4px" width="500" height="348" border="0" border="0">
										</div>
									<?php } else { ?>
										<div class="v-showroom-box-bg">
											<img class="not-available-image" src="<?php echo base_url(); ?>assets/images/not_avil.jpg" width="558" height="282" border="0">
										</div>
		<?php } ?>
									<!--- grid image start------------>
									<span class="toolhover"><img  src="<?php echo base_url(); ?>assets/images/cirgrey.png"  ></span>
									<div class="toolshow">
										<div style="width:100%; ">
											<span style="color:#CCC;font-family: 'cq-ttf-semi-bold' important; font-size:12px;">
												<div style="margin-top:-30px;">
													<?php
													echo 'For Lease Calculation' . "<div style=\"clear:both\"></div>";
													echo "Total Case=" . $Total_cash . "<div style=\"clear:both\"></div>";
													echo "Lease Term=" . $Lease_Term . "<div style=\"clear:both\"></div>";
													echo "Lease Miles=" . $Lease_miles . "<div style=\"clear:both\"></div>";
													echo "BaseMsrp=" . $MRP . "<div style=\"clear:both\"></div>";
													echo "MF=MF/100=" . $Money_Factor . "<div style=\"clear:both\"></div>";
													echo "Dest=" . $Destination_Charge . "<div style=\"clear:both\"></div>";
													echo "CapCost=" . $CapCost . "<div style=\"clear:both\"></div>";
													echo "RP=" . $Residual_percentage . "<div style=\"clear:both\"></div>";
													echo "CM=" . $Centspermile . "<div style=\"clear:both\"></div>";
													echo "Mileadjustment=" . @$Mileadjustment . "<div style=\"clear:both\"></div>";
													echo "Mileadjustcost=" . @$Mileadjustcost . "<div style=\"clear:both\"></div>";
													echo "Residual=" . $Residual . "<div style=\"clear:both\"></div>";
													?>
												</div>

											</span>
											<span style="color:#FFF; font-family: 'cq-ttf-semi-bold' important; font-size:14px;">&nbsp;<?php
												if (!empty($value_constructobject->configuration->technicalSpecifications)) {
													foreach ($value_constructobject->configuration->technicalSpecifications as $objMPG) {
														if ($objMPG->headerName == 'Engine' && $objMPG->titleName == 'Displacement' && $objMPG->groupName == 'Powertrain') {
															echo $objMPG->value;
														}
													}
												}
												?></span><br>
											<img src="<?php echo base_url(); ?>assets/images/left_sep_img.png">
										</div>
										<div style="width:100%; float:left">
											<span style="color:#CCC; font-family: 'cq-ttf-semi-bold' important; font-size:12px;">Horse Power:</span><span style="color:#FFF; font-family: 'cq-ttf-semi-bold' important; font-size:14px;">&nbsp;<?php
												if (!empty($value_constructobject->configuration->technicalSpecifications)) {
													foreach ($value_constructobject->configuration->technicalSpecifications as $objMPG) {
														if ($objMPG->headerName == 'Engine' && $objMPG->titleName == 'SAE Net Horsepower @ RPM' && $objMPG->groupName == 'Powertrain') {
															echo $objMPG->value;
														}
													}
												}
												?></span><br>
											<img src="<?php echo base_url(); ?>assets/images/left_sep_img.png">
										</div>
										<div style="width:100%; float:left">
											<span style="color:#CCC; font-family: 'cq-ttf-semi-bold' important; font-size:12px;">Torque:</span><span style="color:#FFF; font-family: 'cq-ttf-semi-bold' important; font-size:14px;">&nbsp;<?php
												if (!empty($value_constructobject->configuration->technicalSpecifications)) {
													foreach ($value_constructobject->configuration->technicalSpecifications as $objMPG) {
														if ($objMPG->headerName == 'Engine' && $objMPG->titleName == 'SAE Net Torque @ RPM' && $objMPG->groupName == 'Powertrain') {
															echo $objMPG->value;
														}
													}
												}
												?>
											</span><br>
											<img src="<?php echo base_url(); ?>assets/images/left_sep_img.png">
										</div>
										<div style="width:100%; float:left">
											<span style="color:#CCC; font-family: 'cq-ttf-semi-bold' important; font-size:12px;">MPG:</span><span style="color:#FFF; font-family: 'cq-ttf-semi-bold' important; font-size:14px;">&nbsp;
												<?php
												if (!empty($value_constructobject->configuration->technicalSpecifications)) {
													foreach ($value_constructobject->configuration->technicalSpecifications as $objMPG) {
														if ($objMPG->headerName == 'Mileage' && $objMPG->titleName == 'EPA Fuel Economy Est - Hwy' && $objMPG->measurementUnit == 'MPG') {
															echo $objMPG->value;
														}
													}
												}
												?>
											</span><br>
										</div>
									</div>
									<div class="top0">

										<div class="rate">
												<?php if ($qualified['status'] == 1) { ?>
												<span rel="<?php echo $i ?>" id="bt" style="color:#2ab704 "> Lease to Beat:$<?php
													if ($leaseAmount != '') {
														echo $leaseAmount;
													} else {
														echo 'N/A';
													}
													?> &nbsp;/month*</span>
												<?php } else { ?>



												<span rel="<?php echo $i ?>" id="bt" class="lease_<?php echo $val->styleId;?>" style="color:#ff2d35;"> <?php if ($this->session->userdata('users_id')) { ?>Lease to Beat <?php } else { ?>Lease Estimate <?php } ?>:$<?php
													if ($leaseAmount != '') {
														echo $leaseAmount;
													} else {
														echo 'N/A';
													}
													?> &nbsp;/month*</span>
											<?php } ?>

										</div>
										<div  class="rate1">
												<?php if ($qualified['status'] == 1) { ?>
												<span rel="<?php echo $i ?>" id="bt" style="color: #2ab704 "> Loan to Beat: $<?php
													if ($loanAmount != '') {
														echo $loanAmount;
													} else {
														echo 'N/A';
													}
													?> &nbsp;/month*</span>

												<?php } else { ?>
												<span rel="<?php echo $i ?>" id="bt" class="loan_<?php echo $val->styleId;?>" style="color: #ff2d35 "> <?php if ($this->session->userdata('users_id')) { ?>Loan to Beat<?php } else { ?>Loan Estimate <?php } ?>: $<?php
													if ($loanAmount != '') {
														echo $loanAmount;
													} else {
														echo 'N/A';
													}
													?> &nbsp;/month*</span>

		<?php } ?>

										</div>

									</div>
									<div class="top v-showroom-box-bottom">

										<span class="vs">
											<span class="sonu1 virtual-showroom-button fetch_thumbnail_interior" row_count_id="<?php echo $i; ?>" style_id_filter_val="<?php echo $val->styleId; ?>" model_year="<?php echo $val->modelYear; ?>"  param='<?php echo $i ?>'  <a href="javascript: void(0);" onclick="check_virtual_photo_interior(<?php echo $val->styleId; ?>,<?php echo $i; ?>,<?php echo $val->modelYear; ?>);">Virtual Showroom</a></span>
										</span>
										<img src="<?php echo base_url(); ?>assets/img/line1.png">
										<span class="vs">
		<?php if ($this->session->userdata('users_id') != "") { ?><a class="virtual-showroom-gc-button" href="<?php echo base_url(); ?>index.php/certificate/get/<?php echo $val->styleId; ?>/<?php echo $leaseAmount; ?>/<?php echo $loanAmount ?>"  target="_blank">Get Certificate</a><?php } else { ?>
												<a class="virtual-showroom-gc-button" href="#NULL">Get Certificate</a>
		<?php } ?>
										</span>
										<img src="<?php echo base_url(); ?>assets/img/line1.png">
										<span class="favvs add_fav" data-mid="<?php echo $this->session->userdata('users_id'); ?>" data-id="<?php echo $val->styleId; ?>">
											<span class="virtual-showroom-addto-button">Add To Favorites</span>
										</span>
									</div>


								</div>
						<?php } ?>

						</div>
						<?php
						if ($i % 2 == 0) {
							echo "</div>";
						}
						?>
						<div  id="<?php echo ($i % 2 != 0) ? "cell_showroom_$i" : "cell_showroom_$i"; ?>" class="<?php echo ($i % 2 != 0) ? "showroom1 move_to_down cell_showroom_$i" : "showroom1 cell_showroom_$i"; ?>" style="display:none;">

							<div class="ne" style=" z-index:99999" >
								<!---------Left side panel --------------->
								<ul id="vspopup-main-menu" class="vspopup-main-menu">
									<li id="vspopup-sub-menu" class="vspopup-sub-menu">
										<a href="javascript: void(0);" class="cls_photo_video">PHOTOS & VIDEOS</a>
										<ul>
											<li class="">
												<a href="javascript: void(0);" class="fetch_thumbnail_interior active" row_count_id="<?php echo $i; ?>" style_id_filter_val="<?php echo $val->styleId; ?>" model_year="<?php echo $val->modelYear; ?>" onclick="check_virtual_photo_interior(<?php echo $val->styleId; ?>,<?php echo $i; ?>,<?php echo $val->modelYear; ?>);">PHOTOS</a>
											</li>
											<li class="">
												<a href="javascript: void(0);" onclick="check_virtual_video_flyaround(<?php echo $val->styleId; ?>,<?php echo $i; ?>,<?php echo $val->modelYear; ?>);">VIDEOS</a>
											</li>
											<li class="">
												<a href="javascript: void(0);" onclick="check_virtual_Spin_exterior(<?php echo $val->styleId; ?>,<?php echo $i; ?>,<?php echo $val->modelYear; ?>);">360° SPIN</a>
											</li>
										</ul>
									</li>
									<li class="ste">
										<a href="javascript: void(0);" class="style_id_filter_equipment" row_count_id="<?php echo $i; ?>" style_id_filter_val="<?php echo $val->styleId; ?>">STANDARD EQUIPMENT</a>
									</li>
									<li class="specification">
										<a href="javascript: void(0);" class="style_id_filter_specification" row_count_id="<?php echo $i; ?>" style_id_filter_val="<?php echo $val->styleId; ?>" >SPECIFICATIONS</a>
									</li>
									<li class="select_options">
										<a href="javascript: void(0);" class="style_id_filter_option" row_count_id="<?php echo $i; ?>" style_id_filter_val="<?php echo $val->styleId; ?>">SELECT OPTIONS</a>
									</li>
									<li class="available_color">
										<a href="javascript: void(0);" class="available_color style_id_filter_availabe_color"  row_count_id="<?php echo $i; ?>" style_id_filter_val="<?php echo $val->styleId; ?>" model_year="<?php echo $val->modelYear; ?>">AVAILABLE COLOR</a>
									</li>

									<li class="rebate">
										<a href="javascript: void(0);" class="available_color style_id_filter_rebates"  row_count_id="<?php echo $i; ?>" style_id_filter_val="<?php echo $val->styleId; ?>">REBATES & INCENTIVES</a>
									</li>
								</ul>

							</div>

							<!----------------------- images started------------------------>
							<div class="nf" id="main_box">
								<div  class="images1" id="images1_<?php echo $i; ?>">
									<div class="vs-imgage-display">
										<div class="exteor_left_image_<?php echo $i; ?> vs-photos_main-img">
											<img src="<?php echo base_url(); ?>images/not_avil.jpg" width="515" height="383" >
										</div>
										<br>
	<?php if ($qualified != '1') { ?>
											<span><input type="button" class="tick fetch_thumbnail_exterior" row_count_id="<?php echo $i; ?>" style_id_filter_val="<?php echo $val->styleId; ?>" model_year="<?php echo $val->modelYear; ?>"  value="Exterior" onclick="check_virtual_photo_exterior(<?php echo $val->styleId; ?>,<?php echo $i; ?>,<?php echo $val->modelYear; ?>);"></span>
											<span><input type="button" class="tick1 fetch_thumbnail_interior" row_count_id="<?php echo $i; ?>" style_id_filter_val="<?php echo $val->styleId; ?>" model_year="<?php echo $val->modelYear; ?>"  value="Interior" onclick="check_virtual_photo_interior(<?php echo $val->styleId; ?>,<?php echo $i; ?>,<?php echo $val->modelYear; ?>);"></span>
	<?php } ?>
									</div>
									<div class="vs-image-thumbnails">
										<div style=" height:385px;  width:387px; position:relative; left:0; bottom:0;" class="satyascroll">
											<div class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" id="mCSB_1" tabindex="0">
												<div dir="ltr" style="position: relative; top: 0px; left: 0px;" class="mCSB_container" id="mCSB_1_container_<?php echo $i; ?>">

												</div>
											</div>
										</div>
										<div class="vs-image-bottom-button">
											<div class="pull-right">
												<span><input type="button" class="tick2" value="?"></span>
												<span><input type="button" class="tick3" value="?"></span>
											</div>
											<div class="vs-image-bottom-button-text pull-right">
												<span >Image 02 of 20</span>
											</div>
										</div>
									</div>
								</div>


								<!----------------------- images ended------------------------>

								<!------------------------ videos started-------->
								<div class="video1" style="display:none;" id="video1_<?php echo $i; ?>">
									<div class="vspopup-video-display">
										<!--- video overview start -------->
										<div class="play_video_overview" id="pvo_<?php echo $i; ?>" style="display:none">
											<video id="video_overview_<?php echo $i; ?>" class="video-js vjs-default-skin"
												   controls preload="auto" width="640" height="360"
												   data-setup='{"example_option":true}'>
												<source src="" rel=""  type='video/mp4' />
											</video>
										</div>

										<!--- video overview end -------->

										<!--- flyvideo  start -------->
										<div class="play_video_flyoverview" id="pvf_<?php echo $i; ?>">
											<div class="fly_video_<?php echo $i; ?>">
												<video id="fly_video_<?php echo $i; ?>" class="video-js vjs-default-skin"
													   controls preload="auto" width="640" height="360"
													   data-setup='{"example_option":true}'>
													<source src=""  type='video/mp4' />
												</video>
											</div>
										</div>

										<!--- flyvideo  end -------->

										<!--- video exterior start -------->
										<div class="play_video_exterior" style="display:none" id="pve_<?php echo $i; ?>">
											<video id="Exterior_Spin_video_<?php echo $i; ?>" class="video-js vjs-default-skin"
												   controls preload="auto" width="640" height="360"
												   data-setup='{"example_option":true}'>
												<source src="" rel=""  type='video/mp4' />
											</video>
										</div>

										<!--- video exterior end -------->

									</div>
									<div style="" class="video2">

										<?php if ($qualified != '1') { ?>
											<span><input type="button" class="video_overview tick" value="Video Overview" onclick="check_virtual_video_overview(<?php echo $val->styleId; ?>,<?php echo $i; ?>,<?php echo $val->modelYear; ?>);"></span>
											<span><input type="button" class="video_flyoverview tickmid" value="Video Fly Around" onclick="check_virtual_video_flyaround(<?php echo $val->styleId; ?>,<?php echo $i; ?>,<?php echo $val->modelYear; ?>);"></span>
											<span><input type="button" class="video_exterior tickright" value="Exterior Spin" onclick="check_virtual_video_exteroir(<?php echo $val->styleId; ?>,<?php echo $i; ?>,<?php echo $val->modelYear; ?>);"></span>
	<?php } else { ?>

											<span><input type="button" class="tickq" value="Video Overview" onclick="check_virtual_video_overview(<?php echo $val->styleId; ?>,<?php echo $i; ?>,<?php echo $val->modelYear; ?>);"></span>
											<span><input type="button" class="tickmidq" value="Video Fly Around" onclick="check_virtual_video_flyaround(<?php echo $val->styleId; ?>,<?php echo $i; ?>,<?php echo $val->modelYear; ?>);"></span>
											<span><input type="button" class="tickrightq" value="Exterior Spin" onclick="check_virtual_video_exteroir(<?php echo $val->styleId; ?>,<?php echo $i; ?>,<?php echo $val->modelYear; ?>);"></span>

	<?php } ?>
									</div>
								</div>
								<!------------------------ videos ended-------->

								<!------------------------ 360 Rotation Start-------->
								<div style="display: none;" class="3601 spin-360-box" id="3601_<?php echo $i; ?>">

									<div class="show360">
										<img class="show360-zoom" src="<?php echo base_url(); ?>assets/images/zoom.png">
										<div class="exterior_spin_<?php echo $i; ?>">
											<object width="480" height="360" data=""></object> 
										</div>
										<img class="spin-360-image" src="<?php echo base_url(); ?>assets/images/rotate.jpg">
									</div>

									<div class="spin-360-button" style="">
	<?php if ($qualified != '1') { ?>
											<span><input type="button" class="tick" id="ext1" value="Exterior 360" onclick="check_virtual_Spin_exterior(<?php echo $val->styleId; ?>,<?php echo $i; ?>,<?php echo $val->modelYear; ?>);"></span>
											<span><input type="button" class="tick1" id="sel1" value="Interior 360" onclick="check_virtual_Spin_interior(<?php echo $val->styleId; ?>,<?php echo $i; ?>,<?php echo $val->modelYear; ?>);" ></span>
	<?php } else { ?>
											<span><input type="button" class="tickq" id="ext1" value="Exterior 360" onclick="check_virtual_Spin_exterior(<?php echo $val->styleId; ?>,<?php echo $i; ?>,<?php echo $val->modelYear; ?>);"></span>
											<span><input type="button" class="tick1q" id="sel1" value="Interior 360" onclick="check_virtual_Spin_interior(<?php echo $val->styleId; ?>,<?php echo $i; ?>,<?php echo $val->modelYear; ?>);"></span>
	<?php } ?>
									</div>

								</div>

								<!------------------------ 360 Rotation ended-------->



								<!------------------------ standard equipments start-------->

								<div class="ste1 vs-standard-equipment-box">
									<div style=" height:450px;  width:903px; position:relative; left:0; bottom:0;" class="satyascroll">
										<div class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" id="mCSB_1" tabindex="0">
											<div dir="ltr" style="position: relative; top: 0px; left: 0px;" class="mCSB_container" id="mCSB_1_container">
												<div id="standard_equipment" class="option_standard_equipments_<?php echo $i; ?>">

												</div>
											</div>
										</div>
									</div>
								</div>

								<!------------------------ standard equipments end-------->
								<!------------------------ specification start-------->
								<div class="specification1">
									<div style=" height:450px;  width:903px; position:relative; left:0; bottom:0;" class="satyascroll">
										<div class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" id="mCSB_1" tabindex="0">
											<div dir="ltr" style="position: relative; top: 0px; left: 0px;" class="mCSB_container" id="mCSB_1_container">
												<div class="vs-specification-box pull-left">
													<div id="option_standard_equipments" class="option_standard_specification_<?php echo $i; ?>">

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!------------------------ specification end-------->
								<!------------------------ Select Option start-------->
								<div class="selectoption1">
									<div style=" height:350px;  width:903px; position:relative; left:0; bottom:0;" class="satyascroll">
										<div class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" id="mCSB_1" tabindex="0">
											<div dir="ltr" style="position: relative; top: 0px; left: 0px;" class="mCSB_container" id="mCSB_1_container">
												<div class="selectoption-top option_selection_field_<?php echo $i; ?>">

												</div>

											</div>
										</div>
									</div>
									<input class="selectoption1-button" type="button" value="Save Options">
								</div>
								<!------------------------ Select Option end-------->
								<!------------------------ available Start-------->
								<div class="available-color-box" style="display:none;">
									<div id="option_standard_avaliable_color" class="option_standard_avaliable_color_<?php echo $i; ?>">

									</div>
								</div>

								<!------------------------ available End-------->


								<!------------------------ Rebate start-------------->
								<div class="rebate1" style="display:none;">
									<div style=" height:450px;  width:903px; position:relative; left:0; bottom:0;" class="satyascroll">
										<div class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" id="mCSB_1" tabindex="0">
											<div dir="ltr" style="position: relative; top: 0px; left: 0px;" class="mCSB_container" id="mCSB_1_container">
												<div id="option_standard_rebates" class="option_standard_rebates_<?php echo $i; ?>">

												</div>
											</div>
										</div>
									</div>
								</div>
								<!------------------------ Rebate end----------------->
							</div>
						</div>
						<?php
						$i++;
					}

					if (count($car_data) % 2 != 0) {
						?>
						<div class="group_class">
							<div class="yog dis" style="min-height:437px;">
								&nbsp;

							</div>

						</div>
					</div>
	<?php
}
?>
                <div class=" clearfix"></div>
                <p style="text-transform:uppercase; text-align:center; font-family:Source Sans Pro ; color:#a1a4a7; margin-top:20px; font-size:18px;">Disclaimer will go here</p>
                <div style="width:1350px;  padding:18px; margin-left:-95px; position:relative; top:25px; background:#FCFEFD">
                    <div style=" width:1230px;  padding:5px;  margin-left:67px;">
                        <div class="col-md-3">
                            <div class="join_select1" style="width:200px; margin-left:5px;">
                                <select id="amit"  class="spay" name="filter_pay">
									<option value="">--Select--</option>
									<option value="a-z"  <?php echo $az; ?> selected="selected">A-Z</option>
									<option value="z-a"  <?php echo $za; ?>>Z-A</option>
									<option value="lth"  <?php echo $sel1; ?> >Payment Low to High</option>
									<option value="htl" <?php echo $sel2; ?> >Payment High to Low</option> 
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3" style="margin-left:-220px;">
                            <div class="join_select2" style="width:120px" >
                                <select id="yearmodel" class="yearmodel amit" name="yearmodel">
									<?php
									printf("<option value=\"\">%s</option>", "Select");

									foreach ($yearmodel as $val) {
										$s = ($val->modelYear == $year) ? "selected='selected'" : "";
										printf("<option value=\"%s\" %s>%s</option>", $val->modelYear, $s, $val->modelYear);
									}
									?>
								</select>
                            </div>


                        </div>
                        <div class="col-md-3" style="margin-left:-70px;">
                            <div class="join_select2" style="width:200px">
								<select id="yearmodelup" class="yearmodel amit bseldivname" name="subdivisionName">
									<?php
									printf("<option value=\"\">%s</option>", "Select");
									foreach ($subdivisionName as $val) {
										$s = (trim($val->divisionName) == trim($model)) ? "selected='selected'" : "";

										printf("<option value=\"%s\" %s >%s</option>", $val->divisionName, $s, $val->divisionName);
									}
									?>
								</select>
                            </div>


                        </div>
                        <div class="col-md-3" style="margin-left:-70px;">
                            <div class="join_select2" style="width:200px">
                                <select id="modelName" class="modelName amit bselsubdivname" name="modelName">
									<?php
									printf("<option value=\"\">%s</option>", "Select");
									foreach ($modelName as $val) {

										$s = (trim($val->modelName) == trim($submode)) ? "selected='selected'" : "";

										printf("<option value=\"%s\" %s>%s</option>", $val->modelName, $s, $val->modelName);
									}
									?>
								</select>
                            </div>


                        </div>

                        <span style="margin-left:0px;"><img src="<?php echo base_url(); ?>assets/img/line1.png"> </span>
                        <span style="margin-left:50px" class="payment_number"><?php printf("%s - %s", $currentpage, $ofpage); ?> Of <?php printf("%s", $total_num_page); ?> </span>
                        <span style="margin-left:12px;">
                            <div class="pull-right" style="margin-right:30px;">
                                <a class="payment_left_arrow" href="#" target="_self">&nbsp;</a>
                                <a class="payment_right_arrow" href="#" target="_self">&nbsp;</a>
                            </div>
						</span>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>
</form>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="<?php echo base_url(); ?>assets/js/virtual.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lightbox.js"></script>
<script src="<?php echo base_url(); ?>assets/js/spritespin.js"></script>
<script src="<?php echo base_url(); ?>assets/script/trim_search.js"></script>


<script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/minified/jquery-1.11.0.min.js"><\/script>')</script>
<!-- custom scrollbar plugin -->
<script src="<?php echo base_url(); ?>assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
										(function($) {
											$(window).load(function() {

												$(".satyascroll").mCustomScrollbar({
													/* keyboard default options */
													keyboard: {
														enable: true,
														scrollType: "steps",
														scrollAmount: "0"
													}
												});
											});
										})(jQuery);

										$('.spay,.yearmodel,.modelName,.join_select2,.join_select2').change(function() {
											if ($(this).attr('name') == 'filter-pay') {
												$('#frmtype').val('1');
											}
											if ($(this).attr('name') == 'yearmodel-top') {
												$('#frmtype').val('1');
											}
											/*if ($(this).attr('name') == 'subdivisionName-top') {
											 $('#frmtype').val('1');
											 }*/
											if ($(this).attr('name') == 'modelName-top') {
												$('#frmtype').val('1');
											}
											if ($(this).attr('name') == 'filter_pay') {
												$('#frmtype').val('2');
											}
											if ($(this).attr('name') == 'yearmodel') {
												$('#frmtype').val('2');
											}
											/*if ($(this).attr('name') == 'subdivisionName') {
											 $('#frmtype').val('2');
											 }*/
											if ($('.tselsubdivname').val() == "") {
												alert("Select Model Name");
											}
											if ($('#frmtype').val() !== '0') {
												$("#virtual-show-room").submit();
											}
										});



										$('.model_boby_go').click(function() {
											if ($('#minpay').val() == '') {
												$('#minpay').focus();
												return false;
											}
											if ($('#maxpay').val() == '') {
												$('#maxpay').focus();
												return false;
											}
											if ($('#minpay').val() >= $('#maxpay').val()) {
												$('#maxpay').focus();
												return false;
											}
											$('#frmtype').val('3');
											$("#virtual-show-room").submit();
										});

										$('#btnLease').click(function() {
											$("#virtual-show-room").submit();
										});
										$('#btnLoan').click(function() {
											$("#virtual-show-room").submit();
										});


										$(".payment_right_arrow").click(function() {

											$('html, body').animate({scrollTop: $('body').offset().top + 400}, 100);
										});
										$(function() {
											$(".thover").hover(function() {
												var dt = $(this).attr("data-src");

												var dt1 = $(".timages").attr('src');
												$(".timages").attr("src", dt);

											}, function() {
												$(".timages").attr("src", dt1);
											});
										})

										$(".video_overview").click(function() {
											$(this).css({'background': '#DF1111', 'color': '#FFF'});
											$(".video_flyoverview").css({'background': '#FFFFFF', 'color': '#888888'});
											$(".video_exterior").css({'background': '#FFFFFF', 'color': '#888888'});
											$(".play_video_overview").show();
											$(".play_video_flyoverview").hide()
											$(".play_video_exterior").hide()

										});

										$(".video_flyoverview").click(function() {
											$(this).css({'background': '#DF1111', 'color': '#FFF'});
											$(".video_overview").css({'background': '#FFFFFF', 'color': '#888888'});
											$(".video_exterior").css({'background': '#FFFFFF', 'color': '#888888'});
											$(".play_video_overview").hide();
											$(".play_video_flyoverview").show()
											$(".play_video_exterior").hide()

										});

										$(".video_exterior").click(function() {
											$(this).css({'background': '#DF1111', 'color': '#FFF'});
											$(".video_flyoverview").css({'background': '#FFFFFF', 'color': '#888888'});
											$(".video_overview").css({'background': '#FFFFFF', 'color': '#888888'});
											$(".play_video_overview").hide();
											$(".play_video_flyoverview").hide()
											$(".play_video_exterior").show()

										});
										$('.spritespin').spritespin({
											source: SpriteSpin.sourceArray('<?php echo $path360 . $images360 ?>', {frame: [1, 36], digits: 3}),
											width: 480,
											height: 327,
											sense: -1,
											renderer: 'image'
										});

										$('red_click').click(function() {

											$("span.y").replaceWith("<span> HHHHHHHHHHHHHHHHHHHHHHH </span>");

										});

										$('.leftw').click(function() {
											var _this = $(this);
											if (_this.find('img.cck1').is(':visible')) {
												alert(_this.next().next().html());
											}
										});
										$(document).ready(function() {
											$(".sonu1").click(function() {

												var class_name = $(this).attr('param');
												$(".showroom1").not(".cell_showroom_" + class_name).each(function(index) {
													$(this).hide();
												})

												$(".cell_showroom_" + class_name).toggle("slow");

												$(".images1").show();
												$('.sonu1').css({"color": "#abafb2"});
											});



											/**************By pankaj***************/


											$(".cls_photo_video").click(function() {

												$(this).parent('.vspopup-sub-menu').find("ul").slideToggle("slow", function() {
													// Animation complete.
												});
												// var a = $('#vspopup-sub-menu > a').attr('class');


												$(this).toggleClass('active');


											});

											$(".vspopup-main-menu > li:not(:first-child)").click(function() {
												$(".vspopup-sub-menu > ul").slideUp('slow');
											});


											$('.virtual-showroom-button').click(function() {
												$(this).toggleClass('active')
											});
											$('.virtual-showroom-gc-button').click(function() {
												$(this).toggleClass('active')
											});
											$('.virtual-showroom-addto-button').click(function() {
												$(this).toggleClass('active')
											});




											$('#vspopup-sub-menu ul li').click(function() {
												$('#vspopup-sub-menu ul li.active').removeClass('active');
												$(this).addClass('active');
											});
											/*****************************/
										});
</script>



</body>
</html>


