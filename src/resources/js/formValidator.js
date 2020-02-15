function formValidator(form) {
    var errors = {};
    form.querySelectorAll("input, textarea").forEach(function(input) {
        var error = searchErrors(input.name, input.value);
        if (
            error !== null &&
            (input.name !== "_token" && input.name !== "_method")
        ) {
            errors[input.name] = error;
        }
    });
    showErrors(form, errors);
    if (!Object.keys(errors).length) {
        return true;
    } else {
        return false;
    }
}

global.formValidator = formValidator;

function searchErrors(name, value) {
    switch (name) {
        case "firstname":
            return validateName(value);
        case "lastname":
            return validateName(value);
        case "birthdate":
            return validateDate(value);
        case "report_subject":
            return validateReport(value);
        case "country":
            return validateCountry(value);
        case "phone":
            return validatePhone(value);
        case "email":
            return validateEmail(value);
        case "company":
            return validateSecondForm(value);
        case "position":
            return validateSecondForm(value);
        case "about_me":
            return validateAboutMe(value);
        case "photo":
            return null;
    }
}

function showErrors(form, errors) {
    form.querySelectorAll("input, textarea").forEach(function(input) {
        if (input.name !== "_token" && input.name !== "_method") {
            printErrors(input, errors[input.name]);
        }
    });
}

function printErrors(input, errors) {
    var parent = searchParent(input, "form-group");
    var message = parent.querySelector(".error");
    input.classList.remove("is-invalid");
    input.classList.remove("is-valid");
    if (errors != null) {
        input.classList.add("is-invalid");
        message.innerText = errors;
    } else {
        input.classList.add("is-valid");
        message.innerText = null;
    }
}

global.printErrors = printErrors;

function searchParent(input, className) {
    var parent = input.parentNode;
    if (parent.classList.value == className) {
        return parent;
    } else {
        return searchParent(parent, className);
    }
}

function validateName(value) {
    if (value === "") {
        return "The field must not be empty!";
    } else if (value.length < 2 || value.length > 30) {
        return "At least 2 and no more than 30 characters!";
    } else if (/^\s/.test(value)) {
        return "The word should not begin with a space!";
    } else if (/\s{2}/.test(value)) {
        return "You cannot use two spaces!";
    } else if (/[0-9]/.test(value)) {
        return "Do not use numbers!";
    } else if (/[!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~]/.test(value)) {
        return "You cannot use punctuation marks!";
    } else {
        return null;
    }
}

function validateDate(value) {
    if (value === "") {
        return "The field must not be empty!";
    } else {
        return null;
    }
}

function validateReport(value) {
    if (value === "") {
        return "The field must not be empty!";
    } else if (value.length < 2 || value.length > 30) {
        return "At least 2 and no more than 30 characters!";
    } else {
        return null;
    }
}

function validateCountry(value) {
    if (value === "") {
        return "The field must not be empty!";
    } else {
        return null;
    }
}

function validatePhone(value) {
    if (value === "") {
        return "The field must not be empty!";
    } else if (value.length < 11 || value.length > 13) {
        return "Wrong phone number!";
    } else {
        return null;
    }
}

function validateEmail(value) {
    if (value === "") {
        return "The field must not be empty!";
    } else if (
        !/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
            value
        )
    ) {
        return "Wrong mail!";
    } else {
        return null;
    }
}

function validateSecondForm(value) {
    if (value === "") {
        return null;
    } else if (value.length < 2 || value.length > 30) {
        return "At least 2 and no more than 30 characters!";
    } else {
        return null;
    }
}

function validateAboutMe(value) {
    if (value === "") {
        return null;
    } else if (value.length < 2 || value.length > 255) {
        return "At least 2 and no more than 255 characters!";
    } else {
        return null;
    }
}
