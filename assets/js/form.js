 
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

function fMasc(objeto, mask) 
{
    obj=objeto;
    masc=mask;
    setTimeout("fMascEx()",1);
}

function fMascEx() 
{
    obj.value=masc(obj.value);
}

function mCPF(cpf)
{
    cpf=cpf.replace(/\D/g,"");
    cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2");
    cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2");
    cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2");
    return cpf
}

function mRG(rg)
{
    rg = rg.replace(/(?!X)\D/g, "");
    rg = rg.replace(/^[0-9]{2,3}\.?[0-9]{2,3}\.?[0-9]{3}\-?[A-Za-z0-9]{1}$/, "$1.$2.$3-$4");
    return rg;
}

function mPhone(phone)
{
    phone = phone.replace(/\D+/g, "");
    phone = phone.replace(/(\d{2})(\d)/, "($1) $2");
    phone = phone.replace(/(\d{4})(\d)/, "$1-$2");
    phone = phone.replace(/(\d{4})-(\d)(\d{4})/, "$1$2-$3");
    phone = phone.replace(/(-\d{4})\d+?$/, "$1");
    return phone;
}   
   
function mCEP(cep)
{
    cep = cep.replace(/\D+/g, "");
    cep = cep.replace(/(\d{5})(\d)/, "$1-$2");
    cep = cep.replace(/(-\d{3})\d+?$/, "$1");
    return cep;
}
