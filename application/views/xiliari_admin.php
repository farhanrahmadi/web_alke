<?php 
if(isset($message)){
	echo $message;
}
?>
<div class="btn-container">
	<button onclick="xNavigate('view_application_list')" class="btn primary">Aplication List</button>
	<button onclick="xNavigate('view_admin_edit?id=<?php echo $this->session->userdata('id'); ?>')"  class="btn warn">Edit my profile</button>
</div>
<div class="admin-panel">
	<?php foreach ($list_admin as $list) { 
		if ($list->status_id == 1) {
			$status = "success";
		} else if($list->status_id == 2 || $list->status_id == 3){
			$status = "danger";
		}	else {
			$status = "warning";
		}

		?>
		<div class="xcard">
			<img src="<?php echo base_url('assets/images/admin_photo/default.png') ?>" class="xcard-img" alt="admin_photo">
			<div class="card-body">
				<h4 class="card-title"> <?php echo $list->admin_name ?></h4>
				<span>Level : <?php echo $list->level_name ?></span><br>
				<span>Division : Developer</span><br>
				<span>Status :</span> <span class="badge badge-<?php echo $status ?>"> <?php echo $list->stat_name ?></span><br>
			</div>
				<button onclick="xNavigate('view_admin_detail?id=<?php echo $list->admin_id ?>')" class="btn primary"> See Detail</button>
		</div>
	<?php } ?>
</div>
<?php if(isset($pagination)){
	echo $pagination;
} ?>
