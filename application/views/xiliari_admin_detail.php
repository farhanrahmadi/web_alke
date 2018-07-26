<?php 
if(isset($message)){
	echo $message;
}
?>
	<div class="btn-container">
		<button onclick="xNavigate('view_admin_edit?id=<?php echo $admin_detail->admin_id ?>')" class="btn warn">Edit profile</button>
	</div>
	<div class="row">
		<div class="col-md-4" style="text-align: center">
			<img src="<?php echo base_url('assets/images/admin_photo/default.png') ?>"  alt="admin_photo"><br>
			<p><?php echo $admin_detail->admin_name ?></p>
		</div>
		<div>
			<div class="admin-info">
				<div class="label">Username :</div>
				<div class="desc"><?php echo $admin_detail->username ?></div>
			</div>
			<div class="admin-info">
				<label class="label">Email :</label>
				<div class="desc"><?php echo $admin_detail->email ?></div>
			</div>
			<div class="admin-info">
				<label class="label">Authority :</label>
				<div class="desc"><?php echo $admin_detail->level_name ?></div>
			</div>
			<div class="admin-info">
				<label class="label">Status :</label>
				<div class="desc"><?php echo $admin_detail->stat_name ?></div>
			</div>
		</div>
	</div>
		<h2>Admin Activity</h2>
		<table>
			<thead>
				<th>Action</th>
				<th>Link Action</th>
			</thead>
			<tbody>

				<?php	
				if(!empty($action_list)){
					foreach ($action_list as $action) { ?>			
						<tr>
							<td><?php echo $list->activity ?></td>
							<td><?php echo $action->link_target ?></td>
						</tr>
					<?php }
				} else { ?>
					<tr>
						<td colspan="2" style="text-align: center;">No activity recently</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
