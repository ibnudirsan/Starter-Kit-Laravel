function previewImage() {
    const file = document.querySelector('#file');
    const imgPreview = document.querySelector('#img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(file.files[0]);

    oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
        imgPreview.classList.remove('img-fluid');
    }
}