<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Setup Instructions

1. **Clone the Repository and Install Dependencies**
   - Clone the repository and install PHP dependencies using Composer:
     ```bash
     git clone https://github.com/yogaap/circle-creative-test.git
     cd repository
     composer install
     ```

2. **Set Up Environment Configuration**
   - Copy the example environment file to `.env`:
     ```bash
     cp .env.example .env
     ```

   - Open the `.env` file in a text editor and update the following configuration values:
     - **Database Configuration**:
       ```plaintext
       DB_CONNECTION=mysql
       DB_HOST=127.0.0.1
       DB_PORT=3306
       DB_DATABASE=your_database_name
       DB_USERNAME=your_database_username
       DB_PASSWORD=your_database_password
       ```
     - **Email Configuration**:
       ```plaintext
       MAIL_MAILER=smtp
       MAIL_HOST=mail_host
       MAIL_PORT=2525
       MAIL_USERNAME=your_mail_username
       MAIL_PASSWORD=your_mail_password
       MAIL_FROM_ADDRESS=your_email@example.com
       MAIL_FROM_NAME="Laravel"
       ```

3. **Generate Application Key**
   - Generate the application key for Laravel:
     ```bash
     php artisan key:generate
     ```

4. **Run Migrations**
   - Run database migrations to create the necessary tables:
     ```bash
     php artisan migrate
     ```

5. **Install Laravel Breeze**
   - Install Laravel Breeze for authentication:
     ```bash
     php artisan breeze:install
     ```

6. **Build Frontend Assets (Optional)**
   - If you use frontend assets with npm, run the following commands. (Note: This is optional depending on your project needs.)
     ```bash
     npm install
     npm run dev
     ```

7. **Serve the Application**
   - Start the Laravel development server:
     ```bash
     php artisan serve
     ```

## Additional Information

- **Email Configuration**: Ensure your email settings in the `.env` file are correct for sending notifications. This typically involves setting up Mailtrap or your SMTP server details.

- **Database Configuration**: Make sure your database credentials in the `.env` file are accurate and that the database exists.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Acknowledgments

Special thanks to the Laravel and open-source communities for their support and contributions.

Feel free to contribute to this project by submitting issues or pull requests.
