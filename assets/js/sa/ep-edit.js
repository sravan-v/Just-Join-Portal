let employeeID,
    employeeJobName,
    employeeFirstName,
    employeeLastName,
    employeeFatherName,
    employeeDOB,
    employeeGender,
    employeeAddress,
    employeePhoneNumber,
    employeeAadhar,
    employeeOrganization,
    employeeJobType,
    employeeJobExperience,
    employeePresentCompanyName,
    employeePresentSalary,
    employeeExpectedSalary,
    employeeStatus,
    employeeReached,
    employeePaid,
    employeeReachedComment;
let employeeJobTypeAttr = '';

// Employee Filter 
$(document).ready(function () {
    $(".dropdown").hide();
    $("#defaultDropdown").show();
    $("#employeeOrganization").change(function () {
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
});

$(('#employeePhoneNumber')).on('keypress', function (e) {
    if ($(e.target).prop('value').length >= 10) {
        if (e.keyCode != 32) { return false }
    }
});

$("#employeePresentSalary, #employeeExpectedSalary").on('keyup', function(){
    var n = parseInt($(this).val().replace(/\D/g,''), 10);
    $(this).val(n.toLocaleString());
    if($(this).val() == 'NaN'){
        $(this).val('');
    }
});


$(('#employeeAadhar')).on('keypress', function (e) {
    if ($(e.target).prop('value').length >= 12) {
        if (e.keyCode != 32) { return false }
    }
})

$(document).ready(function () {

    $('#employee-form').on('submit', function (e) {
        e.preventDefault();

        let sure = confirm("Do you want to update?");
        if (sure == false) {
            return false;
        }
        else {
            employeeID = $('#employeeID').val();
            employeeJobName = $('#employeeJobName').val();
            employeeFirstName = $('#employeeFirstName').val();
            employeeLastName = $('#employeeLastName').val();
            employeeFatherName = $('#employeeFatherName').val();
            employeeDOB = $('#employeeDOB').val();
            employeeGender = $('#employeeGender').val();
            employeeAddress = $('#employeeAddress').val();
            employeePhoneNumber = $('#employeePhoneNumber').val();
            employeeAadhar = $('#employeeAadhar').val();
            employeeOrganization = $('#employeeOrganization').val();
            employeeJobType = employeeJobTypeAttr;
            employeeJobExperience = $('#employeeJobExperience').val();
            employeePresentCompanyName = $('#employeePresentCompanyName').val();
            employeePresentSalary = $('#employeePresentSalary').val();
            employeeExpectedSalary = $('#employeeExpectedSalary').val();
            employeeStatus = $('#employeeStatus').val();
            employeeReached = $('#employeeReached').val();
            employeePaid = $('#employeePaid').val();
            employeeReachedComment = $('#employeeReachedComment').val();

            // validate 
            // if (employeeJobName === '') {
            //     $('#employeeJobName').css('border-color', 'red');
            //     $("html, body").animate({ scrollTop: $("#employeeJobName").offset().top - 120 }, 300);
            // }
            if (employeeFirstName === '') {
                $('#employeeFirstName').css('border-color', 'red');
                $("html, body").animate({ scrollTop: $("#employeeFirstName").offset().top - 120 }, 300);
            }
            else if (employeeDOB === '') {
                $('#employeeDOB').css('border-color', 'red');
                $("html, body").animate({ scrollTop: $("#employeeDOB").offset().top - 120 }, 300);
            }
            else if (employeeGender === '') {
                $('#employeeGender').css('border-color', 'red');
                $("html, body").animate({ scrollTop: $("#employeeGender").offset().top - 120 }, 300);
            }
            else if (employeeAddress === '') {
                $('#employeeAddress').css('border-color', 'red');
                $("html, body").animate({ scrollTop: $("#employeeAddress").offset().top - 120 }, 300);
            }
            else if (employeePhoneNumber.length < 10) {
                $('#employeePhoneNumber').css('border-color', 'red');
                $("html, body").animate({ scrollTop: $("#employeePhoneNumber").offset().top - 120 }, 300);
            }
            else {
                console.log(
                    employeeID,
                    employeeJobName,
                    employeeFirstName,
                    employeeLastName,
                    employeeFatherName,
                    employeeDOB,
                    employeeGender,
                    employeeAddress,
                    employeePhoneNumber,
                    employeeAadhar,
                    employeeOrganization,
                    employeeJobType,
                    employeeJobExperience,
                    employeePresentCompanyName,
                    employeePresentSalary,
                    employeeExpectedSalary,
                    employeeStatus,
                    employeeReached,
                    employeePaid,
                    employeeReachedComment
                );

                $.ajax({
                    type: 'POST',
                    url: '../../../dashboard/sa/ep/ep-profile-update.php',
                    data: {
                        employeeID,
                        employeeJobName,
                        employeeFirstName,
                        employeeLastName,
                        employeeFatherName,
                        employeeDOB,
                        employeeGender,
                        employeeAddress,
                        employeePhoneNumber,
                        employeeAadhar,
                        employeeOrganization,
                        employeeJobType,
                        employeeJobExperience,
                        employeePresentCompanyName,
                        employeePresentSalary,
                        employeeExpectedSalary,
                        employeeStatus,
                        employeeReached,
                        employeePaid,
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