
function TwoFApopup(email){
    const qrCodeUrl = '../../php/Login/2factor/generateQRCode.php'; 
    console.log(email)
          fetch(qrCodeUrl, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
              email: email
            })
          })
            .then(response => {
              if (!response.ok) {
                throw new Error(response.statusText);
              }
              return response.json();
            })
            .then(qrCodeData => {
              const qrCodeImageUrl = qrCodeData.qrCodeImageUrl; 

              Swal.fire({
                title: '2-Factor Authentication',
                html: 'Don`t skip this step as u need to reset your login credentials to reset your 2FA! <br> Scan the QR code below with your Google authenticator app:<br>' +
                  '<img src="' + qrCodeImageUrl + '" alt="QR Code" style="width: 200px; height: 200px;">',
                icon: 'info'
              });
            })
            .catch(error => {
              Swal.showValidationMessage(`Request failed: ${error}`);
            });
}