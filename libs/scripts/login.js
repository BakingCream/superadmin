
const Login = (() => {
    const thisLogin = {};

    thisLogin.login = () => {
        var username = $("#username").val();
        var password = $("#password").val();

        if (username == "" || password == "") {
            swal.fire({
                title: "Error!",
                text: "Please enter username and password",
                icon: "error",
                confirmButtonText: "OK",
            });
            return;
        }

        $.ajax({
            type: "POST",
            url: "data/controller/LoginController.php?action=login",
            data: {
                username: username,
                password: password,
            },
            dataType: "json",
            success: function (data) {
                if (data['status'] == "success") {
                    window.location.href = "dashboard.php";
                } else {
                    swal.fire({
                        title: "Error!",
                        text: data['message'],
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                }
            },
            error: function (data) {
                swal.fire({
                    title: "Error!",
                    text: "Something went wrong",
                    icon: "error",
                    confirmButtonText: "OK",
                });
            }
        })
    };

    thisLogin.logout = () => {
        swal.fire({
            title: "Are you sure?",
            text: "You will be logged out of the system.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, log me out",
            cancelButtonText: "No, cancel",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "data/controller/LoginController.php?action=logout",
                    dataType: "json",
                    success: function (data) {
                        window.location.href = "index.php";
                    },
                    error: function (data) {
                    }
                });
            }
        });
    };

    return thisLogin;
})();
