<?php 
if(isset($message)){
	echo $message;
}
?>
<div class="btn-container">
	<button class="btn good" onclick="xNavigate('view_product_add')">Add New Product</button>
</div>
<h2>Product List</h2>
<div style="margin-top: 20px">
	<table>
		<thead>
			<th style="width: 8%">ID</th>
			<th>Product Name</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php

			if (isset($list_product) && sizeof($list_product) !== 0) {
				foreach ($list_product as $list) { ?>			
				<tr>
					<td><?php echo $list->product_id ?></td>
					<td><?php echo $list->product_name ?></td>
					<td>
						<button class="btn good" onclick="xNavigate('view_product_detail?id=<?php echo $list->product_id ?>')">Detail</button>
					</td>
				</tr>
			 	<?php }
			 	} else { ?> 
					<tr>
						<td colspan="3" style="text-align: center">No product register yet</td>
					</tr>
			 	<?php } ?>
		</tbody>
	</table>
</div>


<?php if(isset($pagination)){
	echo $pagination;
} ?>