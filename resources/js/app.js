require('./bootstrap');

jQuery(document).ready(function() {

    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });

    tinymce.init({
        selector: '#body',
        menubar: false,
        setup: function(editor) {
            editor.on('change', function(e) {
                editor.save();
            });
        }
    });

    $(function() {
        if (window.location.hash) {
            var hash = window.location.hash;
            $(hash).modal('toggle');
        }
    });

    $(document).on('click', '#login-button', function() {

        let form = $(this).parent().parent();

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            dataType: 'json'
        }).done(function(response) {
            location.reload();
        }).fail(function(jqXHR, textStatus) {
            let errors = jqXHR.responseJSON.errors;
            Object.entries(errors).forEach((entry) => {
                const [key, value] = entry;
                form.find('#' + key).addClass('is-invalid');
                form.find('#' + key).parent().append(
                    '<div class="invalid-feedback">' + value + '</div>');
            });
        });
    })
});
