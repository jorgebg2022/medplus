

function previewPhoto()
{
    let photoPreview = window.document.querySelector('.photo');
    let photoUploadInput = window.document.querySelector("input[type='file']");
    let photoUpload = photoUploadInput.files[0];
    const reader = new FileReader();
    reader.onload = () => {
        photoPreview.src = reader.result;
    }
    if(photoUpload){
        reader.readAsDataURL(photoUpload);
    } else {
        photoPreview.src = "";
    } 
}

function uploadPhoto()
{
    window.document.querySelector("input[type='file']").click();
}