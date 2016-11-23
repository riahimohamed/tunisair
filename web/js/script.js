$(document).ready(function(){

    $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });

    $('input[type="file"]').on('change', function (event, files, label) {
        var file_name = this.value.replace(/\\/g, '/').replace(/.*\//, '')
        $('.upload-path').text(file_name);
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    $(function(){
        $('.tab-section').hide();
        $('#tabs a').bind('click', function(e){
            $('#tabs a.current').removeClass('current');
            $('.tab-section:visible').hide();
            $(this.hash).show();
            $(this).addClass('current');
            e.preventDefault();
        }).filter(':first').click();
    });

    $('#reseau').change(function() {
        var slct = $(this).val();

        $('.table>tbody>tr').hide();
        $('.table>tbody>tr'+slct).show();
    });

});
