require('./bootstrap');

$(function() {

    tinymce.init({
        selector: '.tinymce',
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

    $(document).on('click', '.accept-answer', function(e) {
        
        e.preventDefault();
        let url = $(this).attr('href');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.post(url, function() {
            location.reload();
        })
    })

    $(document).on('click', '.bookmark', function(e) {
        e.preventDefault();
        let dom = $(this)
            url = dom.attr('href')
            method = dom.data('method');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: url,
            method: method
        }).done(function() {
            location.reload();
        }).fail(function(jqXHR, textStatus, errorThrown) {
            let popover = new bootstrap.Popover(dom, {
                container: 'body',
                html: true,
                content: 'Please <a href="login">sign in</a> or <a href="register">sign up</a> to bookmark this question',
                trigger: 'focus'
            })
            popover.show();
        })
    })
});
