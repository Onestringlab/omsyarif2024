function copyToClipboard(button, salam) {
    // Pastikan button tidak undefined
    if (!button) {
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Tombol tidak ditemukan!',
        });
        console.error('Button is undefined');
        return;
    }
     // Jika salam adalah "Pengguna tidak terdaftar", tampilkan popup khusus
    if (salam === 'Pengguna tidak terdaftar') {
        Swal.fire({
            icon: 'warning',
            title: 'Pengguna tidak terdaftar',
            text: 'NIP ini belum terdaftar sebagai pengguna.',
        });
        return;
    }

    // Cari input sebelum tombol (shareLink)
    const linkInput = button.previousElementSibling;
    if (linkInput && linkInput.classList.contains('shareLink')) {
        navigator.clipboard.writeText(salam + linkInput.value)
            .then(() => {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Link telah disalin ke clipboard.',
                    timer: 1500,
                    showConfirmButton: false
                });
            })
            .catch(err => {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Gagal menyalin link: ' + err,
                });
                console.error('Clipboard error:', err);
            });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Input link tidak ditemukan!',
        });
        console.error('Previous sibling is not a .shareLink input:', linkInput);
    }
}