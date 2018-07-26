<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Xiliari</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/xiliari-logo.png') ?>">
  <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Serif" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/xiliari.css') ?>">
</head>
<body>
  <nav class="navbar">
    <span class="brand-logo" onclick="xNavigate('view_dasboard')">Xiliari Studio</span>
    <div class="nav-info"><div class="btn" onclick="logout()">Sign Out</div></div> 
  </nav>
  <section>
    <div class="sidebar">
      <div class="admin-info">
        <img src="<?php echo base_url('assets/images/admin_photo/default.png') ?>" alt="admin-photo">
        <span class="admin-greeting">Welcome Huntz</span>
      </div>
      <div class="menu">
        <ul>
          <li onclick="xNavigate('view_dasboard')"><i class="fas fa-tachometer-alt" style="color: gray"></i> Dashboard</li>
          <li onclick="xNavigate('view_admin')"><i class="fas fa-users" style="color: gray"></i> Admin</li>
          <li onclick="xNavigate('view_order')"><i class="fas fa-users" style="color: gray"></i> Order</li>
          <li onclick="xNavigate('view_product')"><i class="fas fa-users" style="color: gray"></i> Product</li>
        </ul>                
      </div>
    </div>
  </section>
  <section>
    <div id="xWrapper">
     <div id="data">
     </div>
   </div>
 </section>
</body>
<script src="<?php echo base_url('assets/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/xiliari.js') ?>"></script>
<script>
  $(document).ready(function () {
    xNavigate('view_dasboard');
  });
</script>
</html>