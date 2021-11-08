
let propertyBuyerName,
    propertyBuyerSurname,
    propertyType,
    propertValue,
    propertyPhonenumber,
    buyerAddress;
    // dateOfSubmit;

let propertyOthers = '';

// Employee Filter 
$(document).ready(function () {
    $("#propertyType").change(function () {
        $(this).find("option:selected").each(function () {
            let propertyOthersValue = $(this).val().replace(' ', '_').toLowerCase();
            if (propertyOthersValue !== 'null') {
                $(".dropdown").not("." + propertyOthersValue).hide();

                if (propertyOthersValue == 'others') {
                    $("." + propertyOthersValue).show();
                    $('.' + propertyOthersValue).keyup(function () {
                        return propertyOthers = $(this).val();
                    })
                }
            }
            else {
                $(".dropdown").hide();
            }
        });
    }).change();
});

$("#propertValue").on('keyup', function(){
    var n = parseInt($(this).val().replace(/\D/g,''), 10);
    $(this).val(n.toLocaleString());
    if($(this).val() == 'NaN'){
        $(this).val('');
    }
});

$(('#propertyPhonenumber')).on('keypress', function (e) {
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

    $('#propertyBuyer').on('submit', function (e) {
        e.preventDefault();

        propertyBuyerName = $('#propertyBuyerName').val();
        propertyBuyerSurname = $('#propertyBuyerSurname').val();
        propertyType = $('#propertyType').val();
        aadhar = $('#aadhar').val();
        propertValue = $('#propertValue').val();
        propertyPhonenumber = $('#propertyPhonenumber').val();
        buyerAddress = $('#buyerAddress').val();
        // dateOfSubmit = $('#dateOfSubmit').val();

        if (propertyBuyerName === '') {
            $('#propertyBuyerName').css('border-color', 'red');
            $("html, body").animate({ scrollTop: $("#propertyBuyerName").offset().top - 120 }, 300);
        }
        else if (propertyPhonenumber.length < 10) {
            $('#propertyPhonenumber').css('border-color', 'red');
            $("html, body").animate({ scrollTop: $("#propertyPhonenumber").offset().top - 120 }, 300);
        }
        else {
            $.ajax({
                type: 'POST',
                url: './snippets/real-estate-buyer.php',
                data: {
                    propertyBuyerName,
                    propertyBuyerSurname,
                    propertyType,
                    propertyOthers,
                    propertValue,
                    propertyPhonenumber,
                    buyerAddress,
                    // dateOfSubmit
                },
                success: function (res) {
                    // if (res == 'exist') {
                    // alert('Mobile Number already exist!');
                    // $('#propertyPhonenumber').css('border-color', 'red');
                    // $("html, body").animate({ scrollTop: $("#propertyPhonenumber").offset().top - 120 }, 300);
                    // }
                    // else {
                    $('#success-modal').modal('show');
                    $('input').css('border-color', '#ccc');
                    $('#propertyBuyer').trigger('reset');
                    $('#propertyOthers').val('');
                    $('#submit-btn').attr("disabled", true);
                    $("html, body").animate({ scrollTop: $("#propertyBuyer").offset().top - 120 }, 300);
                    // }
                },
                error: function () {
                    alert('Connection Error')
                }
            })
        }
    });
});