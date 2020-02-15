import Axios from "axios";

if (localStorage["secondForm"]) {
    $("#addingInformationForm").attr("action", localStorage["secondUrl"]);
    document.getElementsByClassName("userCount")[0].innerText =
        localStorage["userCount"];
    document.getElementsByClassName("userCount")[1].innerText =
        localStorage["userCount"];
}

$("#inputPhoto").on("change", function() {
    if ($("#inputPhoto")[0].files[0].name.length >= 25) {
        $(".custom-file-label").text(
            $("#inputPhoto")[0].files[0].name.substr(0, 25) + "..."
        );
    } else {
        $(".custom-file-label").text($("#inputPhoto")[0].files[0].name);
    }
    $("#delete").css("display", "block");
});

$("#delete").on("click", function() {
    $(".custom-file-label").text("Choose file");
    $("#inputPhoto")[0].value = "";
    $("#delete").css("display", "none");
});

$("#addingInformationForm").on("submit", function() {
    event.preventDefault();
    var form = document.querySelector("#addingInformationForm");
    if (formValidator(form)) {
        var data = new FormData(
            document.querySelector("#addingInformationForm")
        );
        if (document.getElementById("inputPhoto").files[0])
            data.append(
                "photo",
                document.getElementById("inputPhoto").files[0]
            );
        var url = $("#addingInformationForm").attr("action");
        var settings = {
            headers: {
                "Content-Type": "multipart/form-data"
            }
        };
        Axios.post(url, data, settings)
            .then(function(response) {
                $("#secondForm").hide();
                $("#shareForm").show();
                localStorage.clear();
            })
            .catch(function(error) {
                form.querySelectorAll("input, textarea").forEach(function(
                    input
                ) {
                    if (input.name !== "_token" && input.name !== "_method")
                        printErrors(
                            input,
                            error.response.data.errors[input.name]
                        );
                });
            });
    }
});
