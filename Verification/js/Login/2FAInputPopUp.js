function FaInput(email) {
  document.addEventListener('keyup', (event) => {
    const modal = Swal.getPopup();
    const submitButton = modal?.querySelector('button.swal2-confirm');

    if (event.key === 'Enter' && modal && submitButton && modal.contains(event.target)) {
      event.preventDefault();
      submitButton.click();
    }
  });

  Swal.fire({
    title: 'Enter Your 2 FA Code',
    html: '<input type="text" id="codeInput" class="swal2-input" placeholder="Enter code">',
    showCancelButton: true,
    showCloseButton: true,
    focusConfirm: false,
    preConfirm: () => {
      const code = $('#codeInput').val();

      // Error checking
      if (!/^\d+$/.test(code)) {
        Swal.showValidationMessage('Code must contain only numbers.');
        return false;
      }
      if (code.length !== 6) {
        Swal.showValidationMessage('Code must be exactly 6 digits long. Yours is ' + code.length + ' long');
        return false;
      }

      $(document).ready(function () {
        $.ajax({
          url: '../../php/Login/2factor/getCode.php',
          type: 'POST',
          data: {
            email: email,
            code: code
          },
          success: function (response) {
            console.log(response)
            if (response.email == 'success') {
              Swal.fire('Success', 'Code matched!', 'success').then((result) => {
                if (result.isConfirmed) {
                  logIn(email);
                }
              });
            } else {
              Swal.fire('Error', 'Invalid code!', 'error').then((result) => {
                if (result.isConfirmed) {
                  setTimeout(function() {
                    FaInput(email);
                  }, 100); 
                }
              });
            }
          },
          error: function (error) {
            Swal.fire('Error', 'An error occurred!', error);
          }
        });
      });
    }
  });
}
