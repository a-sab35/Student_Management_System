# Student_Management_System
This project is a Student Management System that allows authorized users to manage and view student information stored in a MySQL database.
The system includes user authentication for up to 5 users, a login page, and a dashboard displaying student data in a table format. 
The table supports filtering and sorting functionalities for better data management. 
The project will be built using HTML, CSS, JavaScript for the front end, Laravel for the back end, and MySQL for the database.


# Key Features:
# User Authentication:
The system supports authentication for up to 5 users.
Users must log in to access the student data.
Secure password hashing and validation will be implemented.
Student Data Management:
Each student record will include the following fields:
Name: Full name of the student.
Age: Age of the student.
CGPA: Cumulative Grade Point Average.
Department: Department the student belongs to.
Year: Current academic year (e.g., 1st, 2nd, 3rd, 4th).
Email: Student's email address.
Data will be stored in a MySQL database.
Front-End Pages:
Login Page:
A simple and responsive login form for user authentication.
Validation for username and password fields.
Dashboard Page:
Displays student data in a table format.
Supports filtering (e.g., by department, year, or CGPA range).
Supports sorting (e.g., by name, age, or CGPA).
Back-End Functionality:
Laravel will handle:
User authentication and session management.
CRUD (Create, Read, Update, Delete) operations for student data.
API endpoints for fetching, filtering, and sorting student data.
MySQL will store:
User credentials (username, hashed password).
Student data (name, age, CGPA, department, year, email).
Responsive Design:
The front end will be built using HTML and CSS with a responsive design to ensure compatibility across devices (desktop, tablet, mobile).
JavaScript will be used for dynamic interactions like filtering, sorting, and form validation.
