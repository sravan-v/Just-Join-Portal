$(('#phoneNumber')).on('keypress', function (e) {
    if ($(e.target).prop('value').length >= 10) {
        if (e.keyCode != 32) { return false }
    }
});


$("#maxPrice, #kilometers").on('keyup', function(){
    var n = parseInt($(this).val().replace(/\D/g,''), 10);
    $(this).val(n.toLocaleString());
    if($(this).val() == 'NaN'){
        $(this).val('');
    }
});


$(document).ready(function () {
    $('#carSeller').on('submit', function (e) {
        e.preventDefault();
        let sure = confirm("Do you want to update?");
        if (sure == false) {
            return false;
        }
        else {
            $.ajax({
                url: "../../../dashboard/sa/cs/cs-profile-update.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function () {
                    $('#success-modal').modal('show');
                    $('input').css('border-color', '#ccc');
                    $('#carSeller').trigger('reset');
                    $('#submit-btn').attr("disabled", true);
                    $("html, body").animate({ scrollTop: $("#carSeller").offset().top - 120 }, 300);
                },
                error: function () {
                    alert('Connection Error')
                }
            });
        }
    });
});