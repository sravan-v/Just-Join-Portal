
let firstName,
    lastName,
    phoneNumber,
    model,
    fuelType,
    kilometers,
    yearOfPurchase,
    dateOfSubmit,
    minPrice,
    maxPrice;

$(('#phoneNumber')).on('keypress', function (e) {
    if ($(e.target).prop('value').length >= 10) {
        if (e.keyCode != 32) { return false }
    }
});

$("#minPrice, #maxPrice, #kilometers").on('keyup', function(){
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

    $('#carBuyer').on('submit', function (e) {
        e.preventDefault();

        firstName = $('#firstName').val();
        lastName = $('#lastName').val();
        phoneNumber = $('#phoneNumber').val();
        aadhar = $('#aadhar').val();
        model = $('#model').val();
        fuelType = $('#fuelType').val();
        kilometers = $('#kilometers').val();
        yearOfPurchase = $('#yearOfPurchase').val();
        dateOfSubmit = $('#dateOfSubmit').val();
        minPrice = $('#minPrice').val();
        maxPrice = $('#maxPrice').val();

        if (firstName === '') {
            $('#firstName').css('border-color', 'red');
            $("html, body").animate({ scrollTop: $("#firstName").offset().top - 120 }, 300);
        }
        else if (phoneNumber.length < 10) {
            $('#phoneNumber').css('border-color', 'red');
            $("html, body").animate({ scrollTop: $("#phoneNumber").offset().top - 120 }, 300);
        }
        else {
            $.ajax({
                type: 'POST',
                url: './snippets/car-buyer.php',
                data: {
                    firstName,
                    lastName,
                    phoneNumber,
                    model,
                    fuelType,
                    kilometers,
                    yearOfPurchase,
                    dateOfSubmit,
                    minPrice,
                    maxPrice
                },
                success: function (res) {
                    // if (res == 'exist') {
                    // alert('Mobile Number already exist!');
                    // $('#fuelType').css('border-color', 'red');
                    // $("html, body").animate({ scrollTop: $("#fuelType").offset().top - 120 }, 300);
                    // }
                    // else {
                    $('#success-modal').modal('show');
                    $('input').css('border-color', '#ccc');
                    $('#carBuyer').trigger('reset');
                    $('#submit-btn').attr("disabled", true);
                    $("html, body").animate({ scrollTop: $("#carBuyer").offset().top - 120 }, 300);
                    // }
                },
                error: function () {
                    alert('Connection Error')
                }
            })
        }
    });
});