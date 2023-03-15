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
        $.ajax({
            url: 'settings.php',
            type: 'POST',
            data: $('form').serialize(),
            success: function(response){
                alert(response);
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Произошла ошибка: ' + errorThrown);
            },
            complete: function() {
                // Код, выполняющийся после завершения AJAX-запроса
            }
        });
    });
});
