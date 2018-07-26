<?php 
if(isset($message)){
	echo $message;
}
?>
<div class="btn-container">
	<button class="btn good">Process Order</button>
</div>
<div class="x-container">
	<div class="x-label-title"><?php echo $order_detail->req_order." ".$order_detail->qty."/pcs" ?></div>
	<div class="x-label-information">
		<span>Customer Name</span><span>: <?php echo $order_detail->cust_name; ?></span>
		<span>Company Name</span><span>: <?php echo $order_detail->comp_name; ?></span>
		<span>Position</span><span>: <?php echo $order_detail->position; ?></span>
		<span>Email</span><span>: <?php echo $order_detail->email; ?></span>
		<span>Phone</span><span>: <?php echo $order_detail->phone; ?></span>
		<span>Company Phone</span><span>: <?php echo $order_detail->comp_phone; ?></span>
		<span>Company Address</span><span>: <?php echo $order_detail->comp_address; ?></span>
		<span>Order Detail</span><span>: <?php echo $order_detail->req_detail; ?></span>
		<span>Order Specific</span><span>: <?php echo $order_detail->req_specific; ?></span>
	</div>
</div>