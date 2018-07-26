  var base_url = "http://localhost/web_alke/xiliari/";
  var xiliariContent = $("div #data");


  function xNavigate(targetPage, requireConfirmation, confirmationMessage) {
    var corfirmation = false;
    if (requireConfirmation == true) {
      if (confirmationMessage == "" || confirmationMessage == null ) {
          confirmationMessage = "Are you sure want perform this action";
        }
        confirmation = confirm(confirmationMessage);
        } else {
          confirmation = true;
        }
      if (confirmation == true) {
          var targetURL = base_url + targetPage;
          xiliariContent.append("<div class='xiliari-overlay-load'></div>");
          if (targetPage != " " ) {
              $.ajax({
                url : targetURL,
                type : "POST",
                data: {
                  ajax: true
                },
                success: function (result) {
                  $("#xWrapper").html(result);

                },
                error: function (result) {
                  xNavigate('error_page');
                }
                
              })
          } 
      } 
  }

    function deleteSnackbar() {
      setTimeout(function () {
        $("#snackbar").remove();
      }, 3000);
    }

    function xSubmitForm(formID, targetPage, requireConfirmation, confirmMessage) {
    var confirmation = false;
    var is_valid = true;
    var error_message = "";
    var identic_value = "";
    if (requireConfirmation == true) {
        if (confirmMessage == "" || confirmMessage == null) {
            confirmMessage = "Are you sure you want to perform this action?";
        }
        confirmation = confirm(confirmMessage);
    } else {
        confirmation = true;
    }
    if (confirmation == true) {
            var targetURL = base_url + targetPage;
            var form = document.getElementById(formID);
            var input = new FormData(form);
            input.append("ajax", "true");
            $("#xWrapper").append("<div class='gs-load-overlay'></div>");
            if (targetPage != "") {
                $.ajax({
                    url: targetURL,
                    type: "POST",
                    data: input,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (result) {
                      $("#xWrapper").html(result);
                    },
                    error: function () {
                        xNavigate("error_page");
                    }
                });
            }
        }
    }
     function passCheck() {
    var passconf = document.getElementById('passconf');
    var password = document.getElementById('password');
    var warn = document.getElementById('warning');
    console.log(password.value+" "+passconf.value);
    if (passconf.value != password.value) {
      passconf.classList.add("input-warning");
      warn.innerHTML = "Password didn't match";
      document.getElementById('submitButton').disabled = true;

    } else {
      passconf.classList.remove("input-warning");
      warn.innerHTML = "";
      document.getElementById('submitButton').disabled = false;
    }

  }
    function logout() {
      window.location.href = base_url+"logout";
    }