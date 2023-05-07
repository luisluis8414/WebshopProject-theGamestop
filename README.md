# Ingame Item Webshop

This is a webshop for ingame items built with ThreeJS, PHP, and Ajax. The webshop features a login system that uses SHA512 hash for password encryption and a MySQL database to store user information.

## Features

- A user-friendly interface that allows users to browse, search and purchase ingame items.
- A secure login system that uses SHA512 hash for password encryption.
- A MySQL database to store user information and purchase history.
- Dynamic form handling to make the checkout process easy and fast.
- ThreeJS to create an immersive 3D shopping experience for users.

## Prerequisites

- PHP 7 or higher
- MySQL 5.7 or higher
- ThreeJS 0.128 or higher

## Installation

1. Clone the repository: 

git clone https://github.com/your-username/webshop.git


2. Import the database schema using the `webshop.sql` file included in the repository.

3. Update the database credentials in the `config.php` file.

// Replace the values with your database credentials
define('DB_HOST', 'localhost');
define('DB_NAME', 'webshop');
define('DB_USER', 'username');
define('DB_PASS', 'password');


4. Start the web server and navigate to the index page.

## Usage

1. Register a new account or log in to an existing one.

2. Browse the available ingame items and select the ones you want to purchase.

3. Add the selected items to your cart.

4. Proceed to checkout and fill in the necessary information.

5. Submit your order and wait for confirmation.

6. Once your order has been confirmed, you can download your purchased ingame items.

## Contributing

We welcome contributions from everyone. If you find a bug or have an idea for a new feature, please open an issue or submit a pull request.

## License

This project is licensed under the [MIT license](https://opensource.org/licenses/MIT).
