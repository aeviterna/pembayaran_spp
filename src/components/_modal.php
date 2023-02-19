<!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->
<script src="/pwpb/pembayaran_spp/vendor/sweetalert2.js"></script>

<script lang="js">
    function confirmModal(type, value, hidden = null) {
        if (hidden != null) document.getElementById(hidden).style.display = "none";
        Swal.fire({
            title: "Apakah anda yakin?",
            icon: "question",
            iconColor: localStorage.colorThemeType === "light" ? "#545454" : "#ffffff",
            focusConfirm: false,
            showCancelButton: true,
            confirmButtonText: "Iya",
            cancelButtonText: "Tidak",
            confirmButtonColor: "#48c774",
            cancelButtonColor: "#F14668"
        }).then((result) => {
            if (result.isConfirmed) {
                if (type === "location") {
                    Swal.fire({
                        title: "Mohon tunggu",
                        html: "Sedang melakukan redireksi",
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    window.location = value;
                } else if (type === "form") {
                    Swal.fire({
                        title: "Mohon tunggu",
                        html: "Sedang memproses data",
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    value.submit();
                } else if (type === "action") {
                    value();
                }
            }
            if (hidden != null) {
                setTimeout(() => {
                    document.getElementById(hidden).style.display = "block";
                }, 250);
            }
        });
        return false;
    }

    function errorModal(text, path, hidden = null) {
        if (hidden != null) document.getElementById(hidden).style.display = "none";
        Swal.fire({
            title: "Gagal",
            text: text,
            icon: "error",
            width: "525px",
            focusConfirm: false,
            showConfirmButton: false,
            showCloseButton: true
        }).then(() => {
            if (path != null) {
                Swal.fire({
                    title: "Mohon tunggu",
                    html: "Sedang melakukan redireksi",
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                window.location = path;
            }
            if (hidden != null) {
                setTimeout(() => {
                    document.getElementById(hidden).style.display = "block";
                }, 250);
            }
        });
    }

    function successModal(text, path, hidden = null, replacePath) {
        if (hidden != null) document.getElementById(hidden).style.display = "none";
        Swal.fire({
            title: "Berhasil",
            text: text,
            icon: "success",
            width: "525px",
            focusConfirm: false,
            showConfirmButton: false,
            showCloseButton: true
        }).then(() => {
            if (path != null) {
                Swal.fire({
                    title: "Mohon tunggu",
                    html: "Sedang melakukan redireksi",
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                window.location = path;
            }

            if (replacePath != null) {
                Swal.fire({
                    title: "Mohon tunggu",
                    html: "Sedang melakukan redireksi",
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                window.location.replace(replacePath);
            }

            if (hidden != null) {
                setTimeout(() => {
                    document.getElementById(hidden).style.display = "block";
                }, 250);
            }
        });
    }
</script>
