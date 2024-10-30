

function previewBanner() {
    const inputBannerCreate = document.getElementById('inputBannerCreate');
    const uploadBannerCreate = document.getElementById('uploadBannerCreate');

    const inputBannerCreate1 = inputBannerCreate.files[0];

    if (inputBannerCreate1) {
        const reader2 = new FileReader();
        reader2.onload = function (e) {
            uploadBannerCreate.src = e.target.result;
            uploadBannerCreate.style.display = 'block';
            uploadBannerCreate.style.width = '96%';
        };
        reader2.readAsDataURL(inputBannerCreate1);
    } 
}

