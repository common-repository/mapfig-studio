<?PHP
	echo '
	<ol class="breadcrumb breadcrumb-arrow" style="margin: 10px 15px 0 0;">
		<li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
		<li><a href="#"><i class="fa fa-leaf"></i> Studio</a></li>
		<li class="active"><span><i class="fa fa-plus"></i> Settings</span></li>
		<li class="active pull-right help"><a href="'.get_option('studio_url').'" target="_blank">Go to Studio</a></li>
		<li class="active pull-right help"><span><a href="'.STUDIO_HELP_URL.'" title="Help?"><img src="'.plugins_url('../images/question-mark.png', __FILE__).'" style="height:30px;width:30px;"></a></span></li>
	</ol>
	';
echo '
<form action="" method="post">
	<section id="social plugin" class="wrap" >
	<!-- this ludacris display is how WP renders an icon -->
	<div id="icon-themes" class="icon32"><br></div>
	<div class="col-md-12">
		<h2>API KEY</h2>';
		if(isset($msg) && $msg!=''):
			echo '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				'.$msg.'
			</div>';
		elseif(isset($err) && $err!=''):
			echo '<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				'.$err.'
			</div>';
		endif;
?>
		<div class="col-md-12">
			<div class="wrap">
				<div class="settingContent">
					<div class="col-md-12">
						<label>API Key</label>
						<br>
						<input type="text" class="form-control" required="required" name="studio_apikey" value="<?=$studio_apikey?>">
					</div>
					<div class="col-md-12">
						<label>Studio URL</label>
						<br>
						<input type="text" class="form-control" required="required" name="studio_url" value="<?=$studio_url?>">
					</div>
					
					<div style="clear:both"></div>
					<br/>
					<input type="submit" name="save" value="Save!" class="btn btn-info">
				</div>
			</div>
		</div>
	</div>
</section>
</form>

<?php include 'include/footer-small.php';?>