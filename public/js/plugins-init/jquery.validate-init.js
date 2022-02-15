jQuery(".form-valide").validate({
    rules: {
        "first_name": {
            required: !0,
            minlength: 3
        },
        "surname": {
            required: !0,
            minlength: 3
        },
        "email": {
            required: !0,
            email: !0
        },
        "mobile_no": {
            required: !0,
            minlength: 3
        },
        "birth_date": {
            required: !0
        },
        "address": {
            required: !0,
            minlength: 3
        },
        "gender": {
            required: !0
        },
        "state": {
            required: !0
        },
        "local_gov": {
            required: !0
        },
        "marital_status": {
            required: !0
        },
        "department": {
            required: !0
        },
        "job_role": {
            required: !0
        },
        "hire_date": {
            required: !0
        },
        "employment_type": {
            required: !0
        },
        "grade_level": {
            required: !0
        }
    },
    messages: {
        "first_name": {
            required: "Enter employee first name",
            minlength: "Employee first name must consist of at least 3 characters"
        },
        "email": "Please enter a valid email address for the employee.",
        "surname": {
            required: "Enter employee surname",
            minlength: "Employee surname must consist of at least 3 characters"
        },
        "mobile_no": {
            required: "Enter employee mobile number",
            minlength: "Employee mobile number must consist of at least 11 characters"
        },
        "birth_date": {
            required: "Enter employee birth date"
        },
        "address": {
            required: "Enter employee address",
        },
        "gender": {
            required: "Select employee gender",
        },
        "state": {
            required: "Select state of origin for this employee",
        },
        "local_gov": {
            required: "Select local government area",
        },
        "marital_status": {
            required: "Select marital status",
        },
        "department": {
            required: "Select department",
        },
        "job_role": {
            required: "Select job role",
        },
        "hire_date": {
            required: "When was this employee hired?",
        },
        "employment_type": {
            required: "Choose form of employment",
        },
        "grade_level": {
            required: "Choose grade level",
        },
    },
    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("text-danger").addClass("text-danger")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("text-danger"), jQuery(e).remove()
    },
});

jQuery(".post-job").validate({
    rules: {
        "job_title": {
            required: !0,
            minlength: 3
        },
        "job_type": {
            required: !0
        },
        "location": {
            required: !0
        },
        "department": {
            required: !0
        },
        "deadline": {
            required: !0,
            minlength: 3
        },
        "job_role": {
            required: !0
        },
        "job_details": {
            required: !0,
            minlength: 3
        },
    },
    messages: {
        "job_title": {
            required: "Enter job title for this post",
            minlength: "Job title must consist of at least 3 characters"
        },
        "job_details": "Type job details like responsibility, skills, experience, etc here...",
        "job_type": {
            required: "Select job type",
            minlength: "Job type must consist of at least 3 characters"
        },
        "location": {
            required: "Select job location or state",
            minlength: "Location must consist of at least 3 characters"
        },
        "department": {
            required: "Select department",
            minlength: "Department must consist of at least 3 characters"
        },
        "job_role": {
            required: "Select job role",
            minlength: "Job role must consist of at least 3 characters"
        },
        "deadline": {
            required: "When is the closing date for application?",
            minlength: "Deadline must consist of at least 3 characters"
        },
    },

    ignore: [],
    errorClass: "invalid-feedback animated fadeInUp",
    errorElement: "div",
    errorPlacement: function(e, a) {
        jQuery(a).parents(".form-group").append(e)
    },
    highlight: function(e) {
        jQuery(e).closest(".form-group").removeClass("text-danger").addClass("text-danger")
    },
    success: function(e) {
        jQuery(e).closest(".form-group").removeClass("text-danger"), jQuery(e).remove()
    },
});


