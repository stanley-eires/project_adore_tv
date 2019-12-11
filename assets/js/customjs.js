class UIManager {

    static showAlert(kind, type, title, text) {
        if (kind === 'swal') {
            swal(title, text, type);
        } else {
            if (type == 'success') {
                toastr.success(text, title, { "progressBar": true, "timeOut": 15000, "closeButton": true });
            }
            if (type == 'warning') {
                toastr.warning(text, title, { "progressBar": true, "timeOut": 15000, "closeButton": true });
            }
            if (type == 'error') {
                toastr.error(text, title, { "progressBar": true, "timeOut": 15000, "closeButton": true });
            }

        }

    }
    static removeLoader() {
        //document.querySelector('.overlay').classList.replace('d-flex', 'd-none');
        document.querySelector('.overlay').classList.remove('d-flex');
        document.querySelector('.overlay').classList.add('d-none');
    }
    static showLoader() {
        //document.querySelector('.overlay').classList.replace('d-none', 'd-flex');
        document.querySelector('.overlay').classList.remove('d-none');
        document.querySelector('.overlay').classList.add('d-flex');
    }
}