<?php 
if(isset($message)){
  echo $message;
}

?>
<h2>Edit Profile</h2>
<form id="primaryForm" enctype="multipart/form">
  <div class="grid-container column-2">
    <div>
      <div class="form-group">
        <label for="admin_name">Product Name</label>
        <input type="text" class="form-control" name="product_name">
      </div>
      <div class="file-select">
        <div class="triger-button" onclick="uploadFIle()">Choose file to upload</div>
        <input type="file" id="btnFile" multiple="" onchange="fileSet(this)">
        <label id="filePlaceholder">No file choosen, yet ?</label>
      </div>
    </div>  
  </div>
  <div>

  </div>
  <div class="btn-container">
    <div id="submitButton" class="btn good" onclick="xSubmitForm('primaryForm','process_product_add')">Submit</div>
  </div>
</form>

<script>
  var btnFile = document.getElementById("btnFile");

  function uploadFIle() {
    btnFile.click();
  }

  function fileSet(target) {
    var label = target.nextElementSibling;
    var labelVal = label.innerHTML;
    var fileName = "";
    var reader = new FileReader();
    let isValid = false;
    reader.readAsDataURL(target.files[0]);
    reader.onload = function(e){
      let image = new Image();
      image.src = e.target.result;
      image.onload = function(){
         var MAX_WIDTH = 400;
         var MAX_HEIGHT = 400;
         var tempW = image.width;
         var tempH = image.height;
         if (tempW > tempH) {
             if (tempW > MAX_WIDTH) {
                tempH = MAX_WIDTH;
                tempW = MAX_WIDTH;
             }
         } else {
             if (tempH > MAX_HEIGHT) {
                tempW = MAX_HEIGHT;
                tempH = MAX_HEIGHT;
             }
         }

        var canvas = document.createElement('canvas');
        canvas.width = tempW;
        canvas.height = tempH;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(this, 0, 0, tempW, tempH);
        var dataURL = canvas.toDataURL("image/jpg");
        if (target.files.length > 0) {
            if (target.files.length > 1) {
                fileName = target.files.length + " files selected";
            } else {
                fileName = target.files[0].name;
                document.getElementsByClassName('triger-button')[0].innerHTML = "<img src='"+dataURL+"'>";
            }
        }
        if (fileName != "") {
          label.innerHTML = fileName;
        } else {
          label.innerHTML = labelVal;
        }
      }
    }
  }
</script>