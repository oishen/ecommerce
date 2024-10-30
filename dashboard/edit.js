// function previewImage() {
//   const newImageInput = document.getElementById("new-image");
//   const imagePreview = document.getElementById("image-preview");
//   const imageExist = document.getElementById("existing-image");

//   const newImageFile = newImageInput.files[0];

//   if (newImageFile) {
//     const reader = new FileReader();
//     reader.onload = function (e) {
//       imageExist.src = e.target.result;
//       imageExist.style.display = "block";
//     };
//     reader.readAsDataURL(newImageFile);
//   } else {
//     // imagePreview.style.display = 'none';
//   }
// }

// function submitForm() {
//   // Get the selected new image file
//   const newImageInput = document.getElementById(
//     "new-image_<?php echo $row_delete['id']"
//   );
//   const newImageFile = newImageInput.files[0];

//   // You can now use AJAX or any form submission method to send the new image file to the server for processing.
//   // The server-side code will handle the upload, processing, and saving of the new image.

//   // For simplicity, this example only logs the selected file's name to the console.
//   console.log(
//     "Selected new image file:",
//     newImageFile ? newImageFile.name : "No file selected"
//   );
// }

function previewImage(id) {
  const newImageInput = document.getElementById(`new-image_${id}`);
  const imageExist = document.getElementById(`existing-image_${id}`);

  const newImageFile = newImageInput.files[0];

  if (newImageFile) {
    const reader = new FileReader();
    reader.onload = function (e) {
      imageExist.src = e.target.result;
      imageExist.style.display = "block";
    };
    reader.readAsDataURL(newImageFile);
  }
}

function submitForm(id) {
  // Get the selected new image file
  const newImageInput = document.getElementById(`new-image_${id}`);
  const newImageFile = newImageInput.files[0];

  // For simplicity, this example only logs the selected file's name to the console.
  console.log(
    "Selected new image file:",
    newImageFile ? newImageFile.name : "No file selected"
  );
}
