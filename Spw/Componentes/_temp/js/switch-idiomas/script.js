$(document).ready(function() {

    
    $('#spw-background').hide();
    $('#spw-box').hide();
    
    $('#spw-active,#spw-background').click(function() {

        $('#spw-box').toggle('fast');
        $('.spw-switch-idiomas-01').toggleClass('spw-branco');
        $('#spw-background').toggle();

    });

    
    
});
