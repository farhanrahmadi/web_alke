
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Xiliari | Login </title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css');?> " rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url('assets/vendors/nprogress/nprogress.css');?>" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?php echo base_url('assets/vendors/animate.css/animate.min.css');?>" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png') ?>">
  <!-- Custom Theme Style -->
  <link href="<?php echo base_url('assets/build/css/custom.min.css');?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
</head>
<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
    <div class="login_wrapper">
      <div class="animate form login_form">
              <section class="login_content">
                <form id="formId">
                  <h1>Create Account</h1>
                  <div>
                    <input type="text" name="username" class="form-control" placeholder="Username" required="" />
                  </div>
                  <div>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="" />
                  </div>
                  <div>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                  </div>
                  <div>
                    <input type="password" name="passconf" class="form-control" placeholder="Password Confirmation" required="" />
                  </div>
                  <div>
                   <button class="btn btn-default submit" name="register" type="submit"> Submit</button>
                 </div>
                 <div class="clearfix"></div>
               </form>
                 <div class="separator">
                  <p class="change_link">Already a member ?
                    <a href="<?php echo base_url('login') ?>" class="to_register"> Log in </a>
                  </p>

                  <div class="clearfix"></div>
                  <br />

                  <div>
                    <h1>XILIARIS </h1>
                    <p>©2018</p>
                  </div>
                </div>           
            </section>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script>
  $(".submit").click(function (e) {
    e.preventDefault();
    $.ajax({
      url: "<?php echo site_url('login/proccess_register'); ?>",
      data: $("#formId").serialize(),
      type: "POST",
      dataType: "json",
      success: function (data) {
        var result = $.parseJSON(JSON.stringify(data));
        if (result.status == true ) {
           toastr["success"](result.message,"Success");
           $("#formId")[0].reset();           
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