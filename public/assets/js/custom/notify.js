// *Notifications Scripts Start
// Sweet Alert Notifications:
// allowed types are: "success", "error", "warning", "info" or "question"
function notifySwal(type, title, message) {
    Swal.fire(
        title,
        message,
        type
    )
}

// Toastr Notifications:
function notifyToastr(type, message) {
    Command: toastr[type](message)

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "600",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
}
// *Notifications Scripts End
