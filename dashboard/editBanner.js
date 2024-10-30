function previewImageBanner(id) {
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
