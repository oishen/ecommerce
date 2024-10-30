

function previewImage1() {
    const newImageInput1 = document.getElementById('real_file');
    const imagePreview1 = document.getElementById('image-preview');
    const imageExist1 = document.getElementById('uploadFile');

    const newImageFile1 = newImageInput1.files[0];

    if (newImageFile1) {
        const reader1 = new FileReader();
        reader1.onload = function (e) {
            imageExist1.src = e.target.result;
            imageExist1.style.display = 'block';
            imageExist1.style.width = '96%';
        };
        reader1.readAsDataURL(newImageFile1);
    } else {
        imagePreview1.style.display = 'none';
    }
}

function submitForm1() {
    // Get the selected new image file
    const newImageInput1 = document.getElementById('real_file');
    const newImageFile1 = newImageInput1.files[0];

    // You can now use AJAX or any form submission method to send the new image file to the server for processing.
    // The server-side code will handle the upload, processing, and saving of the new image.

    // For simplicity, this example only logs the selected file's name to the console.
    console.log('Selected new image file:', newImageFile1 ? newImageFile1.name : 'No file selected');
}