$(document).ready(function () {

    // =============================
    // FORM VALIDATION
    // =============================
    $("#CompanyCreateForm, #CompanyEditForm").validate({
        rules: {
            name: { required: true, maxlength: 255 },
            email: { email: true, maxlength: 255 },
            website: { url: true, maxlength: 255 }
        },
        messages: {
            name: {
                required: "Company name is required.",
                maxlength: "Company name cannot exceed 255 characters."
            },
            email: {
                email: "Please enter a valid email address.",
                maxlength: "Email cannot exceed 255 characters."
            },
            website: {
                url: "Please enter a valid URL.",
                maxlength: "Website URL cannot exceed 255 characters."
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
