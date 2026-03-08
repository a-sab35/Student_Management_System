# Student_Management_System
This project is a Student Management System that allows authorized users to manage and view student information stored in a MySQL database.
The system includes user authentication for up to 5 users, a login page, and a dashboard displaying student data in a table format. 
The table supports filtering and sorting functionalities for better data management. 
The project will be built using HTML, CSS, JavaScript for the front end, Laravel for the back end, and MySQL for the database.


# Key Features:
User Authentication:
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

MySQL will store:
User credentials (username, hashed password).
Student data (name, age, CGPA, department, year, email).

Responsive Design:
The front end will be built using HTML and CSS with a responsive design to ensure compatibility across devices (desktop, tablet, mobile).
JavaScript will be used for dynamic interactions like filtering, sorting, and form validation.


# Workflow:

User Authentication:
Users log in via the login page.
Laravel validates credentials against the MySQL database.
Upon successful login, users are redirected to the dashboard.

Dashboard:
The dashboard displays a table of student data fetched from the MySQL database.
Users can filter the table by department, year, or CGPA range.
Users can sort the table by name, age, or CGPA.

Database:
Two tables will be created:
Users Table: Stores user credentials (id, username, password).
Students Table: Stores student data (id, name, age, cgpa, department, year, email).

Front-End Interactions:

JavaScript will handle:
Filtering: Update the table based on selected filters.
Sorting: Rearrange table rows based on the selected column.
Form validation for the login page.

Login Page:
Input fields: Username, Password.
Submit button.
![ready-profile-picture](https://github.com/user-attachments/assets/3d1ea42e-502f-44f2-8927-aabfa096d225)

Dashboard Page:
Table with columns: Name, Age, CGPA, Department, Year, Email.
Filter options: Dropdown for department, input for CGPA range.
Sort buttons: For name, age, and CGPA.
