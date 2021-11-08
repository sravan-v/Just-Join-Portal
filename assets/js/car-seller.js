let firstName,
    lastName,
    phoneNumber,
    model,
    fuelType,
    kilometers,
    yearOfPurchase,
    ownerName,
    ownerDetails,
    minPrice,
    maxPrice,
    anyIssues,
    dateOfSubmit;

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

$(function () {
    enable_cb();
    $("#gridCheck").click(enable_cb);
});

function enable_cb() {
    if (this.checked) {
        $('#submit-btn').removeAttr("disabled");
    } else {
        $('#submit-btn').attr("disabled", true);
    }
}

$(document).ready(function () {

    $('#carSeller').on('submit', function (e) {
        e.preventDefault();

        firstName = $('#firstName').val();
        lastName = $('#lastName').val();
        phoneNumber = $('#phoneNumber').val();
        aadhar = $('#aadhar').val();
        address = $('#address').val();
        model = $('#model').val();
        fuelType = $('#fuelType').val();
        kilometers = $('#kilometers').val();
        yearOfPurchase = $('#yearOfPurchase').val();
        vehicleNumber = $('#vehicleNumber').val();
        maxPrice = $('#maxPrice').val();
        anyIssues = $('#anyIssues').val();
        dateOfSubmit = $('#dateOfSubmit').val();

        if (firstName === '') {
            $('#firstName').css('border-color', 'red');
            $("html, body").animate({ scrollTop: $("#firstName").offset().top - 120 }, 300);
        }
        else if (phoneNumber.length < 10) {
            $('#phoneNumber').css('border-color', 'red');
            $("html, body").animate({ scrollTop: $("#phoneNumber").offset().top - 120 }, 300);
        }
        else if (address === '') {
            $('#address').css('border-color', 'red');
            $("html, body").animate({ scrollTop: $("#address").offset().top - 120 }, 300);
        }
        else {
            $.ajax
                ({
                    url: "snippets/car-seller.php",
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
                })
        }
    });
});