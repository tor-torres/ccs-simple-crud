function validateForm() {
    var imageInput = document.getElementById('image');
    var titleInput = document.getElementById('title');
    var descInput = document.getElementById('desc');
  
    var imageError = document.getElementById('imageError');
    var titleError = document.getElementById('titleError');
    var descError = document.getElementById('descError');
  
    // Reset previous error messages
    imageError.textContent = '';
    titleError.textContent = '';
    descError.textContent = '';
  
    // Validate image
    var imageFile = imageInput.files[0];
  
    if (!imageFile) {
      imageError.textContent = 'Please select an image.';
      return false;
    }
  
    var fileSize = imageFile.size; // in bytes
    var maxSize = 1048576; // 1MB
  
    if (fileSize > maxSize) {
      imageError.textContent = 'Image size too large. Please select a file less than 1MB.';
      return false;
    }
  
    var validExtensions = ['jpg', 'jpeg', 'png'];
    var fileName = imageFile.name;
    var fileExtension = fileName.split('.').pop().toLowerCase();
  
    if (!validExtensions.includes(fileExtension)) {
      imageError.textContent = 'Invalid image file type. Only JPEG, JPG, and PNG files are allowed.';
      return false;
    }
  
    // Validate title
    if (titleInput.value.trim() === '') {
      titleError.textContent = 'Please enter a title.';
      return false;
    }
  
    // Validate description
    if (descInput.value.trim() === '') {
      descError.textContent = 'Please enter a description.';
      return false;
    }
  
    return true;
  }
  