$(document).ready(function() {
    $('#ambassador-profile').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            firstname: {
                message: 'The first name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The first name is required'
                    },
                    stringLength: {
                        min: 4,
                        max: 30,
                        message: 'The first name must be more than 4 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: 'The first name can only consist of alphabets'
                    }
                }
            },
            lastname: {
                message: 'The last name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The last name is required'
                    },
                    stringLength: {
                        min: 3,
                        max: 30,
                        message: 'The last name must be more than 3 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: 'The last name can only consist of alphabets'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The email address is not a valid'
                    }
                }
            },
            mobileno: {
                validators: {
                    notEmpty: {
                        message: 'The mobile number is required'
                    },
                    stringLength: {
                        min: 10,
                        max: 10,
                        message: 'The mobile number must be 10 digits long'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The mobile number can only consist of numbers'
                    }
                }
            }
        }
    }).on('success.form.bv', function(e) {
        e.preventDefault();
        (this).submit();
    });
});