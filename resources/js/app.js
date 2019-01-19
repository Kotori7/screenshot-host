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
    // auto-close notification after 2 seconds
    setTimeout(function(){
        $('#alert-success').css('display', 'none');
    }, 2000);
}

// show an error message
errorMessage = function(message){
    $('#alert-error-message').html(message);
    $('#alert-error').css('display', 'block');
    // auto-close notification after 5 seconds
    setTimeout(function(){
        $('#alert-error').css('display', 'none');
    }, 5000);
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

// delete link handler
$('a.delete-file').click(function(e){
    e.preventDefault();
   axios.post($(this).attr('href'))
       .then(function(){
           successMessage("File deleted successfully.");
           location.reload();
       })
       .catch(function(err){
           errorMessage("An error occurred when trying to delete the file: " + err);
       });
   return false;
});