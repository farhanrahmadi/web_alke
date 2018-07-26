<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ALKE</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/home.css') ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
</head>
<body>
	<nav id="navbar">
		<div class="nav-item" data-target="header">Home</div>	
		<div class="nav-item" data-target="aboutUs">About</div>
		<div class="nav-item" data-target="product">Product</div>
		<div class="nav-item" data-target="order">Order</div>
		<div class="nav-item" data-target="contacUs">Contac Us</div>
	</nav>
	<div class="wrapper">
		<svg onclick="showNavbar()" aria-hidden="true" data-prefix="fas" data-icon="bars" class="navbar-icon" 
		role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
		<path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163
		60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837
		0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 
		0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg>
		<div id="triger">
			
		</div>
		<section id="header" class="header">
			<div class="brand-logo">

			</div>
			<div class="brand-name">
				aulia teknik mandiri
			</div>
		</section>
		<section class="about-us" id="aboutUs">
			<div id="visi" class="visi" onscroll="myfun(event)">
				<h2>Visi</h2>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis itaque delectus veritatis animi blanditiis maiores. Laboriosam temporibus nobis perspiciatis, cum accusantium perferendis, dicta nemo rem odit accusamus eos eius illum.
			</div>
			<div id="misi">
				<h2>Misi</h2>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore repellendus error iure voluptatibus temporibus itaque pariatur veritatis nesciunt nobis iste optio, id voluptatem maxime velit, necessitatibus consectetur esse! Consequatur, ipsam.
			</div>
			<div id="history">
				<h2>Our History</h2>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non veritatis officiis beatae eveniet odit. Aliquid sequi hic quidem molestiae consequuntur? Mollitia fugiat a odit, eaque numquam deleniti commodi temporibus beatae?
			</div>
		</section>
		<section id="product">
			<div class="product-wrapper">
				<div class="product-container">
					<div class="product-item active" data-product="sandFilter">Sand Filter</div>
					<div class="product-item" data-product="sandCarbonFilter">Sand & Carbon Filter</div>
					<div class="product-item" data-product="hotWaterKap">Hot Water Kap</div>
					<div class="product-item" data-product="hotWaterKap">Hot Water Kap</div>
					<div class="product-item active" data-product="sandFilter">Sand Filter</div>
					<div class="product-item" data-product="sandCarbonFilter">Sand & Carbon Filter</div>
					<div class="product-item" data-product="hotWaterKap">Hot Water Kap</div>
					<div class="product-item" data-product="hotWaterKap">Hot Water Kap</div><div class="product-item active" data-product="sandFilter">Sand Filter</div>
					<div class="product-item" data-product="sandCarbonFilter">Sand & Carbon Filter</div>
					<div class="product-item" data-product="hotWaterKap">Hot Water Kap</div>
					<div class="product-item" data-product="hotWaterKap">Hot Water Kap</div>

				</div>
			</div>
			<div class="product-showcase-container">
				<div class="product-showcase active" id="sandFilter">
					<div>
						<img src="<?php echo base_url('/assets/images/assets_photo/sand-filter1.jpeg') ?>" alt="product-item">
					</div>
					<div>
						<img src="<?php echo base_url('/assets/images/assets_photo/sand-filter2.jpeg') ?>" alt="product-item">
					</div>
				</div>
				<div class="product-showcase" id="sandCarbonFilter">
					<div>
						<img src="<?php echo base_url('/assets/images/assets_photo/sand-carbon-filter1.jpeg') ?>" alt="product-item">
					</div>
					<div>
						<img src="<?php echo base_url('/assets/images/assets_photo/sand-carbon-filter2.jpeg') ?>" alt="product-item">
					</div>
				</div>
				<div class="product-showcase" id="hotWaterKap">
					<div>
						<img src="<?php echo base_url('/assets/images/assets_photo/hot-water-kap1.jpeg') ?>" alt="product-item">
					</div>
					<div>
						<img src="<?php echo base_url('/assets/images/assets_photo/hot-water-kap2.jpeg') ?>" alt="product-item">
					</div>
				</div>
			</div>
		</section>
		<section id="order">
			<h2>Become Suplier</h2>
			<form id="suplierForm">
				<div class="suplier-form">
					<div>
						<div class="field">
							<input type="text" name="cust_name" id="fullname" placeholder="Your fullname">
							<label for="fullname">Name</label>
						</div>
						<div class="field">
							<input type="text" name="position" id="position" placeholder="Your position on your company">
							<label for="position">Position</label>
						</div>
						<div class="field">
							<input type="text" name="company" id="company" placeholder="Your company name">
							<label for="company">Company Name</label>
						</div>
						<div class="field">
							<textarea type="text"  name="comp_address" id="compAddress" placeholder="Your company address"></textarea>
							<label for="compAddress">Company Address</label>
						</div>
						<div class="field">
							<input type="email" name="email" id="email" placeholder="Your email">
							<label for="email">Email</label>
						</div>
						<div class="field">
							<input type="text" name="phone" id="phone" placeholder="Your phone number">
							<label for="phone">Phone</label>
						</div>
					</div>
					<div>
						<div class="field">
							<input type="text" name="comp_phone" id="compPhone" placeholder="Your company phone number">
							<label for="compPhone">Company Phone/Ext</label>
						</div>
						<div class="field">
							<textarea type="text"  name="detail_req" id="detailReq" placeholder="Inform to us regarding your requirement Example:&#10;I need the price catalog better if i could meet the broker directly "></textarea>
							<label for="detailReq">Detail Request</label>
						</div>
						<div class="field">
							<textarea type="text"  name="order_req" id="orderReq" placeholder="Put your order according our product"></textarea>
							<label for="orderReq">Order Request</label>
						</div>
						<div class="field">
							<textarea type="text"  name="specific_req" id="specificReq" placeholder="Example: I need to increase the bar pressure to ..., with tank dimension ..., etc "></textarea>
							<label for="specificReq">Specific Request</label>
						</div>
						<div class="field">
							<input type="number" name="qty" id="qty" placeholder="Quantity you buy">
							<label for="qty">Quantity</label>
						</div>
						<div " id="submitButton" class="btn good">Submit</div>
					</div>
				</div>
			</form>
		</section>
		<section id="bannerHolder">
			<div class="placeholder">Waiting Banner</div>
		</section>
		<section id="contacUs">
			<h2>Contac Us</h2>
			<div>
				<div class="contact-label">Name</div>
				<div class="contact-field">PT.Aulia Teknik Mandiri</div>
				<div class="contact-label">Telephone</div>
				<div class="contact-field">021 - 89777777</div>
				<div class="contact-label">Address</div>
				<div class="contact-field">Jl. Bakti Abri, kampung sindangkarsa Rt : 05/Rw : 07 no 129, sukamaju baru, Tapos, Depok</div>
			</div>
		</section>
	</div>
	<script src="<?php echo base_url('/assets/js/home.js') ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

	<script>
		$("#submitButton").click(function (e) {
			e.preventDefault();
			$.ajax({
				url: "<?php echo site_url('home/input_order'); ?>",
				data: $("#suplierForm").serialize(),
				type: "POST",
				dataType: "json",
				success: function (data) {
					var result = $.parseJSON(JSON.stringify(data));
					if (result.status == true ) {
						toastr["success"](result.message,"Success");
						$("#suplierForm")[0].reset();        
					} else{
						toastr["error"](result.message,"Failed");
					}
				}
			})
		})
	</script>
	<script>
		toastr.options = {
			"closeButton": false,
			"debug": false,
			"newestOnTop": false,
			"progressBar": true,
			"positionClass": "toast-top-center",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
	</script>
</body>
</html>