function PasswordPopUp(){
    var email = $('#email').val();
    Swal.fire({
        title: 'Set New Password',
        html:
            '<small style="color: green">Please set a new Password as this is your first Login &#128513;</small>'+
            '<input id="password" type="password" placeholder="New Password" class="swal2-input">' +
            '<input id="confirmPassword" type="password" placeholder="Confirm Password" class="swal2-input">',
        showCancelButton: true,
        confirmButtonText: 'Submit',
        showLoaderOnConfirm: true,
        preConfirm: () => {
          const password = document.getElementById('password').value;
          const confirmPassword = document.getElementById('confirmPassword').value;
      
 
          if (!password || !confirmPassword) {
            Swal.showValidationMessage('Please enter both passwords.');
          } else if (password !== confirmPassword) {
            Swal.showValidationMessage('Passwords do not match.');
          } else {
      
            return fetch('../../php/Login/setNewPassword.php', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
              },
              body: new URLSearchParams({
                email: email,
                password: password
              })
            })
            .then(response => {
              if (!response.ok) {
                throw new Error(response.statusText);
              }
              return response.json();
            })
            .catch(error => {
              Swal.showValidationMessage(`Request failed: ${error}`);
            });
          }
        },
        allowOutsideClick: () => !Swal.isLoading()
      }).then(result => {
        if (result.isConfirmed) {
          Swal.fire({
            title: 'Success',
            text: 'Password set successfully!',
            icon: 'success'
          });
        }
      });
      
}