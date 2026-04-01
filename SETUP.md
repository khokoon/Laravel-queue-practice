# Laravel Queue Practice - Complete Setup Guide

## 🎯 Project Overview
This guide covers setting up a Laravel application with user registration, Bootstrap 5 styling, email notifications via Mailtrap, and queue-based email sending.

## 📋 Prerequisites
- PHP 8.2+
- Composer
- Node.js & npm
- Laravel installed globally
- Mailtrap account for email testing

## 🚀 Step-by-Step Setup

### 1. Create Laravel Project
```bash
laravel new laravel-queue-practice
cd laravel-queue-practice
```

### 2. Configure Database
Edit `.env`:
```env
DB_CONNECTION=sqlite
# Create database file
touch database/database.sqlite
```

### 3. Install Bootstrap 5
```bash
npm install bootstrap@5.3.3
```

Update `resources/css/app.css`:
```css
@import 'bootstrap/dist/css/bootstrap.min.css';

@tailwind base;
@tailwind components;
@tailwind utilities;
```

Update `resources/js/app.js`:
```js
import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();
```

Build assets:
```bash
npm run dev
```

### 4. Create Registration Form
Create `resources/views/register.blade.php` with Bootstrap 5 styling:
- Card layout with header
- Form fields: name, email, password, confirm password
- Bootstrap validation classes
- Success/error alerts

### 5. Create RegisterController
```bash
php artisan make:controller RegisterController
```

Update routes in `routes/web.php`:
```php
use App\Http\Controllers\RegisterController;

Route::get('/', [RegisterController::class, 'create'])->name('register.create');
Route::post('/', [RegisterController::class, 'store'])->name('register.store');
```

Controller methods:
- `create()`: returns view('register')
- `store()`: validates input, creates user, dispatches email job

### 6. Set Up Email System

#### Configure Mailtrap in `.env`:
```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS="mailtrap@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

#### Create Mail Classes:
```bash
php artisan make:mail RegistrationSuccessMail
php artisan make:mail UserReportMail
```

#### Create Email Templates:
- `resources/views/emails/registration-success.blade.php`
- `resources/views/emails/user-report.blade.php`

### 7. Set Up Queue Job
```bash
php artisan make:job SendMailJob
```

Update `SendMailJob.php`:
- Accept request data in constructor
- Send both emails in handle() method

### 8. Database Setup
```bash
php artisan migrate
php artisan cache:table
php artisan migrate
```

### 9. Configure Queue
Update `.env`:
```env
QUEUE_CONNECTION=database
CACHE_STORE=database
```

### 10. Run Application
```bash
php artisan serve
php artisan queue:work
```

## 🔧 Key Components Created

### Files Created:
- `resources/views/register.blade.php` - Bootstrap 5 registration form
- `app/Http/Controllers/RegisterController.php` - Registration logic
- `app/Mail/RegistrationSuccessMail.php` - User welcome email
- `app/Mail/UserReportMail.php` - Admin notification email
- `app/Jobs/SendMailJob.php` - Queue job for email sending
- `resources/views/emails/registration-success.blade.php` - Welcome email template
- `resources/views/emails/user-report.blade.php` - Admin notification template

### Routes:
- `GET /` - Show registration form
- `POST /` - Process registration

### Queue Flow:
1. User submits registration form
2. Controller validates and creates user
3. Dispatches `SendMailJob` to queue
4. Queue worker processes job and sends emails

## 🐛 Common Issues & Fixes

### Queue Worker Fails:
- Run `php artisan cache:table` and `php artisan migrate`
- Check `.env` QUEUE_CONNECTION and CACHE_STORE settings

### Email Not Sending:
- Verify Mailtrap credentials in `.env`
- Check queue worker is running: `php artisan queue:work`

### Bootstrap Not Loading:
- Run `npm run dev` to build assets
- Check Vite is compiling CSS/JS properly

## ✅ Testing
1. Visit `http://localhost:8000`
2. Fill registration form
3. Check database for user record
4. Check Mailtrap inbox for emails
5. Verify queue job processes successfully

## 📝 Notes
- Uses SQLite for simplicity
- Bootstrap 5 for responsive design
- Database queue for email processing
- Mailtrap for email testing
- All emails sent asynchronously via queue jobs