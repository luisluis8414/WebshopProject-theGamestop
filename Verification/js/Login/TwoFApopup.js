
function TwoFApopup(){
    const qrCodeUrl = '../../php/Login/2factor/generateQRCode.php'; // Replace with the correct URL for generating the QR code

          fetch(qrCodeUrl, {
            method: 'GET',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
            }
          })
            .then(response => {
              if (!response.ok) {
                throw new Error(response.statusText);
              }
              return response.json();
            })
            .then(qrCodeData => {
              const qrCodeImageUrl = qrCodeData.qrCodeImageUrl; // Replace this with the correct property name from your response JSON

              Swal.fire({
                title: '2-Factor Authentication',
                html: 'Scan the QR code below with your Google authenticator app:<br> Don`t skip this step as u need to reset your login credentials to reset your 2FA! <br>' +
                  '<img src="' + qrCodeImageUrl + '" alt="QR Code" style="width: 200px; height: 200px;">',
                icon: 'info'
              });
            })
            .catch(error => {
              Swal.showValidationMessage(`Request failed: ${error}`);
            });
}