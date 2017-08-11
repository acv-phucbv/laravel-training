$(function() {
    $('#form-create').validate({
        rules : {
            username : {
                required : true,
                minlength : 4
            },
            email : {
                required : true,
                email : true,
                remote : 'users/checkemail'
            },
            password : {
                required : true,
                min : 6
            },
            role : {
                required : true
            },
            firstname : {
                required : true
            },
            lastname : {
                required : true
            }
        },
        messages : {
            username : {
                required : "Username không được để trống",
                minlength : "Username phải ít nhất 4 ký tự"
            },
            email : {
                required : "Email không được để trống",
                minlength : "Email không đúng định dạng"
            },
            password : {
                required : "Password không được để trống",
                minlength : "Password phải ít nhất 6 ký tự"
            },
            role : {
                required : "Vui lòng chọn quyền user"
            },
            firstname : {
                required : "Firstname không được để trống"
            },
            lastname : {
                required : "Lastname không được để trống"
            }
        },
        submitHandler : function (form) {
            form.submit();
        }

    });
})