function loadImage(e, el) {
    const reader = new FileReader();
    reader.onload = function (e) {
        document.getElementById(el).src = e.target.result;
    }
    reader.readAsDataURL(e.target.files[0]);
}