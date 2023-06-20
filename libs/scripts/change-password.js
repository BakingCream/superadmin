$(document).ready(function () {

    $("#oldPassword").on('change', function (){
        $.ajax({
            type: "POST",
            url: "data/controller/UserController.php?action=checkOldPassword",
            data: {
                oldPassword: $(this).val(),
                adminId: adminId,
            },
            dataType: "json",
            success: function (data) {
                if(!data) {
                    swal.fire({
                        title: "Error!",
                        text: "Old password is incorrect",
                        icon: "error",
                        confirmButtonText: "OK",
                    }).then((result) => {
                        $("#oldPassword").val("");
                        $("#oldPassword").focus();
                        $("#oldPassword").addClass("is-invalid");
                        return false;
                    });
                }
            },
            error: function (data) {
                console.log(data);
            }
        });

        if($(this).val() == $("#newPassword").val()) {
            swal.fire({
                title: "Error!",
                text: "New password must be different from old password",
                icon: "error",
                confirmButtonText: "OK",
            }).then((result) => {
                $("#newPassword").val("");
                $("#newPassword").focus();
            });
        }

        $("#oldPassword").removeClass("is-invalid");
        $("#oldPassword").addClass("is-valid");
    });

    $("#newPassword").on('change', function (){
        if($(this).val().length < 8) {
            swal.fire({
                title: "Error!",
                text: "Password must be at least 8 characters",
                icon: "error",
                confirmButtonText: "OK",
            });
            $("#newPassword").addClass("is-invalid");
            return false;
        } 
        // Check if password contains at least one number
        else if(!/\d/.test($(this).val())) {
            swal.fire({
                title: "Error!",
                text: "Password must contain at least one number",
                icon: "error",
                confirmButtonText: "OK",
            });
            $("#newPassword").addClass("is-invalid");
            return false;
        }
        // Check if password contains at least one lowercase letter
        else if(!/[a-z]/.test($(this).val())) {
            swal.fire({
                title: "Error!",
                text: "Password must contain at least one lowercase letter",
                icon: "error",
                confirmButtonText: "OK",
            });
            $("#newPassword").addClass("is-invalid");
            return false;
        }
        // Check if password contains at least one uppercase letter
        else if(!/[A-Z]/.test($(this).val())) {
            swal.fire({
                title: "Error!",
                text: "Password must contain at least one uppercase letter",
                icon: "error",
                confirmButtonText: "OK",
            });
            $("#newPassword").addClass("is-invalid");
            return false;
        }
        // Check if password contains at least one special character
        else if(!/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test($(this).val())) {
            swal.fire({
                title: "Error!",
                text: "Password must contain at least one special character",
                icon: "error",
                confirmButtonText: "OK",
            });
            $("#newPassword").addClass("is-invalid");
            return false;
        }
        else if ($(this).val() == $("#oldPassword").val()) {
            swal.fire({
                title: "Error!",
                text: "New password must be different from old password",
                icon: "error",
                confirmButtonText: "OK",
            }).then((result) => {
                $("#newPassword").val("");
                $("#newPassword").focus();
            });
            $("#newPassword").addClass("is-invalid");
            return false;
        }
        if($("#confirmPassword").val() != "") {
            if($(this).val() != $("#confirmPassword").val()) {
                swal.fire({
                    title: "Error!",
                    text: "Confirm password must match with new password",
                    icon: "error",
                    confirmButtonText: "OK",
                });
                $("#newPassword").addClass("is-invalid");
                return false;
            }
        }
        $("#newPassword").removeClass("is-invalid");
        $("#newPassword").addClass("is-valid");
    });

    $("#confirmPassword").on('change', function (){
        if($(this).val() != $("#newPassword").val()) {
            swal.fire({
                title: "Error!",
                text: "Confirm password must match with new password",
                icon: "error",
                confirmButtonText: "OK",
            });
            $("#confirmPassword").addClass("is-invalid");
            return false;
        }
        $("#confirmPassword").removeClass("is-invalid");
        $("#confirmPassword").addClass("is-valid");
    });


});

const ChangePassword = (() => {
    const thisChangePassword = {};

    thisChangePassword.changePassword = () => {
        var oldPassword = $('#oldPassword').val();
        var newPassword = $('#newPassword').val();
        var confirmPassword = $('#confirmPassword').val();
        if(oldPassword == "" || newPassword == "" || confirmPassword == ""){
            swal.fire({
                title: "Error!",
                text: "Please fill all the fields",
                type: "error",
                confirmButtonText: "OK"
            });

            return false;
        }

        if($("#newPassword").hasClass("is-invalid") || $("#confirmPassword").hasClass("is-invalid") || $("#oldPassword").hasClass("is-invalid")) 
        {
            swal.fire({
                title: "Error!",
                text: "Please fill all the fields correctly",
                type: "error",
                confirmButtonText: "OK"
            });

            return false;
        }


        $.ajax({
            type: "POST",
            url: "data/controller/UserController.php?action=changePassword",
            data: {
                newPassword: newPassword,
                adminId: adminId,
            },
            dataType: "json",
            success: function (data) {
                console.log(data)
                swal.fire({
                    title: "Success!",
                    text: "Password changed successfully",
                    icon: "success",
                    confirmButtonText: "OK",
                }).then((result) => {
                    window.location.href = "index.php";
                });
            }
        });

    };

    return thisChangePassword;
})();
