/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*Get subdivision name from division name
 * 
 */
var data_json = '';
var previousValuelprice;
var flagl="";
var flagh="";
$("#lprice").on("focus",function(){
    previousValuelprice = $(this).val();
	//flagl= 1;
	//alert(flagl);
	
});
var previousValuehprice ;
$("#hprice").on("focus",function(){
    previousValuehprice = $(this).val();
	 //flagh= 1;
});


$('input,select').change(function() {
    if (this.id == 'lprice' || this.id == 'hprice') {
      
	  if (parseInt($('#hprice').val()) < parseInt($('#lprice').val())){
		
		 $('#hprice').val(previousValuehprice);
		
		}
		
	  
        if (parseInt($('#lprice').val()) > parseInt($('#hprice').val())) {
                
            //alert("minimum payment value is greater than maximum payment value");
          
		   $('#lprice').val(previousValuelprice);
		  
          
		  
		  

        }
		
		

        if (parseInt($('#lprice').val()) == 0) {


            $('#lprice').val('1');


        }

        return false;
    }

    if ($('#subdivision_filter').val()) {
        return false;
    }
    if ($('#subdivision_filter1').val()) {
        return false;
    }

    if (this.id == 'yr_filter') {
        $('#division_filter').val('');
        $('#division_filter1').val('');
    }
    //alert('testing');
    if ($(this).attr('name') == 'total_cash') {
        $('#txtlease').val('2')
    }
    if ($(this).attr('name') == 'term_lease') {
        $('#txtlease').val('2')
    }
    if ($(this).attr('name') == 'miles_per_year') {
        $('#txtlease').val('2')
    }
    if ($(this).attr('name') == 'down_payment') {
        $('#txtlease').val('3')
    }
    if ($(this).attr('name') == 'term_down_payment') {
        $('#txtlease').val('3')
    }

    var baseurl = $(".logo a").attr("href");
    var url = baseurl;
    //  console.log(url);
    baseurl += 'index.php/';
    var equifax = baseurl + 'equifax';
    var data = $("#filterform").serializeArray();

    // console.log(data);
    //  var postData = $(this).serializeArray();
    // var formURL = $(this).attr("action");

    //console.log(this.id);
    mirrorselect(this.id);
	$.ajax(
            {
                url: baseurl + 'modelresearch/filter',
                type: "POST",
                data: data,
                beforeSend: function()
                {
				    windowFade();
                },
                success: function(result) {
                    //alert(result);
                    windowOut();
                    data_json = $.parseJSON(result);
                    if (data_json.datacount == 0) {

                        $("#car_container").html("");
                        var notfound = '<div class="container" style="float:left; margin-left:20PX; background:#301F21; text-align:center;  width:530px; min-height:300px; "><div style="padding:40px 10px 20px 10px;"><img src="http://162.218.139.42/dev/carqualifier/assets/images/cross1.jpg" style="padding:0px; min-width:80px; min-height:75px"></div><span style="font-size:20px; color:#FFF;">Sorry. Your Search Did Not<br>Return Any Results.</span><div style=" margin:auto;padding-top:20px;"><input type="submit" value="TRY AGAIN" class="red" style="width:180px; padding:5px; border-radius:25px; border:2px solid red; color:#FFF; background:none"/></div></div>';
                        $("#car_container").html(notfound);
                        $('.total_pagi').html(data_json.datacount);
                        $('.total_pagi1').html(data_json.datacount);
                        $('.current_pagi').html("0-" + data_json.rowStart);
                        $('.current_pagi1').html("0-" + data_json.rowStart);
                        $('.payment_left_arrow').attr('href', 'javascript:void(0);');
                        $('.payment_right_arrow').attr('href', 'javascript:void(0);');
                    } else {

                        $("#car_container").html("");
                        data_json = $.parseJSON(result);

                        var k = 0;
                        $.each(data_json.array, function(i) {

                            var flag = '';
                            //var img_id = data_json.array[k].id;

                            if (data_json.array[k].vif == '') {
                                var img_url = url + 'images/not_avil.jpg';
                                flag = 1;
                            } else {
                                var img_url = data_json.array[k].vif;
                                flag = 0;
                            }
                            //var img_url = data_json.array[i].photo_url;
                            //var model_year = data_json.array[k].modelYear;
                            //var make = data_json.array[k].make;
                            var model_name = data_json.array[k].consumerFriendlyModelName;
                            var baseMsrp = data_json.array[k].baseMsrp;
							var leaseamount = data_json.array[k].leaseamount;
							var loanamount = data_json.array[k].loanamount;
							//alert(loanamount+"--"+leaseamount);
                            var style_id = data_json.array[k].styleId;
                            var class_name = data_json.array[k].marketClassName;
                            var html = "";
                            var html_data = "";
                            html_data = "<div class='car_qualifier_content'>";
                            html_data += "<div class='heading'>";
                            html_data += "<h1>" + model_name + "</h1>";
							var startingamt=0;
							leaseamount=parseFloat(leaseamount.toFixed(2));
							loanamount=parseFloat(loanamount.toFixed(2));
							if(leaseamount<loanamount){
								startingamt=leaseamount;
							}else{
								startingamt=loanamount;
							}
							//html_data += "<div class='startng'>Starting at: <span>$lease"+leaseamount+"loan:"+loanamount+"starting:"+startingamt+"/month</span>";
                            html_data += "<div class='startng'>Starting at: <span>$"+startingamt+"/month</span>";
                            html_data += "</div>";
                            html_data += "</div>";

                            if (flag == 1) {
                                html_data += "<img src='" + img_url + "' width='100%' height='278' border='0'>";
                            } else {
                                html_data += "<div style=\"background-image: url('http://162.218.139.42/dev/carqualifier/assets/images/bg.jpg'); width:581px; height:278px; background-size: 100% 100%; background-repeat: no-repeat; overflow:hidden;\"><img src='" + img_url + "' width='500' height='348' border='0' style='margin-left: 20px;margin-top: -4px;overflow: hidden;'></div>";
                            }

                            html_data += "<div class='heading'>";
                            var base = url + 'index.php/trim/index/' + style_id;

                            html_data += "<a href='" + base + "' class='select_this'>Select This Model</a>";
                            if (qualified != '1')
                            {
                                html_data += "<a href='" + equifax + "' class='get_qua'>Get Qualified</a>";
                            }
                            html_data += "</div>";
                            html_data += "</div>";
                            html_data += "</div>";
                            html += html_data;
                            $("#car_container").append(html);
                            k++;
                        })
                        if (typeof data_json.model != 'undefined') {

                            $('#subdivision_filter').html(data_json.model);
                            $('#subdivision_filter1').html(data_json.model);
                            //console.log(data_json.model);
                        } else {
                            $('#subdivision_filter').html('<option value="">All</option>');
                            $('#subdivision_filter1').html('<option value="">All</option>');
                        }
                        $('.total_pagi').html(data_json.datacount);
                        $('.total_pagi1').html(data_json.datacount);
                        var totalperpage = parseInt(data_json.rowStart);
                        var from = 1;
                        if (totalperpage - 10 == 0) {

                        } else {
                            from = totalperpage - 10;

                            if (from % 10 == 0) {

                            } else {
                                var b = from / 10;
                                b = parseInt(b);
                                b = Math.floor(b)
                                b = (b * 10) + 10;
                                from = b;
                            }

                        }
                        $('.current_pagi').html(from + "-" + data_json.rowStart);
                        $('.current_pagi1').html(from + "-" + data_json.rowStart);

                        var pre = parseInt(data_json.rowStart) - 10;
                        var next = parseInt(data_json.rowStart);

                        //$('.payment_left_arrow').attr('href', baseurl + 'modelresearch/filter/' + pre + '/pre');
                        //$('.payment_right_arrow').attr('href', baseurl + 'modelresearch/filter/' + next + '/next');



                        if (data_json.datacount == data_json.rowStart) {
                            if (data_json.datacount <= 10) {
                                $('.payment_left_arrow').attr('href', 'javascript:void(0);');
                                $('.payment_right_arrow').attr('href', 'javascript:void(0);');
                            } else {
                                $('.payment_left_arrow').attr('href', baseurl + 'modelresearch/filter/' + pre + '/pre');
                                $('.payment_right_arrow').attr('href', 'javascript:void(0);');
                            }

                        } else {
                            $('.payment_left_arrow').attr('href', baseurl + 'modelresearch/filter/' + pre + '/pre');
                            $('.payment_right_arrow').attr('href', baseurl + 'modelresearch/filter/' + next + '/next');
                        }
                    }


                }

            });


});

$('.bg_green').click(function() {
    if (this.id == 'lprice' || this.id == 'hprice') {

        if (parseInt($('#lprice').val()) > parseInt($('#hprice').val())) {

            //alert("minimum payment value is greater than maximum payment value");
            $('#lprice').val(previousValuelprice);
            $('#hprice').val(previousValuehprice);

        }
        if (parseInt($('#lprice').val()) == 0) {


            $('#lprice').val('1');


        }

        return false;
    }

    if ($('#subdivision_filter').val()) {
        return false;
    }
    if ($('#subdivision_filter1').val()) {
        return false;
    }

    if (this.id == 'yr_filter') {
        $('#division_filter').val('');
        $('#division_filter1').val('');
    }
    //alert('testing');
    if ($(this).attr('name') == 'total_cash') {
        $('#txtlease').val('2')
    }
    if ($(this).attr('name') == 'term_lease') {
        $('#txtlease').val('2')
    }
    if ($(this).attr('name') == 'miles_per_year') {
        $('#txtlease').val('2')
    }
    if ($(this).attr('name') == 'down_payment') {
        $('#txtlease').val('3')
    }
    if ($(this).attr('name') == 'term_down_payment') {
        $('#txtlease').val('3')
    }

    var baseurl = $(".logo a").attr("href");
    var url = baseurl;
    //console.log(url);
    baseurl += 'index.php/';
    var equifax = baseurl + 'equifax';
    var data = $("#filterform").serializeArray();

    // console.log(data);
    //  var postData = $(this).serializeArray();
    // var formURL = $(this).attr("action");

    //console.log(this.id);
    mirrorselect(this.id);
    $.ajax(
            {
                url: baseurl + 'modelresearch/filter',
                type: "POST",
                data: data,
                beforeSend: function()
                {
				    windowFade();
                },
                success: function(result) {
                   //alert(result);
                    windowOut();
                    data_json = $.parseJSON(result);
                    if (data_json.datacount == 0) {

                        $("#car_container").html("");
                        var notfound = '<div class="container" style="float:left; margin-left:20PX; background:#301F21; text-align:center;  width:530px; min-height:300px; "><div style="padding:40px 10px 20px 10px;"><img src="http://162.218.139.42/dev/carqualifier/assets/images/cross1.jpg" style="padding:0px; min-width:80px; min-height:75px"></div><span style="font-size:20px; color:#FFF;">Sorry. Your Search Did Not<br>Return Any Results.</span><div style=" margin:auto;padding-top:20px;"><input type="submit" value="TRY AGAIN" class="red" style="width:180px; padding:5px; border-radius:25px; border:2px solid red; color:#FFF; background:none"/></div></div>';
                        $("#car_container").html(notfound);
                        $('.total_pagi').html(data_json.datacount);
                        $('.total_pagi1').html(data_json.datacount);
                        $('.current_pagi').html("0-" + data_json.rowStart);
                        $('.current_pagi1').html("0-" + data_json.rowStart);
                        $('.payment_left_arrow').attr('href', 'javascript:void(0);');
                        $('.payment_right_arrow').attr('href', 'javascript:void(0);');
                    } else {

                        $("#car_container").html("");
                        data_json = $.parseJSON(result);

                        var k = 0;
                        $.each(data_json.array, function(i) {

                            var flag = '';
                            //var img_id = data_json.array[k].id;

                            if (data_json.array[k].vif == '') {
                                var img_url = url + 'images/not_avil.jpg';
                                flag = 1;
                            } else {
                                var img_url = data_json.array[k].vif;
                                flag = 0;
                            }
                            //var img_url = data_json.array[i].photo_url;
                            //var model_year = data_json.array[k].modelYear;
                            //var make = data_json.array[k].make;
                            var model_name = data_json.array[k].consumerFriendlyModelName;
                            var baseMsrp = data_json.array[k].baseMsrp;
                            var style_id = data_json.array[k].styleId;
                            var class_name = data_json.array[k].marketClassName;
                            var html = "";
                            var html_data = "";
                            html_data = "<div class='car_qualifier_content'>";
                            html_data += "<div class='heading'>";
                            html_data += "<h1>" + model_name + "</h1>";
                            html_data += "<div class='startng'>Starting at: <span>$" + baseMsrp + "/month</span>";
                            html_data += "</div>";
                            html_data += "</div>";

                            if (flag == 1) {
                                html_data += "<img src='" + img_url + "' width='100%' height='278' border='0'>";
                            } else {
                                html_data += "<div style=\"background-image: url('http://162.218.139.42/dev/carqualifier/assets/images/bg.jpg'); width:581px; height:278px; background-size: 100% 100%; background-repeat: no-repeat; overflow:hidden;\"><img src='" + img_url + "' width='500' height='348' border='0' style='margin-left: 20px;margin-top: -4px;overflow: hidden;'></div>";
                            }

                            html_data += "<div class='heading'>";
                            var base = url + 'index.php/trim/index/' + style_id;

                            html_data += "<a href='" + base + "' class='select_this'>Select This Model</a>";
                            if (qualified != '1')
                            {
                                html_data += "<a href='" + equifax + "' class='get_qua'>Get Qualified</a>";
                            }
                            html_data += "</div>";
                            html_data += "</div>";
                            html_data += "</div>";
                            html += html_data;
                            $("#car_container").append(html);
                            k++;
                        })
                        if (typeof data_json.model != 'undefined') {

                            $('#subdivision_filter').html(data_json.model);
                            $('#subdivision_filter1').html(data_json.model);
                            //console.log(data_json.model);
                        } else {
                            $('#subdivision_filter').html('<option value="">All</option>');
                            $('#subdivision_filter1').html('<option value="">All</option>');
                        }
                        $('.total_pagi').html(data_json.datacount);
                        $('.total_pagi1').html(data_json.datacount);
                        var totalperpage = parseInt(data_json.rowStart);
                        var from = 1;
                        if (totalperpage - 10 == 0) {

                        } else {
                            from = totalperpage - 10;

                            if (from % 10 == 0) {

                            } else {
                                var b = from / 10;
                                b = parseInt(b);
                                b = Math.floor(b)
                                b = (b * 10) + 10;
                                from = b;
                            }

                        }
                        $('.current_pagi').html(from + "-" + data_json.rowStart);
                        $('.current_pagi1').html(from + "-" + data_json.rowStart);

                        var pre = parseInt(data_json.rowStart) - 10;
                        var next = parseInt(data_json.rowStart);

                        //$('.payment_left_arrow').attr('href', baseurl + 'modelresearch/filter/' + pre + '/pre');
                        //$('.payment_right_arrow').attr('href', baseurl + 'modelresearch/filter/' + next + '/next');



                        if (data_json.datacount == data_json.rowStart) {
                            if (data_json.datacount <= 10) {
                                $('.payment_left_arrow').attr('href', 'javascript:void(0);');
                                $('.payment_right_arrow').attr('href', 'javascript:void(0);');
                            } else {
                                $('.payment_left_arrow').attr('href', baseurl + 'modelresearch/filter/' + pre + '/pre');
                                $('.payment_right_arrow').attr('href', 'javascript:void(0);');
                            }

                        } else {
                            $('.payment_left_arrow').attr('href', baseurl + 'modelresearch/filter/' + pre + '/pre');
                            $('.payment_right_arrow').attr('href', baseurl + 'modelresearch/filter/' + next + '/next');
                        }
                    }


                }

            });


});
function mirrorselect(elementid) {
    switch (elementid) {
        case 'filter_pay':
            $('#filter_pay1').val($('#filter_pay').val());
            break;
        case  'filter_pay1':
            $('#filter_pay').val($('#filter_pay1').val());
            break;
        case 'yr_filter':
            $('#year_filter_botm1').val($('#yr_filter').val());
            break;
        case 'year_filter_botm1':
            $('#yr_filter').val($('#year_filter_botm1').val());
            break;
        case 'division_filter':
            $('#division_filter1').val($('#division_filter').val());
            break;
        case 'division_filter1':
            $('#division_filter').val($('#division_filter1').val());
            break;
        default:
            break;
    }

}
$(document).ready(function() {

    $(".dollar").mouseover(function() {

        dol = $(this).parent().find(".dollarshow");
        $(dol).fadeIn();
    });
    $(".dollar").mouseout(function() {

        dol = $(this).parent().find(".dollarshow");
        $(dol).fadeOut();
    });
    $(".toolhover").mouseover(function() {

        dol = $(this).parent().find(".toolshow");
        $(dol).show();
    });
    $(".toolhover").mouseout(function() {

        dol = $(this).parent().find(".toolshow");
        $(dol).hide();
    });

    $('.toolshow').hover(function() {
        $(this).show();
    }, function() {
        $(this).hide();
    });

    next_ali = $(".nex_clone a").attr("href");
    $(".payment_right_arrow").attr("href", next_ali);

    pre_ali = $(".pre_clone a").attr("href");
    $(".payment_left_arrow").attr("href", pre_ali);

    /*go min max go button*/


});

function minmax() {

    if ($('#subdivision_filter').val()) {
        return false;
    }
    if ($('#subdivision_filter1').val()) {
        return false;
    }

    //alert('testing');
    if ($(this).attr('name') == 'xc') {
        $('#txtlease').val('2')
    }
    else if ($(this).attr('name') == 'finance') {
        $('#txtlease').val('3')
    } else {
        $('#txtlease').val('2')
    }


    var baseurl = $(".logo a").attr("href");
    var url = baseurl;
    //console.log(url);
    baseurl += 'index.php/';
    var equifax = baseurl + 'equifax';
    var data = $("#filterform").serializeArray();
    data.push({name: 'minmaxgo', value: '1'});
    //console.log(data);
    // console.log(data);
    //  var postData = $(this).serializeArray();
    // var formURL = $(this).attr("action");

    //console.log(this.id);
    mirrorselect(this.id);
    $.ajax(
            {
                url: baseurl + 'modelresearch/filter',
                type: "POST",
                beforeSend: function()
                {
				    windowFade();
                },
                data: data,
                success: function(result) {
                    // alert(result);
                    windowOut();

                    data_json = $.parseJSON(result);
                    if (data_json.datacount == 0) {

                        $("#car_container").html("");
                        var notfound = '<div class="container" style="float:left; margin-left:20PX; background:#301F21; text-align:center;  width:530px; min-height:300px; "><div style="padding:40px 10px 20px 10px;"><img src="http://162.218.139.42/dev/carqualifier/assets/images/cross1.jpg" style="padding:0px; min-width:80px; min-height:75px"></div><span style="font-size:20px; color:#FFF;">Sorry. Your Search Did Not<br>Return Any Results.</span><div style=" margin:auto;padding-top:20px;"><input type="submit" value="TRY AGAIN" class="red" style="width:180px; padding:5px; border-radius:25px; border:2px solid red; color:#FFF; background:none"/></div></div>';
                        $("#car_container").html(notfound);
                        $('.total_pagi').html(data_json.datacount);
                        $('.total_pagi1').html(data_json.datacount);
                        $('.current_pagi').html("0-" + data_json.rowStart);
                        $('.current_pagi1').html("0-" + data_json.rowStart);
                        $('.payment_left_arrow').attr('href', 'javascript:void(0);');
                        $('.payment_right_arrow').attr('href', 'javascript:void(0);');
                    } else {

                        $("#car_container").html("");
                        data_json = $.parseJSON(result);

                        var k = 0;
                        var j = 0;
                        $.each(data_json.array, function(i) {
                            //alert(data_json.array[k].minmaxstatus);
                            if (data_json.array[k].minmaxstatus == 1) {
                                j++;
                                var flag = '';
                                //var img_id = data_json.array[k].id;

                                if (data_json.array[k].vif == '') {
                                    var img_url = url + 'images/not_avil.jpg';
                                    flag = 1;
                                } else {
                                    var img_url = data_json.array[k].vif;
                                    flag = 0;
                                }
                                //var img_url = data_json.array[i].photo_url;
                                //var model_year = data_json.array[k].modelYear;
                                //var make = data_json.array[k].make;
                                var model_name = data_json.array[k].consumerFriendlyModelName;
                                var baseMsrp = data_json.array[k].baseMsrp;
                                var style_id = data_json.array[k].styleId;
                                var class_name = data_json.array[k].marketClassName;
                                var html = "";
                                var html_data = "";
                                html_data = "<div class='car_qualifier_content'>";
                                html_data += "<div class='heading'>";
                                html_data += "<h1>" + model_name + "</h1>";
                                html_data += "<div class='startng'>Starting at: <span>$" + baseMsrp + "/month</span>";
                                html_data += "</div>";
                                html_data += "</div>";

                                if (flag == 1) {
                                    html_data += "<img src='" + img_url + "' width='100%' height='278' border='0'>";
                                } else {
                                    html_data += "<div style=\"background-image: url('http://162.218.139.42/dev/carqualifier/assets/images/bg.jpg'); width:581px; height:278px; background-size: 100% 100%; background-repeat: no-repeat; overflow:hidden;\"><img src='" + img_url + "' width='500' height='348' border='0' style='margin-left: 20px;margin-top: -4px;overflow: hidden;'></div>";
                                }

                                html_data += "<div class='heading'>";
                                var base = url + 'index.php/trim/index/' + style_id;

                                html_data += "<a href='" + base + "' class='select_this'>Select This Model</a>";
                                if (qualified != '1')
                                {
                                    html_data += "<a href='" + equifax + "' class='get_qua'>Get Qualified</a>";
                                }
                                html_data += "</div>";
                                html_data += "</div>";
                                html_data += "</div>";
                                html += html_data;
                                $("#car_container").append(html);
                                k++;
                            } else {
                                k++;
                            }
                            if (j == 0) {
                                $("#car_container").html("");
                                var notfound = '<div class="container" style="float:left; margin-left:20PX; background:#301F21; text-align:center;  width:530px; min-height:300px; "><div style="padding:40px 10px 20px 10px;"><img src="http://162.218.139.42/dev/carqualifier/assets/images/cross1.jpg" style="padding:0px; min-width:80px; min-height:75px"></div><span style="font-size:20px; color:#FFF;">Sorry. Your Search Did Not<br>Return Any Results.</span><div style=" margin:auto;padding-top:20px;"><input type="submit" value="TRY AGAIN" class="red" style="width:180px; padding:5px; border-radius:25px; border:2px solid red; color:#FFF; background:none"/></div></div>';
                                $("#car_container").html(notfound);
                                $('.total_pagi').html(data_json.datacount);
                                $('.total_pagi1').html(data_json.datacount);
                                $('.current_pagi').html("0-" + data_json.rowStart);
                                $('.current_pagi1').html("0-" + data_json.rowStart);
                                $('.payment_left_arrow').attr('href', 'javascript:void(0);');
                                $('.payment_right_arrow').attr('href', 'javascript:void(0);');
                            }
                        });
                        if (typeof data_json.model != 'undefined') {

                            $('#subdivision_filter').html(data_json.model);
                            $('#subdivision_filter1').html(data_json.model);
                            //console.log(data_json.model);
                        } else {
                            $('#subdivision_filter').html('<option value="">All</option>');
                            $('#subdivision_filter1').html('<option value="">All</option>');
                        }
                        $('.total_pagi').html(data_json.datacount);
                        $('.total_pagi1').html(data_json.datacount);
                        var totalperpage = parseInt(data_json.rowStart);
                        var from = 1;
                        if (totalperpage - 10 == 0) {

                        } else {
                            from = totalperpage - 10;

                            if (from % 10 == 0) {

                            } else {
                                var b = from / 10;
                                b = parseInt(b);
                                b = Math.floor(b)
                                b = (b * 10) + 10;
                                from = b;
                            }

                        }
                        $('.current_pagi').html(from + "-" + data_json.rowStart);
                        $('.current_pagi1').html(from + "-" + data_json.rowStart);


                        var pre = parseInt(data_json.rowStart) - 10;
                        var next = parseInt(data_json.rowStart);

                        //$('.payment_left_arrow').attr('href', baseurl + 'modelresearch/filter/' + pre + '/pre');
                        //$('.payment_right_arrow').attr('href', baseurl + 'modelresearch/filter/' + next + '/next');


                        if (data_json.datacount == data_json.rowStart) {
                            if (data_json.datacount <= 10) {
                                $('.payment_left_arrow').attr('href', 'javascript:void(0);');
                                $('.payment_right_arrow').attr('href', 'javascript:void(0);');
                            } else {
                                $('.payment_left_arrow').attr('href', baseurl + 'modelresearch/filter/' + pre + '/pre');
                                $('.payment_right_arrow').attr('href', 'javascript:void(0);');
                            }

                        } else {
                            $('.payment_left_arrow').attr('href', baseurl + 'modelresearch/filter/' + pre + '/pre');
                            $('.payment_right_arrow').attr('href', baseurl + 'modelresearch/filter/' + next + '/next');
                        }
                    }


                }

            });
}


/*
 $("#division_filter").change(function () {
 var baseurl = $(".logo a").attr("href");
 var url = baseurl;
 baseurl += 'index.php/';
 
 var val = $("#division_filter option:selected").text();
 var val2 = $("#yr_filter").val();
 var data = "make=" + val + '&year=' + val2;
 
 if (val == $.trim("")) {
 alert("Please select the model");
 return false;
 }
 
 $.ajax({
 type: 'POST',
 url: baseurl + 'modelresearch/get_model',
 data: data,
 success: function (result) {
 //alert(result);
 $("#subdivision_filter").html(result);
 $("#subdivision_filter1").html(result);
 
 }
 });
 
 });
 */

$("#yr_filter,#year_filter_botm1").change(function() {

    var baseurl = $(".logo a").attr("href");
    var url = baseurl;
    baseurl += 'index.php/';
    mirrorselect(this.id);
    //var val = $("#division_filter option:selected").text();
    var val = $("#yr_filter").val();
    var data = 'year=' + val;
	
	
    $.ajax({
        type: 'POST',
        url: baseurl + 'modelresearch/get_make',
        data: data,
        success: function(result) {
            //alert(result);
            $("#division_filter").html(result);
            $("#division_filter1").html(result);

        }
    });




});

$('.payment_right_arrow, .payment_left_arrow').click(function(event) {
    event.preventDefault();
	alert("payment arrow");
    var data = $("#filterform").serializeArray();
    var baseurl = $(".logo a").attr("href");
    var url = baseurl;
    var equifax = baseurl + 'equifax';
    //console.log(url);
    baseurl += 'index.php/';
    // console.log(data);
    //  var postData = $(this).serializeArray();
    // var formURL = $(this).attr("action");
    $.ajax(
            {
                url: $(this).attr('href'),
                type: "POST",
                data: data,
                success: function(result) {
                    data_json = $.parseJSON(result);
                    if (data_json.datacount == 0) {


                        $("#car_container").html("");
                        var notfound = '<div class="container" style="float:left; margin-left:20PX; background:#301F21; text-align:center;  width:530px; min-height:300px; "><div style="padding:40px 10px 20px 10px;"><img src="http://162.218.139.42/dev/carqualifier/assets/images/cross1.jpg" style="padding:0px; min-width:80px; min-height:75px"></div><span style="font-size:20px; color:#FFF;">Sorry. Your Search Did Not<br>Return Any Results.</span><div style=" margin:auto;padding-top:20px;"><input type="submit" value="TRY AGAIN" class="red" style="width:180px; padding:5px; border-radius:25px; border:2px solid red; color:#FFF; background:none"/></div></div>';
                        $("#car_container").html(notfound);
                        $('.total_pagi').html(data_json.datacount);
                        $('.total_pagi1').html(data_json.datacount);

                        $('.current_pagi').html("0-" + data_json.rowStart);
                        $('.current_pagi1').html("0-" + data_json.rowStart);

                        $('.payment_left_arrow').attr('href', 'javascript:void(0);');
                        $('.payment_right_arrow').attr('href', 'javascript:void(0);');
                    } else {

                        $("#car_container").html("");
                        data_json = $.parseJSON(result);

                        var k = 0;
                        $.each(data_json.array, function(i) {

                            var flag = '';
                            //var img_id = data_json.array[k].id;

                            if (data_json.array[k].vif == '') {
                                var img_url = url + 'images/not_avil.jpg';
                                flag = 1;
                            } else {
                                var img_url = data_json.array[k].vif;
                                flag = 0;
                            }
                            //var img_url = data_json.array[i].photo_url;
                            //var model_year = data_json.array[k].modelYear;
                            //var make = data_json.array[k].make;
                            var model_name = data_json.array[k].consumerFriendlyModelName;
                            var baseMsrp = data_json.array[k].baseMsrp;
                            var style_id = data_json.array[k].styleId;
                            var class_name = data_json.array[k].marketClassName;
                            var html = "";
                            var html_data = "";
                            html_data += "<div class='car_qualifier_content'>";
                            html_data += "<div class='heading'>";
                            html_data += "<h1>" + model_name + "</h1>";
                            html_data += "<div class='startng'>Starting at: <span>$" + baseMsrp + "/month</span>";
                            html_data += "</div>";
                            html_data += "</div>";

                            if (flag == 1) {
                                html_data += "<img src='" + img_url + "' width='100%' height='278' border='0'>";
                            } else {
                                html_data += "<div style=\"background-image: url('http://162.218.139.42/dev/carqualifier/assets/images/bg.jpg'); width:581px; height:278px; background-size: 100% 100%; background-repeat: no-repeat; overflow:hidden;\"><img src='" + img_url + "' width='500' height='348' border='0' style='margin-left: 20px;margin-top: -4px;overflow: hidden;'></div>";
                            }

                            html_data += "<div class='heading'>";
                            var base = url + 'index.php/trim/index/' + style_id;

                            html_data += "<a href='" + base + "' class='select_this'>Select This Model</a>";
                            if (qualified != '1')
                            {
                                html_data += "<a href='" + equifax + "' class='get_qua'>Get Qualified</a>";
                            }
                            html_data += "</div>";
                            html_data += "</div>";
                            html_data += "</div>";
                            html += html_data;
                            $("#car_container").append(html);
                            k++;
                        })

                        $('.total_pagi').html(data_json.datacount);
                        $('.total_pagi1').html(data_json.datacount);
                        var totalperpage = parseInt(data_json.rowStart);
                        var from = 1;
                        if (totalperpage - 10 == 0) {

                        } else {
                            from = totalperpage - 10;

                            if (from % 10 == 0) {

                            } else {
                                var b = from / 10;
                                b = parseInt(b);
                                b = Math.floor(b)
                                b = (b * 10) + 10;
                                from = b;
                            }

                        }
                        $('.current_pagi').html(from + "-" + data_json.rowStart);
                        $('.current_pagi1').html(from + "-" + data_json.rowStart);

                        if (data_json.rowStart == data_json.datacount) {
                            var jidi = parseInt(data_json.currentcount) + 10;
                            var pre = parseInt(data_json.rowStart) - jidi;
                        } else {
                            var pre = parseInt(data_json.rowStart) - 10;
                        }
                        var next = parseInt(data_json.rowStart);
                        //$('.payment_left_arrow').attr('href', baseurl + 'modelresearch/filter/' + pre + '/pre');
                        //$('.payment_right_arrow').attr('href', baseurl + 'modelresearch/filter/' + next + '/next');

                        if (data_json.datacount == data_json.rowStart) {
                            if (data_json.datacount <= 10) {
                                $('.payment_left_arrow').attr('href', 'javascript:void(0);');
                                $('.payment_right_arrow').attr('href', 'javascript:void(0);');
                            } else {
                                $('.payment_left_arrow').attr('href', baseurl + 'modelresearch/filter/' + pre + '/pre');
                                $('.payment_right_arrow').attr('href', 'javascript:void(0);');
                            }

                        } else {
                            $('.payment_left_arrow').attr('href', baseurl + 'modelresearch/filter/' + pre + '/pre');
                            $('.payment_right_arrow').attr('href', baseurl + 'modelresearch/filter/' + next + '/next');
                        }

                    }
                }

            });


});
$('#subdivision_filter,#subdivision_filter1').change(function(e) {

    //var baseurl = $(".logo a").attr("href");
    //alert(baseurl+"index.php/trim/index/"+$(this).val());
    var baseurl = $(".logo a").attr("href");
    window.location.href = baseurl + "index.php/trim/index/" + $(this).val();


});
function windowFade() {
    jQuery('body').append('<div class="resultLoading" style="display:block"><div><img src="' + img_url + 'assets/img/ajax-loader.gif" /></div> <div class = "bg" ></div>');
    jQuery('.resultLoading').css({
        'width': '100%',
        'height': '100%',
        'position': 'fixed',
        'z-index': '10000000',
        'top': '200',
        'left': '0',
        'right': '100',
        'bottom': '0',
        'margin': 'auto'
    });

    jQuery('.resultLoading .bg').css({
        'background': '#000000',
        'opacity': '0.7',
        'width': '100%',
        'height': '100%',
        'position': 'absolute',
        'top': '0'
    });

    jQuery('.resultLoading>div:first').css({
        'width': '250px',
        'height': '75px',
        'text-align': 'center',
        'position': 'fixed',
        'top': '0',
        'left': '0',
        'right': '0',
        'bottom': '0',
        'margin': 'auto',
        'font-size': '16px',
        'z-index': '10',
        'color': '#ffffff'

    });
    jQuery('.resultLoading .bg').height('100%');
    jQuery('.resultLoading').fadeIn(300);
    jQuery('body').css('cursor', 'wait');
}
function windowOut() {
    jQuery('.resultLoading').fadeOut('300');
    jQuery('.resultLoading').html('');
    jQuery('body').css('cursor', 'default');

}