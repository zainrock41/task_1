$(document).ready(function () {

    // =============================
    // FORM VALIDATION
    // =============================
    $("#EmployeeCreateForm, #EmployeeEditForm").validate({
        rules: {
            firstName: { required: true, maxlength: 255 },
            lastName: { required: true, maxlength: 255 },
            companyId: { required: true },
            email: { email: true, maxlength: 255 },
            phone: { maxlength: 20 }
        },
        messages: {
            firstName: {
                required: "First name is required.",
                maxlength: "First name cannot exceed 255 characters."
            },
            lastName: {
                required: "Last name is required.",
                maxlength: "Last name cannot exceed 255 characters."
            },
            companyId: {
                required: "Please select a company."
            },
            email: {
                email: "Please enter a valid email address.",
                maxlength: "Email cannot exceed 255 characters."
            },
            phone: {
                maxlength: "Phone number cannot exceed 20 characters."
            }
        },
        errorClass: "text-danger",
        errorElement: "span",
        highlight: function (element) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid");
        }
    });
    
    // =============================
    // AUTO HIDE ALERT
    // =============================
    setTimeout(() => {
        $('.alert').fadeOut();
    }, 3000);
});
