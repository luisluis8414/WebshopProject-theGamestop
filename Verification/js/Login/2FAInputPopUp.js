function FaInput(email) {
  Swal.fire({
    title: 'Enter Code',
    html: '<input type="number" id="codeInput" class="swal2-input" placeholder="Enter code">',
    showCancelButton: true,
    showCloseButton: true,
    focusConfirm: false,
    preConfirm: () => {
      const code = $('#codeInput').val();

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
                  FaInput(email);
                }
              });
            }
            
            
          },
          error: function (error) {
            Swal.fire('Error', 'An error occurred!', error);
          }
        });
      })
    }
  });
}