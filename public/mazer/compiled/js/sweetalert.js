window.addEventListener("load", function () {
    if (window.flash) {

        if (window.flash.success) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: window.flash.success,
                timer: 2000,
                showConfirmButton: false
            });
        }

        if (window.flash.error) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: window.flash.error
            });
        }

    }
});
