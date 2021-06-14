var logoWidth, logoContainer;
$(document).ready(function () {

    $('#loginForm').submit(function(event){
        event.preventDefault();

        var username = $('#username').val(),
            password = $('#password').val();

        submitAnimation();

        setTimeout(function(){
            if(username !== 'admin') {
                invalidLogin();
            } else {
                $('.tooltip .name').innerText = username;
                validLogin();
            }
        }, 1000);
    });

    (function(){
        var $logo = $('.logo .img'),
            title = $logo.html().split('');

        $logo.html('');
        for(var i = 0; i < title.length; i++) {
            var letter = $('<p style="animation-delay:' + (0.1 + 0.05 * i) + 's">' + title[i] + '</p>');
            $logo.append(letter);
        }
    })();

    function padCenter() {
        logoWidth = $('.logo .img').width();
        logoContainer = $('.logo').width();

        $('.logo-padding').delay(300).width((logoContainer - logoWidth) / 2);
    }

    function resetPadding() {
        $('.logo-padding').width(0);
    }

    function showLoader() {
        $('.loader-container').fadeIn().css('display', 'inline-block');
    }

    function hideLoader() {
        $('.loader-container').fadeOut().css('display', 'none');
    }

    function submitAnimation() {
        $('.login-message').slideUp(200);
        showLoader();
        $('input').attr('disabled','disabled');
    }

    function responseAnimation() {
        hideLoader();
        $('input').removeAttr('disabled');
    }

    function welcomeAnimation() {
        padCenter();
        $('.input-container').slideUp(200);
    }

    function invalidLogin() {
        $('.login-message').slideDown(200);
        responseAnimation();
    }

    function validLogin() {
        hideLoader();
        welcomeAnimation();
    }
});