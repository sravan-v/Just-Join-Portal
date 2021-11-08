
let employeeJobName,
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
    employeeExpectedSalary;

let employeeJobTypeAttr = '';

// Employee Filter 
$(document).ready(function () {
    $("#employeeOrganization").change(function () {
        $(this).find("option:selected").each(function () {
            let employeeOrganizationValue = $(this).val().replace(' ', '_').toLowerCase();
            // console.log(employeeOrganizationValue);
            if (employeeOrganizationValue !== 'null') {
                $(".dropdown").not("." + employeeOrganizationValue).hide();
                $("#defaultDropdown").hide();
                $("." + employeeOrganizationValue).show();

                if (employeeOrganizationValue !== 'others') {
                    $("." + employeeOrganizationValue).change(function () {
                        $(this).find("option:selected").each(function () {
                            // console.log(employeeJobTypeAttr);
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
})
$(('#employeeAadhar')).on('keypress', function (e) {
    if ($(e.target).prop('value').length >= 12) {
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

    $('#employee-form').on('submit', function (e) {
        e.preventDefault();
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
        // let date = new Date();
        // let dateOfReg = date.toLocaleString();

        // validate 
        if (employeeJobName === '') {
            $('#employeeJobName').css('border-color', 'red');
            $("html, body").animate({ scrollTop: $("#employeeJobName").offset().top - 120 }, 300);
        }
        else if (employeeFirstName === '') {
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
            // console.log(
            //     employeeJobName,
            //     employeeFirstName,
            //     employeeLastName,
            //     employeeFatherName,
            //     employeeDOB,
            //     employeeGender,
            //     employeeAddress,
            //     employeePhoneNumber,
            //     employeeAadhar,
            //     employeeOrganization,
            //     employeeJobType,
            //     employeeJobExperience,
            //     employeePresentCompanyName,
            //     employeePresentSalary,
            //     employeeExpectedSalary
            // );

            $.ajax({
                type: 'POST',
                url: './snippets/employee-form.php',
                data: {
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
                    employeeExpectedSalary
                },
                success: function (res) {
                    if (res == 'exist') {
                        alert('Mobile Number already exist!');
                        $('#employeePhoneNumber').css('border-color', 'red');
                        $("html, body").animate({ scrollTop: $("#employeePhoneNumber").offset().top - 120 }, 300);
                    }
                    else {
                        $('#success-modal').modal('show');
                        $('input').css('border-color', '#ccc');
                        $('#employee-form').trigger('reset');
                        $('#submit-btn').attr("disabled", true);
                    }
                },
                error: function () {
                    alert('Connection Error')
                }
            })
        }
    });
});