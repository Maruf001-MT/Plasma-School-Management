//Form Submition
function ajaxSubmit(e, form, callBackFunction) {

    if(form.valid()) {
        e.preventDefault();

        var action = form.attr('action');
        var form2 = e.target;
        var data = new FormData(form2);
        $.ajax({
            type: "POST",
            url: action,
            processData: false,
            contentType: false,
            dataType: 'json',
            data: data,
            success: function(response)
            {
                if (response.status) {
                    success_notify(response.notification);
                    if(form.attr('class') === 'ajaxDeleteForm'){
                        $('#alert-modal').modal('toggle')
                    }else{
                        $('#right-modal').modal('hide');
                    }
                    callBackFunction();
                }else{
                    error_notify(response.notification);
                }
            }
        });
    }else {
        error_required_field();
    }
}
