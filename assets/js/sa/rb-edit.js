
let propertyBuyerName,
    propertyBuyerSurname,
    propertyType,
    propertValue,
    propertyPhonenumber,
    buyerAddress,
    dateOfSubmit;

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

        employerID = $('#employerID').val();
        propertyBuyerName = $('#propertyBuyerName').val();
        propertyBuyerSurname = $('#propertyBuyerSurname').val();
        propertyType = $('#propertyType').val().toLowerCase();
        propertValue = $('#propertValue').val();
        propertyPhonenumber = $('#propertyPhonenumber').val();
        buyerAddress = $('#buyerAddress').val();
        dateOfSubmit = $('#dateOfSubmit').val();
        employeeStatus = $('#employeeStatus').val();
        employeeReached = $('#employeeReached').val();
        employeePaid = $('#employeePaid').val();
        employeeReachedComment = $('#employeeReachedComment').val();

        console.log(employerID,
            propertyBuyerName,
            propertyBuyerSurname,
            propertyType,
            propertyOthers,
            propertValue,
            propertyPhonenumber,
            buyerAddress,
            dateOfSubmit,
            employeeStatus,
            employeeReached,
            employeePaid,
            employeeReachedComment);
            
        let sure = confirm("Do you want to update?");
        if (sure == false) {
            return false;
        }
        else {
            $.ajax({
                type: 'POST',
                url: '../../../dashboard/sa/rb/rb-profile-update.php',
                data: {
                    employerID,
                    propertyBuyerName,
                    propertyBuyerSurname,
                    propertyType,
                    propertyOthers,
                    propertValue,
                    propertyPhonenumber,
                    buyerAddress,
                    dateOfSubmit,
                    employeeStatus,
                    employeeReached,
                    employeePaid,
                    employeeReachedComment
                },
                success: function () {
                    $('#success-modal').modal('show');
                    $('input').css('border-color', '#ccc');
                    $('#propertyBuyer').trigger('reset');
                    $('#propertyOthers').val('');
                    $('#submit-btn').attr("disabled", true);
                    $("html, body").animate({ scrollTop: $("#propertyBuyer").offset().top - 120 }, 300);
                },
                error: function () {
                    alert('Connection Error')
                }
            })
        }
    });
});