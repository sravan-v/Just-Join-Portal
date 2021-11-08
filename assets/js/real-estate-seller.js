
let firstName,
    lastName,
    phoneNumber,
    propertyType,
    propertyLength,
    // propertyUnit,
    propertyValue,
    propertyAddress,
    // dateOfSubmit,
    documentsClear;

// let propertyTypeOthers = '';
// let propertyUnitOthers = '';

$(document).ready(function () {
    $("#propertyType").change(function () {
        $(this).find("option:selected").each(function () {
            let propertyTypeOthersValue = $(this).val().replace(' ', '_').toLowerCase();
            if (propertyTypeOthersValue !== 'null') {
                $(".dropdown_type").not("." + propertyTypeOthersValue).hide();
                console.log(propertyTypeOthersValue);

                if (propertyTypeOthersValue == 'others_type') {
                    $("." + propertyTypeOthersValue).show();
                    $('.' + propertyTypeOthersValue).keyup(function () {
                        return propertyTypeOthers = $(this).val();
                    })
                }
            }
            else {
                $(".dropdown_type").hide();
            }
        });
    }).change();

    // $("#propertyUnit").change(function () {
    //     $(this).find("option:selected").each(function () {
    //         let propertyUnitOthersValue = $(this).val().replace(' ', '_').toLowerCase();
    //         if (propertyUnitOthersValue !== 'null') {
    //             $(".dropdown_unit").not("." + propertyUnitOthersValue).hide();

    //             if (propertyUnitOthersValue == 'others_unit') {
    //                 $("." + propertyUnitOthersValue).show();
    //                 $('.' + propertyUnitOthersValue).keyup(function () {
    //                     return propertyUnitOthers = $(this).val();
    //                 })
    //             }
    //         }
    //         else {
    //             $(".dropdown_unit").hide();
    //         }
    //     });
    // }).change();
});

$("#propertyValue").on('keyup', function(){
    var n = parseInt($(this).val().replace(/\D/g,''), 10);
    $(this).val(n.toLocaleString());
    if($(this).val() == 'NaN'){
        $(this).val('');
    }
});

$(('#phoneNumber')).on('keypress', function (e) {
    if ($(e.target).prop('value').length >= 10) {
        if (e.keyCode != 32) { return false }
    }
})

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
    $('#propertySeller').on('submit', function (e) {
        e.preventDefault();

        firstName = $('#firstName').val();
        lastName = $('#lastName').val();
        phoneNumber = $('#phoneNumber').val();
        propertyType = $('#propertyType').val();
        propertyDetails = $('#propertyDetails').val();
        // propertyUnit = $('#propertyUnit').val();
        propertyValue = $('#propertyValue').val();
        propertyAddress = $('#propertyAddress').val();
        aadhar = $('#aadhar').val();
        address = $('#address').val();
        documentsClear = $('#documentsClear').val();
        // dateOfSubmit = $('#dateOfSubmit').val();

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
                url: "snippets/real-estate-seller.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function () {
                    $('#success-modal').modal('show');
                    $('input').css('border-color', '#ccc');
                    $('#propertySeller').trigger('reset');
                    $('#propertyTypeOthers').val('');
                    // $('#propertyUnitOthers').val('');
                    $('#submit-btn').attr("disabled", true);
                    $("html, body").animate({ scrollTop: $("#propertySeller").offset().top - 120 }, 300);
                },
                error: function () {
                    alert('Connection Error')
                }
            })
        }
    });
});