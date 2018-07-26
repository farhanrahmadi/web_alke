<?php 
if(isset($message)){
	echo $message;
}
?>
<h2>Application List</h2>
<div style="margin-top: 20px">
	<table>
		<thead>
			<th>Username</th>
			<th>Email</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php foreach ($app_list as $list) { ?>			
				<tr>
					<td><?php echo $list->username ?></td>
					<td><?php echo $list->email ?></td>
					<td><button class="btn good" onclick="xNavigate('process_admin_accept?id=<?php echo $list->admin_id ?>')"> Accept</button> <buton onclick="xNavigate('process_admin_decline?id=<?php echo $list->admin_id ?>',true)" class="btn bad"> Decline</buton></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>