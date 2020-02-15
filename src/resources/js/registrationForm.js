import Axios from "axios";

$("#secondForm").hide();
$("#shareForm").hide();

if (localStorage["secondForm"]) {
    $("#firstForm").hide();
    $("#secondForm").show();
}

$("#registrationForm").on("submit", function() {
    event.preventDefault();
    var form = document.querySelector("#registrationForm");
    if (formValidator(form)) {
        var data = $(this).serialize();
        var url = $(this).attr("action");
        Axios.post(url, data)
            .then(function(response) {
                if (response.data.status === "ok") {
                    localStorage["secondForm"] = true;
                    localStorage["secondUrl"] = response.data.url;
                    localStorage["userCount"] = response.data.userCount;
                    $("#addingInformationForm").attr(
                        "action",
                        response.data.url
                    );
                    document.getElementsByClassName("userCount")[0].innerText =
                        response.data.userCount;
                    document.getElementsByClassName("userCount")[1].innerText =
                        response.data.userCount;
                    $("#firstForm").hide();
                    $("#secondForm").show();
                } else {
                    form.querySelectorAll("input").forEach(function(input) {
                        if (input.name == "email")
                            printErrors(input, response.data.massege);
                    });
                }
            })
            .catch(function(error) {
                form.querySelectorAll("input").forEach(function(input) {
                    if (input.name !== "_token" && input.name !== "_method")
                        printErrors(
                            input,
                            error.response.data.errors[input.name]
                        );
                });
            });
    }
});
