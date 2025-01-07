document.addEventListener("DOMContentLoaded", function () {
    let btnRegister = document.querySelector("#btnRegister");
    let form = document.querySelector("#formRegister");
    let formElements = document.querySelectorAll("#formRegister input");
    let validation = {
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 125,
            },
            email: {
                required: true,
                minlength: 3,
                maxlength: 125,
                email: true,
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 20,
                password: true,
            },
            password_confirmation: {
                required: true,
                password: true,
                minlength: 6,
                maxlength: 20,
                compareElementId: "password",
            },
        },
        messages: {
            name: {
                required: "Ad Soyad alanı zorunludur",
                minlength: "Ad Soyad alanı en az 3 karakter olmalıdır",
                maxlength: "Ad Soyad alanı en fazla 125 karakter olmalıdır",
            },
            email: {
                required: "E-Posta alanı zorunludur",
                minlength: "E-Posta alanı en az 3 karakter olmalıdır",
                maxlength: "E-Posta alanı en fazla 125 karakter olmalıdır",
                email: "Geçerli bir E-Posta adresi giriniz",
            },
            password: {
                required: "Şifre alanı zorunludur",
                minlength: "Şifre alanı en az 6 karakter olmalıdır",
                maxlength: "Şifre alanı en fazla 20 karakter olmalıdır",
                password:
                    "Şifre en az bir büyük harf, bir küçük harf, bir rakam ve bir özel karakter içermelidir!",
            },
            password_confirmation: {
                required: "Şifre tekrarı alanı zorunludur",
                minlength: "Şifre tekrarı alanı en az 6 karakter olmalıdır",
                maxlength: "Şifre tekrarı alanı en fazla 20 karakter olmalıdır",
                password:
                    "Şifre tekrarı en az bir büyük harf, bir küçük harf, bir rakam ve bir özel karakter içermelidir!",
                compareElementId: "Şifre alanı ile uyuşmamaktadır!",
            },
        },
    };
    let validationRules = validation.rules;
    let validationMessages = validation.messages;
    let fail = false;
    btnRegister.addEventListener("click", function (e) {
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
                            !validateEmail(elementValue)) ||
                        (fieldKey === "password" &&
                            elementValue &&
                            !validatePassword(elementValue)) ||
                        (fieldKey === "compareElementId" &&
                            elementValue &&
                            !validatePasswordConfirmation(
                                document
                                    .querySelector("#" + fieldValue)
                                    .value.trim(),
                                elementValue
                            ))
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
function validatePasswordConfirmation(password, passwordConfirmation) {
    return passwordConfirmation === password;
}
