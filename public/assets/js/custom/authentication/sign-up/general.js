"use strict";

var KTSignupGeneral = function() {
    var e, t, r, a, s = function() {
        return a.getScore() > 50;
    };
    
    return {
        init: function() {
            e = document.querySelector("#kt_sign_up_form");
            t = document.querySelector("#kt_sign_up_submit");
            a = KTPasswordMeter.getInstance(e.querySelector('[data-kt-password-meter="true"]'));
            
            // Vérifier si le formulaire a une action valide
            if (!function(e) {
                try {
                    return new URL(e), !0;
                } catch (e) {
                    return !1;
                }
            }(t.closest("form").getAttribute("action"))) {
                
                // Configuration de validation pour le formulaire sans action
                r = FormValidation.formValidation(e, {
                    fields: {
                        name: {
                            validators: {
                                notEmpty: {
                                    message: "Le nom est obligatoire"
                                }
                            }
                        },
                        email: {
                            validators: {
                                regexp: {
                                    regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                    message: "L'email n'est pas valide"
                                },
                                notEmpty: {
                                    message: "L'email est obligatoire"
                                }
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: "Le mot de passe est obligatoire"
                                },
                                callback: {
                                    message: "Veuillez entrer un mot de passe valide",
                                    callback: function(e) {
                                        if (e.value.length > 0) return s();
                                    }
                                }
                            }
                        },
                        password_confirmation: {
                            validators: {
                                notEmpty: {
                                    message: "La confirmation du mot de passe est obligatoire"
                                },
                                identical: {
                                    compare: function() {
                                        return e.querySelector('[name="password"]').value;
                                    },
                                    message: "Le mot de passe et sa confirmation ne correspondent pas"
                                }
                            }
                        },
                        toc: {
                            validators: {
                                notEmpty: {
                                    message: "Vous devez accepter les conditions d'utilisation"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger({
                            event: {
                                password: !1
                            }
                        }),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                });
                
                // Gestionnaire d'événement pour le bouton de soumission
                t.addEventListener("click", function(a) {
                    a.preventDefault();
                    r.revalidateField("password");
                    r.validate().then(function(r) {
                        if (r == "Valid") {
                            t.setAttribute("data-kt-indicator", "on");
                            t.disabled = !0;
                            
                            // Envoyer le formulaire via AJAX
                            axios.post(t.closest("form").getAttribute("action"), new FormData(e))
                                .then(function(t) {
                                    if (t) {
                                        e.reset();
                                        const t = e.getAttribute("data-kt-redirect-url");
                                        if (t) {
                                            location.href = t;
                                        }
                                    } else {
                                        Swal.fire({
                                            text: "Désolé, il semble qu'il y ait des erreurs détectées, veuillez réessayer.",
                                            icon: "error",
                                            buttonsStyling: !1,
                                            confirmButtonText: "OK, j'ai compris !",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        });
                                    }
                                })
                                .catch(function(e) {
                                    Swal.fire({
                                        text: "Désolé, il semble qu'il y ait des erreurs détectées, veuillez réessayer.",
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "OK, j'ai compris !",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    });
                                })
                                .then(function() {
                                    t.removeAttribute("data-kt-indicator");
                                    t.disabled = !1;
                                });
                        } else {
                            Swal.fire({
                                text: "Désolé, il semble qu'il y ait des erreurs détectées, veuillez réessayer.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "OK, j'ai compris !",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }
                    });
                });
                
                // Gestionnaire d'événement pour le champ mot de passe
                e.querySelector('input[name="password"]').addEventListener("input", function() {
                    if (this.value.length > 0) {
                        r.updateFieldStatus("password", "NotValidated");
                    }
                });
            }
        }
    };
}();

// Initialiser quand le DOM est chargé
KTUtil.onDOMContentLoaded(function() {
    KTSignupGeneral.init();
});