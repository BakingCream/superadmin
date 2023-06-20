$(document).ready(function () {
    Dashboard.loadAdminTable();

    $("#addButton").click(function () {
        $("#addAdminModal").modal("show");
    });
});

const Dashboard = (() => {
    const thisDashboard = {};

    thisDashboard.loadAdminTable = () => {
        $.ajax({
            type: "POST",
            url: "data/controller/DashboardController.php?action=loadAdminTable",
            dataType: "json",
            success: function (response) {
                $(".table").DataTable().destroy();
                $("#adminTable").html(response);
                $(".table").DataTable();
            },
            error: function (response) {
                console.log(response);
            }
        });
    };

    thisDashboard.addAdmin = () => {
        var firstName = $("#firstName").val();
        var lastName = $("#lastName").val();
        var emailAddress = $("#emailAddress").val();
        var department = $("#department").val();
        var password = generateRandomPassword();

        alert(password)

        if(firstName == "" || lastName == "" || emailAddress == "" || department == null) {
            swal.fire({
                title: "Error!",
                text: "Please fill out all fields.",
                icon: "error",
                confirmButtonText: "OK"
            });
            return;
        }

        $.ajax({
            type: "POST",
            url: "data/controller/DashboardController.php?action=addAdmin",
            data: {
                firstName: firstName,
                lastName: lastName,
                emailAddress: emailAddress,
                department: department,
                password: password
            },
            dataType: "json",
            success: function (response) {
                if(response) {
                    swal.fire({
                        title: "Success!",
                        text: "Admin successfully added.",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        window.location.reload();
                    });
                }
            },
            error: function (response) {
                swal.fire({
                    title: "Error!",
                    text: response,
                    icon: "error",
                    confirmButtonText: "OK"
                });       
            }
        })
    };

    return thisDashboard;
})();