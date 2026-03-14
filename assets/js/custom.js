$(document).ready(function() {
    $('.form_submit').submit(function(e) {
        e.preventDefault();
        let frm = $(this);
        let lnk = frm.attr('action');
        frm.find('.vError').remove();
        frm.find('.form-control, .form-select').removeClass('border-danger');

        let btn = frm.find('button[type=submit]');
        btn.prop('disabled', true).text('Saving...');
        $('.preloader').show();
        $.ajax({
            url: lnk,
            data: new FormData(this),
            type: 'POST',
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success === true) {
                    if(response.popup){frm.html(response.popup);}
                    if(response.alert){alert(response.alert);}
                    if(response.reload){location.reload();}
                    if(response.rlink){window.location.href = response.rlink;}
                    
                } else {
                    $.each(response.message, function(key, value) {
                        let field = frm.find('[name="' + key + '"]');
                        field.addClass('border-danger').focus();
                        if(response.after){field.after('<span class="vError">' +value + '</span>');}
                        if(response.before){field.before('<span class="vError">' +value + '</span>');}

                        let tabId = field.closest('.tab-pane').attr('id');
                        $('.nav-link[href="#' + tabId + '"]').tab('show');
                        $('#errormessagePop').append('<p>' + value + '</p>')
                            .show();
                    });

                }
                btn.prop('disabled', false).text('Save lead');
                $('.preloader').hide();
            },
            error: function(xhr, status, error) {
                alert('Something went wrong: ' + error);
                btn.prop('disabled', false).text('Save lead');
                $('.preloader').hide();
            }
        });

        setTimeout(function() {
            $('#errormessagePop').hide().html('');
        }, 2000);
    });

    
    
    
});