$(function() {
    $('#form-create').validate({
        rules : {
            title : {
                required : true,
                minlength : 4
            },
            body : {
                required : true,
                minlength : 8
            }
        },
        messages : {
            title : {
                required : "Tiêu đề không được để trống",
                minlength : "Tiêu đề phải ít nhất 4 ký tự"
            },
            body : {
                required : "Nội dung không được để trống",
                minlength : "Nội dung phải ít nhất 4 ký tự"
            }
        },
        submitHandler : function (form) {
            form.submit();
        }

    });
})