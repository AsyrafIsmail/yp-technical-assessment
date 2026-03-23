# YP Online Exam Portal

A role-based online examination and student management system built with **Laravel 11 + Breeze**, designed for lecturers and students to manage exams, conduct assessments, and view results efficiently.  

The system prioritizes **clear workflows, access control, and usability**, with support for timed exams, MCQs, text questions, and class-based access control.  

---

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
- **Backend:** Laravel 11 (PHP 8.2+)  
- **Authentication:** Laravel Breeze (Blade)  
- **Frontend:** Blade + Tailwind CSS  
- **Database:** MySQL (configurable)  
- **Mail:** Laravel Mail (log for local testing)  
- **Build Tools:** Vite  

---

## Installation & Setup

### Prerequisites
- PHP 8.2+  
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
