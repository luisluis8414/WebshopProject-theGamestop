function showImage(imagePath, name) {
    Swal.fire({
      title: name,
      html: `<img src="${imagePath}" alt="${name}" class="ItemImages">`,
      width: '40%',
      imageWidth: '100%',
      imageHeight: 'auto',
      imageAlt: name,
      showConfirmButton: true,
    });
  }
  