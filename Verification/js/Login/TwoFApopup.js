
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
                console.log(response)
              if (!response.ok) {
                throw new Error(response.statusText);
              }
              return response.json();
            })
            .then(qrCodeData => {
              const qrCodeImageUrl = qrCodeData.qrCodeImageUrl; 
              Swal.fire({
                title: '2-Factor Authentication',
                html: '<span style="color:red;"><p>Don`t skip this step as you need to reset your login credentials to reset your 2FA!</p></span><br> <br> Scan the QR code below with your Google authenticator app:<br> <br>' +
                  '<img src="' + qrCodeImageUrl + '" alt="QR Code" style="width: 200px; height: 200px;">',
                icon: 'info'
              });
            })
            .catch(error => {
              Swal.showValidationMessage(`Request failed: ${error}`);
            });
}