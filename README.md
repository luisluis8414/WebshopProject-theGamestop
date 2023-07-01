# Ingame Item Webshop
hostet at : [thegamestop.de/](https://thegamestop.de/) <br>

<strong>This is not a real shop. U cant pay with real money and you are not really purchasing items!</strong>

This webshop for in-game items is built with ThreeJS, PHP, Bootstrap, and Ajax. The web shop features a login system that uses SHA512 hash for password encryption and a MySQL database to store user information.

## Features

- A user-friendly interface that allows users to browse, search and purchase in-game items.
- A secure login system that uses SHA512 hash for password encryption and uses PHPMailer to send user Credentials or for password recovery.
- Even more secure with Google 2FA 
- A MySQL database to store user information, purchase history, and Store Items.
- Dynamic form handling to make the checkout process easy and fast.
- ThreeJS to create an immersive 3D shopping experience for users.

## Prerequisites

- PHP 7 or higher
- MySQL 5.7 or higher
- ThreeJS 0.128 or higher

## Installation

1. Clone the repository: 

git clone https://github.com/luisluis8414/threeJs.git

2. Import the database schema using the `webshop.sql` file in the SQL Folder in the repository

3. Create a .env file in the root directory

4 Add these values to your database credentials

```dotenv
DB_HOST=
DB_NAME=
DB_USER=
DB_PASSWORD=
EMAIL_SENDER=
SMTP_PW=
SMTP_HOST=
```

4. Start the web server and navigate to the index page.

## Usage

1. Register a new account or log in to an existing one. (You can also reset your Password and 2FA)
2. 
   ![image](https://github.com/luisluis8414/Gamestop/assets/86251888/737a15b7-aeae-40c7-8fec-aa7973454aea)

   ![image](https://github.com/luisluis8414/Gamestop/assets/86251888/a4ccc02f-ed9b-485c-8f48-06ef025f77ba)
   

4. Browse the available in-game items and select the ones you want to purchase.

 ![image](https://github.com/luisluis8414/Gamestop/assets/86251888/3cca48c3-5fc0-48ff-a10a-13e9f8df3ab0)

 ![image](https://github.com/luisluis8414/Gamestop/assets/86251888/11431ecd-8b3d-4ab3-a67d-932e0b360953)


6. Add the selected items to your cart.

   ![image](https://github.com/luisluis8414/Gamestop/assets/86251888/a414d9fc-b983-45c9-973e-ab507b79f34d)


8. Proceed to checkout and fill in the necessary information.

![image](https://github.com/luisluis8414/Gamestop/assets/86251888/c20ce29d-4b23-4ebe-95dc-5047975e0245)

10. Submit your order and wait for confirmation. (And u can go for more confetti!)

![image](https://github.com/luisluis8414/Gamestop/assets/86251888/cc3a0887-b75d-49f9-aa13-dbcd505b6c66)

12. Once your order has been confirmed you get an email.

![image](https://github.com/luisluis8414/Gamestop/assets/86251888/7b60536e-59f4-4fff-bcfb-1fb3d7122b9e)

14. You can visit the Profile Page to see/ reorder old orders or see other Users online and edit your Profile

![image](https://github.com/luisluis8414/Gamestop/assets/86251888/64d1c372-11fb-4fbc-8cab-230b33d49509)



