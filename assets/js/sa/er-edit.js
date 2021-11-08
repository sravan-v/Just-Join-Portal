let employerID,
    employerName,
    employerDesignation,
    organizationType,
    organisationName,
    employerPhoneNumber,
    employerEmail,
    employerAddress,
    employeeCategory,
    employeeJobType,
    employeePositions,
    employeeGender,
    employeeExperience,
    employeeSalaryMin,
    employeeSalaryMax,
    employerStatus,
    employerReached,
    employerPaid,
    employeeReachedComment;
let employeeJobTypeAttr = '';

// Employee Filter 
$(document).ready(function () {
    $(".dropdown").hide();
    $("#defaultDropdown").show();
    $("#employeeCategory").change(function () {
        $(this).find("option:selected").each(function () {
            let employeeOrganizationValue = $(this).val().replace(' ', '_').toLowerCase();
            console.log(employeeOrganizationValue);
            if (employeeOrganizationValue !== 'null') {
                $(".dropdown").not("." + employeeOrganizationValue).hide();
                $("#defaultDropdown").hide();
                $("." + employeeOrganizationValue).show();

                if (employeeOrganizationValue !== 'others') {
                    $("." + employeeOrganizationValue).change(function () {
                        $(this).find("option:selected").each(function () {
                            console.log(employeeJobTypeAttr);
                            return employeeJobTypeAttr = $(this).attr("value");
                        })
                    }).change()
                }
                else {
                    $('.' + employeeOrganizationValue).keyup(function () {
                        return employeeJobTypeAttr = $(this).val();
                    })
                }
            }
            else {
                $(".dropdown").hide();
            }
        });
    }).change();
})

$("#employeeSalaryMin, #employeeSalaryMax").on('keyup', function(){
    var n = parseInt($(this).val().replace(/\D/g,''), 10);
    $(this).val(n.toLocaleString());
    if($(this).val() == 'NaN'){
        $(this).val('');
    }
});

$(('#employerPhoneNumber')).on('keypress', function (e) {
    if ($(e.target).prop('value').length >= 10) {
        if (e.keyCode != 32) { return false }
    }
})

$(document).ready(function () {

    $('#employer-form').on('submit', function (e) {
        e.preventDefault();
        let sure = confirm("Do you want to update?");
        if (sure == false) {
            return false;
        }
        else {
            employerID = $('#employerID').val();
            employerName = $('#employerName').val();
            employerDesignation = $('#employerDesignation').val();
            organizationType = $('#organizationType').val();
            organisationName = $('#organisationName').val();
            employerPhoneNumber = $('#employerPhoneNumber').val();
            employerEmail = $('#employerEmail').val();
            employerAddress = $('#employerAddress').val();
            employeeCategory = $('#employeeCategory').val();
            employeeJobType = employeeJobTypeAttr;
            employeePositions = $('#employeePositions').val();
            employeeGender = $('#employeeGender').val();
            employeeExperience = $('#employeeExperience').val();
            employeeSalaryMin = $('#employeeSalaryMin').val();
            employeeSalaryMax = $('#employeeSalaryMax').val();
            employerStatus = $('#employerStatus').val();
            employerReached = $('#employerReached').val();
            employerPaid = $('#employerPaid').val();
            employeeReachedComment = $('#employeeReachedComment').val();

            // validate 
            // if (employerName === '') {
            //     $('#employerName').css('border-color', 'red');
            //     $("html, body").animate({ scrollTop: $("#employerName").offset().top - 120 }, 300);
            // }
            if (employerDesignation === '') {
                $('#employerDesignation').css('border-color', 'red');
                $("html, body").animate({ scrollTop: $("#employerDesignation").offset().top - 120 }, 300);
            }
            else if (organizationType === '') {
                $('#organizationType').css('border-color', 'red');
                $("html, body").animate({ scrollTop: $("#organizationType").offset().top - 120 }, 300);
            }
            else if (organisationName === '') {
                $('#organisationName').css('border-color', 'red');
                $("html, body").animate({ scrollTop: $("#organisationName").offset().top - 120 }, 300);
            }
            else if (employerPhoneNumber.length < 10) {
                $('#employerPhoneNumber').css('border-color', 'red');
                $("html, body").animate({ scrollTop: $("#employerPhoneNumber").offset().top - 120 }, 300);
            }
            else if (employerEmail === '') {
                $('#employerEmail').css('border-color', 'red');
                $("html, body").animate({ scrollTop: $("#employerEmail").offset().top - 120 }, 300);
            }
            else if (employerAddress === '') {
                $('#employerAddress').css('border-color', 'red');
                $("html, body").animate({ scrollTop: $("#employerEmail").offset().top - 120 }, 300);
            }
            else {
                console.log(
                    employerID,
                    employerName,
                    employerDesignation,
                    organizationType,
                    organisationName,
                    employerPhoneNumber,
                    employerEmail,
                    employerAddress,
                    employeeCategory,
                    employeeJobType,
                    employeePositions,
                    employeeGender,
                    employeeExperience,
                    employeeSalaryMin,
                    employeeSalaryMax,
                    employerStatus,
                    employerReached,
                    employerPaid,
                    employeeReachedComment

                );

                $.ajax({
                    type: 'POST',
                    url: '../../../dashboard/sa/er/er-profile-update.php',
                    data: {
                        employerID,
                        employerName,
                        employerDesignation,
                        organizationType,
                        organisationName,
                        employerPhoneNumber,
                        employerEmail,
                        employerAddress,
                        employeeCategory,
                        employeeJobType,
                        employeePositions,
                        employeeGender,
                        employeeExperience,
                        employeeSalaryMin,
                        employeeSalaryMax,
                        employerStatus,
                        employerReached,
                        employerPaid,
                        employeeReachedComment
                    },
                    success: function () {
                        $('#success-modal').modal('show');
                    }
                })
            }
        }

    });
});