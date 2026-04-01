# Laravel Queue Practice 🚀

A comprehensive Laravel application demonstrating user registration with Bootstrap 5 styling, email notifications via Mailtrap, and queue-based email processing.

![Laravel](https://img.shields.io/badge/Laravel-11.x-red.svg)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-purple.svg)
![SQLite](https://img.shields.io/badge/Database-SQLite-green.svg)

## 📋 What This Application Does

This Laravel application showcases a complete user registration system with the following features:

### ✨ Core Features
- **User Registration**: Clean Bootstrap 5 styled registration form
- **Email Notifications**: Automated welcome emails to new users
- **Admin Notifications**: Email alerts to administrators about new registrations
- **Queue Processing**: Asynchronous email sending using Laravel queues
- **Responsive Design**: Mobile-friendly interface with Bootstrap 5

### 🔄 Application Flow
1. **User visits** the registration page at `http://localhost:8000`
2. **Fills out** the registration form (name, email, password)
3. **Submits** the form with validation
4. **Gets registered** in the database instantly
5. **Receives welcome email** via Mailtrap
6. **Admin gets notified** about the new user
7. **All emails sent asynchronously** through queue jobs

## 🛠️ Technologies Used

- **Laravel 11.x** - PHP framework
- **Bootstrap 5.3** - CSS framework for responsive design
- **SQLite** - Database for simplicity
- **Mailtrap** - Email testing service
- **Laravel Queues** - Asynchronous job processing
- **Vite** - Asset compilation
- **Alpine.js** - JavaScript framework

## 🚀 Quick Start

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & npm
- Git

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/khokoon/Laravel-queue-practice.git
   cd Laravel-queue-practice
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database Setup**
   ```bash
   # Create SQLite database
   touch database/database.sqlite

   # Run migrations
   php artisan migrate
   php artisan cache:table
   php artisan migrate
   ```

6. **Build Assets**
   ```bash
   npm run dev
   ```

7. **Configure Mailtrap** (in `.env`)
   ```env
   MAIL_MAILER=smtp
   MAIL_HOST=sandbox.smtp.mailtrap.io
   MAIL_PORT=2525
   MAIL_USERNAME=your_mailtrap_username
   MAIL_PASSWORD=your_mailtrap_password
   MAIL_FROM_ADDRESS="mailtrap@example.com"
   ```

## 🎯 How to Run

1. **Start the Laravel server**
   ```bash
   php artisan serve
   ```
   Server will run at: `http://localhost:8000`

2. **Start the queue worker** (in a separate terminal)
   ```bash
   php artisan queue:work
   ```

3. **Visit the application**
   - Open `http://localhost:8000` in your browser
   - Fill out the registration form
   - Check your Mailtrap inbox for emails

## 📸 Demo

### Registration Form
The application displays a beautiful Bootstrap 5 registration form with:
- Name, Email, Password fields
- Real-time validation
- Responsive design
- Success/error messages

### Email Notifications
- **Welcome Email**: Sent to new users upon registration
- **Admin Notification**: Sent to administrators about new signups

## 📁 Project Structure

```
Laravel-queue-practice/
├── app/
│   ├── Http/Controllers/RegisterController.php
│   ├── Jobs/SendMailJob.php
│   └── Mail/
│       ├── RegistrationSuccessMail.php
│       └── UserReportMail.php
├── resources/
│   ├── views/
│   │   ├── register.blade.php
│   │   └── emails/
│   │       ├── registration-success.blade.php
│   │       └── user-report.blade.php
│   ├── css/app.css
│   └── js/app.js
├── routes/web.php
├── database/
│   └── migrations/
├── .env
├── SETUP.md
└── README.md
```

## 🔧 Key Components

### Controllers
- **RegisterController**: Handles user registration logic

### Jobs
- **SendMailJob**: Processes email sending asynchronously

### Mail Classes
- **RegistrationSuccessMail**: Sends welcome emails to users
- **UserReportMail**: Sends notifications to admins

### Views
- **register.blade.php**: Bootstrap 5 registration form
- **Email templates**: HTML templates for notifications

## 🧪 Testing the Application

1. **Visit** `http://localhost:8000`
2. **Register** a new user with:
   - Name: John Doe
   - Email: john@example.com
   - Password: password123
3. **Check database** for user record
4. **Check Mailtrap** for two emails:
   - Welcome email to john@example.com
   - Admin notification to mailtrap@example.com

## 🚨 Common Issues & Solutions

### Queue Worker Not Working
```bash
# Create cache table if missing
php artisan cache:table
php artisan migrate

# Check queue configuration
php artisan tinker --execute="dd(config('queue.default'))"
```

### Emails Not Sending
- Verify Mailtrap credentials in `.env`
- Ensure queue worker is running
- Check Mailtrap dashboard for emails

### Assets Not Loading
```bash
npm run dev
# or for production
npm run build
```

## 📚 What You'll Learn

This project demonstrates:
- **Laravel Fundamentals**: Routing, controllers, views, validation
- **Queue System**: Asynchronous job processing
- **Email Integration**: SMTP configuration and mailables
- **Frontend Styling**: Bootstrap 5 integration with Laravel
- **Database Operations**: User creation and data persistence

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🙏 Acknowledgments

- Laravel Framework
- Bootstrap 5
- Mailtrap for email testing
- Laravel Community

---

**Built with ❤️ using Laravel 11.x**

*For detailed setup instructions, see [SETUP.md](SETUP.md)*
