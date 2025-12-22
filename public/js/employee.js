$(document).ready(function () {

    // =============================
    // FORM VALIDATION
    // =============================
    $("#EmployeeCreateForm, #EmployeeEditForm").validate({
        rules: {
            first_name: { required: true, maxlength: 255 },
            last_name: { required: true, maxlength: 255 },
            company_id: { required: true },
            email: { email: true, maxlength: 255 },
            phone: { maxlength: 20 }
        },
        messages: {
            first_name: {
                required: "First name is required.",
                maxlength: "First name cannot exceed 255 characters."
            },
            last_name: {
                required: "Last name is required.",
                maxlength: "Last name cannot exceed 255 characters."
            },
            company_id: {
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
    // SWEETALERT DELETE
    // =============================
    $(document).on('submit', '.delete-form', function (e) {
        e.preventDefault();
        let form = this;

        Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });

    // =============================
    // AUTO HIDE ALERT
    // =============================
    setTimeout(() => {
        $('.alert').fadeOut();
    }, 3000);
});
