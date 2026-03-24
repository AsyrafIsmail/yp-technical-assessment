# YP Exam Portal
A role-based online examination and student management system built with **Laravel 13 + Breeze**, designed for lecturers and students to manage exams, conduct assessments, and view results efficiently.  

The system prioritizes **clear workflows, access control, and usability**, with support for timed exams, MCQs, text questions, and class-based access control.  

---
## Project Version Note

This project was developed using **Laravel 13** instead of the originally specified Laravel 11.

Laravel 13 was chosen to leverage newer framework improvements, enhanced security, and compatibility with PHP 8.3+. All required features have been fully implemented and tested.

The application structure and implementation remain consistent with Laravel 11 standards, and downgrading would be feasible with minor adjustments if required.

## Assessment Criteria Coverage

| Requirement | Implementation |
|------------|--------------|
| Roles (Lecturer & Student) | Implemented via `role` field in users table |
| Authentication | Laravel Breeze authentication |
| Exam Creation | Lecturer can create exams with MCQ & text questions |
| Class Management | Students assigned to classes |
| Subject Management | Subjects linked to classes |
| Access Control | Students only see exams for their class |
| Time Limit | Exams include duration with countdown timer |
| Additional Features | Dynamic question builder, styled dashboards, improved UX |

## Key Features

### Lecturer
- Manage classes and subjects  
- Assign subjects to classes  
- Create and manage exams  
- Add multiple questions dynamically (MCQ & text)  
- Manage students and assign them to classes  

### Student
- View exams assigned to their class  
- Take timed exams with countdown  
- Submit answers  

### Exams & Assessment
- Timed exams with automatic countdown  
- Support for MCQ and open-text questions  
- Class-based access control  

### UI & UX
- Clean and responsive interface  
- Dynamic question creation (add multiple questions in one form)  
- Role-based dashboards  
- Improved usability for exam flow  

---

## Screenshots

### Landing Page
<img width="1303" height="732" alt="image" src="https://github.com/user-attachments/assets/4bcb2674-f775-456c-b4f9-3defb48c81f7" />

### Lecturer Dashboard
![Lecturer Dashboard](<img width="1314" height="716" alt="image" src="https://github.com/user-attachments/assets/f2015521-14a9-4221-835a-a6374c7ac4ac" />
)

### Student Dashboard
![Student Dashboard](<img width="1315" height="846" alt="image" src="https://github.com/user-attachments/assets/46f8a574-9788-4056-aaa3-d9084a266912" />
)

### Exam Page
![Exam Page](<img width="1262" height="877" alt="image" src="https://github.com/user-attachments/assets/4f5d1fdc-d5e9-4793-9f6e-45d2ac3291a9" />
)

### Question Management
![Questions](<img width="1249" height="610" alt="image" src="https://github.com/user-attachments/assets/759d277b-3f46-4722-a61f-cb8766950b04" />
)

## Database Design (Simplified)

- Users (role, classroom_id)
- Classrooms
- Subjects
- Classroom_Subject (pivot)
- Exams (classroom_id, subject_id, duration)
- Questions (exam_id, type)
- Options (question_id, is_correct)
- Answers (user_id, question_id)

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

# Optional: seed demo data for testing
php artisan migrate:fresh --seed

# Build assets (development)
npm run dev

# Start server
php artisan serve
```
### Note
Running --seed is optional. It will populate the database with sample lecturers, students, classes, subjects, exams, and questions for easier testing. If you prefer to start with an empty database, just run php artisan migrate:fresh without --seed
## Access the App

You can access the application at: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## Demo Accounts (Local Environment)

| Role      | Email                  | Password |
|-----------|-----------------------|----------|
| Lecturer  | lecturer@example.com   | password123 |
| Student   | student1@example.com   | password123 |
| Student   | student2@example.com   | password123 |

---

## Main User Flows

### Lecturer
- Create classes & subjects  
- Assign subjects to classes  
- Create exams for a class & subject  
- Add questions (MCQ & text)
- Assign students to classes  

### Student
- Login / view dashboard  
- See exams assigned to their class  
- Take exams with timer  
- Submit answers  

---

## Notes & Assumptions
- Each student can take an exam only once  
- Students can only see exams assigned to their class  
- Lecturer controls exam creation & questions  
- No background queues; emails logged locally  

---

## Security & Access Control
- Middleware restricts routes based on role  
- Students cannot see exams outside their class  
- Lecturers can only manage their exams and students  

---

## Future Improvements
- Auto-grading for MCQ results  
- Result summary page for students  
- Pagination and search for large datasets  
- Role-based middleware (policy-based access control)  
- Improved validation feedback for dynamic forms  

---

## Troubleshooting
- **Missing APP_KEY:** run `php artisan key:generate`  
- **DB connection errors:** verify `.env` database settings  
- **Assets not loading:** run `npm install` then `npm run dev`  

---

## License
This project is provided for assessment and educational purposes only.

