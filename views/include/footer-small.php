<html>
 
<head>
<!--    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">   -->

    <!-- Plugins CSS -->    
<!--    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.css">-->
<!--    <link rel="stylesheet" href="assets/plugins/pe-icon-7-stroke/css/pe-icon-7-stroke.css"> -->
<!--    <link rel="stylesheet" href="assets/plugins/animate-css/animate.min.css">-->
<!--    <link rel="stylesheet" href="assets/plugins/flexslider/flexslider.css">-->
 <link href='https://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- <link id="theme-style" rel="stylesheet" href="styles.css"> -->
<style>
/*rs style*/
#rs_main_footer .rs_new_row_bottom {
     background: none repeat scroll 0 0 #444444;
    color: #b3b3b3;
    font-size: 14px;
  padding-bottom: 10px;
    padding-top: 10px;
}
#rs_main_footer .container{width:1070px !important;}
#rs_main_footer .rs_footer_s {
    margin-bottom: 0;
    text-align: right;
}
#rs_main_footer .rs_new_row_top{
    background: none repeat scroll 0 0 #6dbd63;
   padding-bottom:20px;
 margin-top: 20px;
}
#rs_main_footer .new_footer_about_p{color:#fff;font-size: 14px;}
#rs_main_footer .rs_more{color: #377130;
    font-size: 16px;}

#rs_main_footer .title{   color: #2e5f28;
    font-size: 22px;
    font-weight: normal;}
#rs_main_footer .rs_new_ul li a {
    color: #377130;
    font-size: 16px;
}
#rs_main_footer .rs_only_right_side p {
   color: #377130;
    font-size: 18px;
}
#rs_main_footer .rs_eemail a{ color: #377130 !important;
    font-size: 16px;}
#rs_main_footer .rs_footer_s li a {
    color: #b3b3b3;
    font-size: 20px;
    margin-left: 7px;
}
#rs_main_footer .rs_footer_s li {
    margin-bottom: 0;
}
#rs_main_footer .rs_new_row_bottom .copyright {
    padding-top: 5px;
}
#rs_main_footer .rs_new_ul li {
    margin-bottom: 10px;
}
</style>
</head> 



<div style="clear:both;">
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<div class="rs_footer3" id="rs_main_footer">


<footer2 class="footer2">

        <div class="footer2-content">

            <div class="container">
                <div class="row rs_new_row_top">


        <div class="bottom-bar2">
            <div class="container">
                <div class="row rs_new_row_bottom">
                    <small class="copyright col-md-6 col-sm-6 col-xs-12"><?=COPYRIGHT_TEXT?>.<br> <a href="https://www.mapfig.com" target="_blank">MapFig</a> Studio | <a href="http://www.acugis.com/" target="_blank">AcuGIS</a> GIS Hosting | <a href="https://www.enciva.com" target="_blank">Enciva</a> Oracle |  
                    <a href="https://www.brainfurnace.com" target="_blank">Brainfurnace</a> PostgreSQL</small>
                    <ul class="social2 rs_footer_s col-md-6 col-sm-6 col-xs-12 list-inline">
                        <li><a href="<?=TWITTER_URL?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="<?=FACEBOOK_URL?>" target="_blank"><i class="fa fa-facebook"></i></a></li>                        
                        <li><a href="<?=LINKEDIN_URL?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        <li class="last"><a href="<?=GOOGLEPLUS_URL?>" target="_blank"><i class="fa fa-google"></i></a></li>
                    </ul><!--//social-->
              </div><!--//row-->
            </div><!--//container-->
        </div><!--//bottom-bar-->
    </footer2>



</div>

</html>



<script>
	$(document).ready(function(){
		$('a.btn.btn-danger').click(function(e){
			var text = $.trim($(this).text());
			
			if(text == "Remove" || text == "Delete" || $(this).find('.fa.fa-remove').length == 1) {
				var href = $(this).attr('href');
				e.preventDefault();
				
				BootstrapDialog.confirm("Are you Sure you want to delete it?", function(result){
					if(result) {
						window.location = href;
					}
				});
			}
		});
	});
</script>
<style>
	.breadcrumb-arrow li.pull-right.help a {
		border: none!important;
		background: none!important;
	}
	.breadcrumb-arrow li.pull-right.help a:before, .breadcrumb-arrow li.pull-right.help a:after {
		border: none!important;
	}
	.breadcrumb-arrow li.pull-right.help a:focus {
		outline:none;
	}
</style>