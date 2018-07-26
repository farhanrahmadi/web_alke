<?php 
if(isset($message)){
	echo $message;
}
?>
<h2>Application List</h2>
<div style="margin-top: 20px">
	<table>
		<thead>
			<th>Customer Name</th>
			<th>Company Name</th>
			<th>Requst Order</th>
			<th>Quantity</th>
			<th>Status</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php foreach ($list_order as $list) { ?>			
				<tr>
					<td><?php echo $list->cust_name ?></td>
					<td><?php echo $list->comp_name ?></td>
					<td><?php echo $list->req_order ?></td>
					<td><?php echo $list->qty ?></td>
					<td><?php echo $list->status_text ?></td>
					<td>
						<button class="btn good" onclick="xNavigate('view_order_detail?id=<?php echo $list->order_id ?>')">Detail</button>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>


<?php if(isset($pagination)){
	echo $pagination;
} ?>