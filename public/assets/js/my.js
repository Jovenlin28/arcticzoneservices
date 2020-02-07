// displaying errors
function display_errors(message,field,error_field){
    $(field).addClass('is-invalid');
    $(error_field).show();
    $(error_field).text(message);
}

// eliminate errors

function eliminate_errors(field,error_field){
    $(field).removeClass("is-invalid");
    $(error_field).text('');
}