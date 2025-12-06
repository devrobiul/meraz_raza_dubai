// 🛡️ Global CSRF Token setup (Laravel)
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

// 🎯 Show Modal (via AJAX)
$(document).on("click", ".show-modal", function () {
    let url = $(this).data("url");

    $.ajax({
        url: url,
        dataType: "html",
        success: function (response) {
            // কোনো modal খোলা থাকলে সেটি বন্ধ করো
            $(".modal.show").modal("hide");

            // নতুন modal content বসাও এবং দেখাও
            $(".view-modal").html(response);

            const modalEl = document.querySelector(".view-modal");
            if (modalEl) {
                const modal = new bootstrap.Modal(modalEl);
                modal.show();
            }
        },
        error: function () {
            Swal.fire({
                icon: "error",
                title: "Error!",
                text: "Modal content load করতে ব্যর্থ হয়েছে।",
            });
        },
    });
});

// 📤 Generic AJAX Form Submit
$(document).on("submit", ".submit", function (e) {
    e.preventDefault();

    let url = $(this).attr("action");
    let form = $(this);
    let data = $(this).fieldSerialize();

    $(".submit-button").attr("disabled", true);
    $(".save-button").addClass("d-none");
    $(".loading-button").removeClass("d-none");

    let options = {
        url: url,
        data: data,
        dataType: "json",
        success: function (response) {
            $(".submit-button").attr("disabled", false);
            $(".save-button").removeClass("d-none");
            $(".loading-button").addClass("d-none");

            if (typeof datatable !== "undefined") {
                datatable.ajax.reload();
            }
            get_alert(response);
        },
        error: function () {
            $(".submit-button").attr("disabled", false);
            $(".save-button").removeClass("d-none");
            $(".loading-button").addClass("d-none");
        },
    };

    $(this).ajaxSubmit(options);
    $(this).resetForm();
    return false;
});

// 🔔 Toast Notification Setup
var Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 5000,
});

// 🔊 Alert function
function get_alert(response) {
    if (response.success === true) {
        Toast.fire({
            icon: "success",
            title: response.message,
        });

        // Modal hide
        $(".view-modal").modal("hide");

        // Datatable reload if available
        if (typeof datatable !== "undefined") {
            datatable.ajax.reload();
        }
    } else {
        Toast.fire({
            icon: "error",
            title: response.msg || "Something went wrong!",
        });
    }
}

// 👥 Customer Submit Form
$(".customersubmit").on("submit", function (e) {
    e.preventDefault();
    var form = this;

    $.ajax({
        method: $(form).attr("method"),
        url: $(form).attr("action"),
        data: new FormData(form),
        dataType: "json",
        contentType: false,
        processData: false,
        beforeSend: function () {
            $(form).find("span.error-text").text("");
        },
        success: function (response) {
            if (response.success) {
                get_alert(response);
                $(form)[0].reset();

                if (response.route) {
                    window.location.href = response.route;
                } else {
                    window.location.reload();
                }
            }
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                let errors = xhr.responseJSON.errors;
                $.each(errors, function (prefix, val) {
                    $(form)
                        .find("span." + prefix + "_error")
                        .text(val[0]);
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error!",
                    text: "Something went wrong.",
                });
            }
        },
    });
});
