function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("foto").files[0]);

    oFReader.onload = function (oFREvent) {
        document.getElementById("preview").src = oFREvent.target.result;
    };
};