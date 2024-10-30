<!-- the .wrap-class is required by WP to style the h2 like others in the admin (again, WP ftw!) -->
<ol class="breadcrumb breadcrumb-arrow" style="margin: 10px 15px 0 0;">
	<li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
	<li><a href="#"><i class="fa fa-leaf"></i> Studio</a></li>
	<li class="active"><span><i class="fa fa-leaf"></i> My Studio Maps</span></li>
	<li class="active pull-right help"><a href="<?=get_option('studio_url')?>" target="_blank">Go to Studio</a></li>
	<li class="active pull-right help"><span><a href="<?=STUDIO_HELP_URL?>" title="Help?"><img src="<?=plugins_url('../images/question-mark.png', __FILE__)?>" style="height:30px;width:30px;"></a></span></li>
</ol>
<section id="social plugin" class="wrap" >
	<!-- this ludacris display is how WP renders an icon -->
	<div id="icon-themes" class="icon32"><br></div>
	<h2>My Studio Maps <a href="<?=admin_url().'admin.php?page=studio_my_maps&action=import'?>" class="btn btn-primary"><i class="fa fa-plus"></i> Import Studio Maps</a></h2>
	<?php
		if(isset($msg) && $msg!=''):
			echo '
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				'.$msg.'
			</div>
			';
		endif;
		if(isset($err) && $err!=''):
			echo '
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				'.$err.'
			</div>
			';
		endif;
	?>
	<div class="wrap">
		<div class="settingContent">
			<table  id="example1"  class="table table-striped " cellspacing="0" width="100%" height="100%">
				<thead>
					<tr>
						<th><?php _e('Map Code', 'studio') ?></th>
						<th><?php _e('Title', 'studio') ?></th>
						<th><?php _e('Manage', 'studio') ?></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th><?php _e('Map Code', 'studio') ?></th>
						<th><?php _e('Title', 'studio') ?></th>
						<th><?php _e('Manage', 'studio') ?></th>
					</tr>
				</tfoot>
				<tbody>
				<?php 
					if(isset($result)&& count($result)>0){
						foreach($result as $data): ?>
					<tr>
						<td>[StudioMap mapid="<?php echo $data->id;?>" height="<?PHP echo $data->height.$data->height_parameter; ?>" width="<?PHP echo $data->width.$data->width_parameter; ?>"]</td>
						<td><?php echo $data->title;?></td>
						<td>
							<a title="View Map" href="<?PHP echo admin_url( 'admin-ajax.php' ).'?action=view_mapfig_studio_map&id='.$data->id.'&height='.$data->height.$data->height_parameter.'&width='.$data->width.$data->width_parameter; ?>" class="btn btn-default btn-sm" target="_blank"><i class="fa fa-eye"></i> View</a>
							<a title="Download Map" href="<?PHP echo admin_url( 'admin-ajax.php' ).'?action=download_mapfig_studio_map&id='.$data->id.'&height='.$data->height.$data->height_parameter.'&width='.$data->width.$data->width_parameter; ?>" class="btn btn-warning btn-sm" target="_blank"><i class="fa fa-download"></i> HTML</a>
							<a title="Refresh" href="<?php echo admin_url().'admin.php?page=studio_my_maps&action=refresh&id='.$data->studio_id; ?>" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i> Refresh</a>
							<a title="Delete" href="<?php echo admin_url().'admin.php?page=studio_my_maps&action=delete&id='.$data->id; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
						</td>
					</tr>
				<?php
						endforeach;
					} else {
				?>
					<tr>
						<td colspan="6"><br><br><br><p style="text-align:center;"><?php //_e('No data found', 'studio') ?><a href="<?php echo admin_url().'admin.php?page=studio_my_maps&action=import'; ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Import Studio Map</a><br><br><br></p></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<script>
		jQuery(document).ready(function() {
		<?PHP if(isset($result)&& count($result)>0){ ?>
			jQuery('#example1').dataTable({
				 "aLengthMenu": [[5, 10, 25, 50, 75,100, -1], [5, 10,25, 50, 75,100, "All"]],
				"iDisplayLength": 10

			});
		<?PHP } ?>
		} );
	</script>
	<?php include 'include/footer-small.php';?>
</section>