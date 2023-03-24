$(document).ready(function() {
	
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
   
    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});
$(document).ready(function(){
    $('form').submit(function(event){
        event.preventDefault();
        var formData = new FormData($('form')[0]);
        $.ajax({
            url: 'profile.php',
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response){
                alert(response);
            },
            complete: function() {
            }
        });
    });
});
$(document).ready(function() {
    $('textarea').on('input', function () {
      this.style.height = 'auto';
      this.style.height = (this.scrollHeight) + 'px';
    });
  });
  window.onload = function() {
    if (window.performance && window.performance.navigation.type === window.performance.navigation.TYPE_RELOAD) {
      var form = document.getElementById("form");
      form.reset();
      var images = document.getElementsByTagName("image");
      for (var i = 0; i < images.length; i++) {
        images[i].addEventListener("click", function() {
          this.remove();
        });
      }
    }
  }
  
