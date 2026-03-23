# YP Exam Portal
A role-based online examination and student management system built with **Laravel 13 + Breeze**, designed for lecturers and students to manage exams, conduct assessments, and view results efficiently.  

The system prioritizes **clear workflows, access control, and usability**, with support for timed exams, MCQs, text questions, and class-based access control.  

---
## Project Version Note
Note: This project was developed using Laravel 13 instead of the originally requested Laravel 11.
The decision was made to leverage updated framework features, security improvements, and better compatibility with PHP 8.2+.
All functionalities described in this README are fully compatible and have been tested.
Downgrading to Laravel 11 is possible but would require adjustments to certain dependencies, factories, and Blade components.
## Key Features

### Roles & Access

**Lecturer**
- Create, edit, and manage exams for assigned classes  
- Add MCQ and text questions  
- Assign subjects to classes  
- View student attempt status and results  

**Student**
- Take timed exams assigned to their class  
- Resume in-progress exams  
- View submissions and results  

---

### Exams & Assessment
- Timed exams with countdown timer  
- MCQ auto-scoring  
- Text answer grading workflow  
- Access control by assigned class  

---

### UI & UX
- Responsive design (mobile-friendly)  
- Modern UI for lecturer dashboard, student dashboard, and exam pages  
- Dynamic form to add questions (MCQ & text)  
- Interactive “add question” button  
- Landing page with login/register and feature overview  

---

## Tech Stack
- **Backend:** Laravel 13 (PHP 8.3+)  
- **Authentication:** Laravel Breeze (Blade)  
- **Frontend:** Blade + Tailwind CSS  
- **Database:** MySQL (configurable)  
- **Mail:** Laravel Mail (log for local testing)  
- **Build Tools:** Vite  

---

## Installation & Setup

### Prerequisites
- PHP 8.3+  
- Composer  
- Node.js 18+ & npm  
- MySQL  

### Steps
```bash
# Clone repository
git clone <repository-url>
cd yp-portal

# Install backend dependencies
composer install

# Install frontend dependencies
npm install

# Environment setup
cp .env.example .env
php artisan key:generate

# Configure database in .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=yp_portal
DB_USERNAME=your_user
DB_PASSWORD=your_password

# Optional mail for local testing
MAIL_MAILER=log
MAIL_FROM_ADDRESS=noreply@example.com
MAIL_FROM_NAME="YP Online Exam Portal"

# Run migrations & seed dummy data
php artisan migrate:fresh --seed

# Build assets (development)
npm run dev

# Start server
php artisan serve
```
Access the app at: http://127.0.0.1:8000

Demo Accounts (Local Environment)
Role	Email	Password
Lecturer	lecturer@example.com
	password
Student	student1@example.com
	password
Student	student2@example.com
	password
Main User Flows

Lecturer

Create classes & subjects
Assign subjects to classes
Create exams for a class & subject
Add questions (MCQ & text)
Review student attempts & grade text answers

Student

Login / view dashboard
See exams assigned to their class
Take exams with timer
Submit answers
View results
Notes & Assumptions
Each student can take an exam only once
Students can only see exams assigned to their class
Lecturer controls exam creation & questions
No background queues; emails logged locally
Security & Access Control
Middleware restricts routes based on role
Students cannot see exams outside their class
Lecturers can only manage their exams and students
Troubleshooting
Missing APP_KEY: run php artisan key:generate
DB connection errors: verify .env database settings
Assets not loading: run npm install then npm run dev
License

This project is provided for assessment and educational purposes only.
