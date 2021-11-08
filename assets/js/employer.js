let employerName,
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
    employeeSalaryMax;
let employeeJobTypeAttr = '';

// Employee Filter 
$(document).ready(function () {
    $("#employeeCategory").change(function () {
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
                } else {
                    $('.' + employeeOrganizationValue).keyup(function () {
                        return employeeJobTypeAttr = $(this).val();
                    })
                }
            } else {
                $(".dropdown").hide();
            }
        });
    }).change();
});

$(('#employerPhoneNumber')).on('keypress', function (e) {
    if ($(e.target).prop('value').length >= 10) {
        if (e.keyCode != 32) { return false }
    }
});

$("#employeeSalaryMin, #employeeSalaryMax").on('keyup', function(){
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

    $('#employer-form').on('submit', function (e) {
        e.preventDefault();

        employerName = $('#employerName').val();
        employerDesignation = $('#employerDesignation').val();
        organizationType = $('#organizationType').val();
        organisationName = $('#organisationName').val();
        employerPhoneNumber = $('#employerPhoneNumber').val();
        employerEmail = $('#employerEmail').val();
        employerAddress = $('#employerAddress').val();
        employerAadhar = $('#employerAadhar').val();
        employeeCategory = $('#employeeCategory').val();
        employeeJobType = employeeJobTypeAttr;
        employeePositions = $('#employeePositions').val();
        employeeGender = $('#employeeGender').val();
        employeeExperience = $('#employeeExperience').val();
        employeeSalaryMin = $('#employeeSalaryMin').val();
        employeeSalaryMax = $('#employeeSalaryMax').val();
        // let date = new Date();
        // let dateOfReg = date.toLocaleString();

        // validate 
        if (employerName === '') {
            $('#employerName').css('border-color', 'red');
            $("html, body").animate({ scrollTop: $("#employerName").offset().top - 120 }, 300);
        }
        else if (employerPhoneNumber.length < 10) {
            $('#employerPhoneNumber').css('border-color', 'red');
            $("html, body").animate({ scrollTop: $("#employerPhoneNumber").offset().top - 120 }, 300);
        }
        else if (employerAddress === '') {
            $('#employerAddress').css('border-color', 'red');
            $("html, body").animate({ scrollTop: $("#employerAddress").offset().top - 120 }, 300);
        }
        else {
            // console.log(
            //     employerName,
            //     employerDesignation,
            //     organizationType,
            //     organisationName,
            //     employerPhoneNumber,
            //     employerEmail,
            //     employerAddress,
            //     employeeCategory,
            //     employeeJobType,
            //     employeePositions,
            //     employeeGender,
            //     employeeExperience,
            //     employeeSalaryMin,
            //     employeeSalaryMax
            // );

            $.ajax({
                type: 'POST',
                url: './snippets/employer-form.php',
                data: {
                    employerName,
                    employerDesignation,
                    organizationType,
                    organisationName,
                    employerPhoneNumber,
                    employerEmail,
                    employerAddress,
                    employerAadhar,
                    employeeCategory,
                    employeeJobType,
                    employeePositions,
                    employeeGender,
                    employeeExperience,
                    employeeSalaryMin,
                    employeeSalaryMax
                },
                success: function (res) {
                    if (res == 'exist') {
                        alert('Mobile Number already exist!');
                        $('#employerPhoneNumber').css('border-color', 'red');
                        $("html, body").animate({ scrollTop: $("#employerPhoneNumber").offset().top - 120 }, 300);
                    }
                    else {
                        $('#success-modal').modal('show');
                        $('input').css('border-color', '#ccc');
                        $('#employer-form').trigger('reset');
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