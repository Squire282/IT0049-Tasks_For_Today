\# Tasks for Today Management System

A simple task management web application developed using CodeIgniter 4 for IT0049 \- Web System Technologies.

\#\# Features

\- View tasks scheduled for today  
\- View all tasks  
\- View user profile information  
\- About page containing developer information  
\- MySQL database integration

\#\# Pages

\- \`/\` \- Displays tasks scheduled for today  
\- \`/tasks\` \- Displays all tasks  
\- \`/profile\` \- Displays the demo user's information  
\- \`/about\` \- Displays information about the system and developer

\#\# Requirements

\- PHP  
\- Composer  
\- MySQL  
\- XAMPP  
\- CodeIgniter 4

\#\# Installation

1\. Clone or download this repository.

2\. Install the required dependencies:

   composer install

3\. Create a MySQL database named:

   tasks\_for\_today

4\. Import the database file located at:

   database/tasks\_for\_today.sql

5\. Rename the \`env\` file to \`.env\`.

6\. Configure the database connection in \`.env\`:

   database.default.hostname \= localhost  
   database.default.database \= tasks\_for\_today  
   database.default.username \= root  
   database.default.password \=  
   database.default.DBDriver \= MySQLi  
   database.default.port \= 3306

7\. Start the CodeIgniter development server:

   php spark serve

8\. Open the application in your browser:

   http://localhost:8080

## TSA2 - Full CRUD and Authentication

The Tasks for Today Management System was extended with task management,
authentication, validation, and soft deletion.

### Authentication

- Login using username and password
- Password stored as a secure hash
- Password verification using `password_verify()`
- Session created after successful login
- Logout destroys the session
- Authentication filter protects task management actions

### Public Pages

The following pages can be viewed without logging in:

- `/` - Tasks for Today
- `/tasks` - Complete active Task List
- `/profile` - User Profile
- `/about` - About page

### Protected Task Management

Login is required for:

- `/tasks/new` - Create a task
- Editing tasks
- Updating tasks
- Archiving tasks

### Task Features

- Create tasks
- Required title validation
- Required task date validation
- Edit and update existing tasks
- Change task status
- Archive tasks using soft deletion
- Archived tasks are excluded from the Welcome and Task List pages

### Running the Project

1. Clone the repository.
2. Run `composer install`.
3. Create a MySQL database named `tasks_for_today`.
4. Import `database/tasks_for_today.sql`.
5. Configure the database connection in `.env`.
6. Run `php spark serve`.
7. Open `http://localhost:8080`.

\#\# Developer

Mc Kenrick Cafugauan

