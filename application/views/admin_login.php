<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title>Xiliari | Login </title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/toast.min.css') ?>">
    <style>
      
    </style>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
           
            <div class="img-warpper">
            <img class="img-responsive" src="<?php echo base_url('assets/images/XILIAA.png') ?>" alt="">
            </div>
            <form id="formId">
              <h1>Login Form</h1>
              <div>
                <input  name="username" type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input name="password" type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button class="btn btn-default submit" name="login" type="button">Login</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                <a href="<?php echo base_url('login/register') ?>" class="to_register"> Register </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>XILIARI</h1>
                  <p>©2018</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
<script src="<?php echo base_url('assets/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/toast.min.js') ?>"></script>
<script>
  $(".submit").click(function (e) {
    e.preventDefault();
    $.ajax({
      url: "<?php echo site_url('login/process_login'); ?>",
      data: $("#formId").serialize(),
      type: "POST",
      dataType: "json",
      success: function (data) {
        var result = $.parseJSON(JSON.stringify(data));
        if (result.status == true ) {
           toastr["success"](result.message,"Success");
           $("#formId")[0].reset();
           window.location.href ="<?php echo base_url('xiliari'); ?>";         
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
