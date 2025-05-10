// custom js

function copyToClipboard() {
    const linkInput = document.getElementById('shareLink');
    navigator.clipboard.writeText(linkInput.value)
        .then(() => {
            alert('Link berhasil disalin ke clipboard!');
        })
        .catch(err => {
            alert('Gagal menyalin link: ' + err);
        });
}