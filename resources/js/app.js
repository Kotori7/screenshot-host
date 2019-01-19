// load js dependencies
require('./bootstrap');

// automatically collapse the messages on ready
$(document).ready(function(){
    $('#alert-error').css('display', 'none');
    $('#alert-success').css('display', 'none');
});

// show a success message
successMessage = function(message){
    $('#alert-success-message').html(message);
    $('#alert-success').css('display', 'block');
}

// show an error message
errorMessage= function(message){
    $('#alert-error-message').html(message);
    $('#alert-error').css('display', 'block');
}

// handler for the alert close link
$('.alert.fixed-top > a').click(function(){
    $('#alert-error').css('display', 'none');
    $('#alert-success').css('display', 'none');
});

// upload form handler
$('#upload-form').submit(function(){
    $(this).ajaxSubmit({
        success: function(){
            successMessage("File uploaded successfully!");
            setTimeout(function(){
                location.reload();
            }, 2000);
        }
    });
    return false;
});

//