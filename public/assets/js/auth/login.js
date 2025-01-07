document.addEventListener("DOMContentLoaded", function () {
    let btnLogin = document.querySelector("#btnLogin");
    let form = document.querySelector("#formLogin");
    let formElements = document.querySelectorAll("#formLogin input");
    let validation = {
        rules: {
            email: {
                required: true,
                minlength: 3,
                maxlength: 125,
                email: true,
            },
            password: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "E-Posta alanı zorunludur",
                minlength: "E-Posta alanı en az 3 karakter olmalıdır",
                maxlength: "E-Posta alanı en fazla 125 karakter olmalıdır",
                email: "Geçerli bir E-Posta adresi giriniz",
            },
            password: {
                required: "Şifre alanı zorunludur",
            },
        },
    };
    let validationRules = validation.rules;
    let validationMessages = validation.messages;
    let fail = false;
    btnLogin.addEventListener("click", function (e) {
        ruleName: for (const rule in validationRules) {
            // let element = $('[name="' + rule + '"]');
            let element = document.querySelector('[name="' + rule + '"]');
            if (element) {
                let elementValue = element.value.trim();
                for (const fieldKey in validationRules[rule]) {
                    let fieldValue = validationRules[rule][fieldKey];
                    if (
                        (fieldKey === "required" && elementValue.length < 1) ||
                        (fieldKey === "minlength" &&
                            elementValue.length < fieldValue) ||
                        (fieldKey === "maxlength" &&
                            elementValue.length > fieldValue) ||
                        (fieldKey === "email" &&
                            elementValue &&
                            !validateEmail(elementValue))
                    ) {
                        toastr.options = {
                            closeButton: true,
                            debug: false,
                            newestOnTop: false,
                            progressBar: true,
                            positionClass: "toast-bottom-center",
                            preventDuplicates: false,
                            onclick: null,
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                        };
                        toastr["error"](validationMessages[rule][fieldKey]);
                        fail = true;
                        break ruleName;
                    } else {
                        fail = false;
                    }
                }
            }
        }
        if (!fail) {
            form.submit();
        }
    });
});
function validateEmail(email) {
    let regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return regex.test(email);
}
function validatePassword(password) {
    let regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,20}$/;
    return regex.test(password);
}
