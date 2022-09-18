# Teachers-Recruitmet-system
A web based system to facilitate job seeking/recruitment amongst regional offices and schools in Namibia

# How to start the application
Open XAMPP control panel and start Apache and MySQL
Open your browser and type in "localhost"

# How to use the application
1. Create a new account
2. Login with your credentials
3. Create a new job
4. View all jobs
5. Apply for a job
6. View all applications
7. View all applicants

# How a job application is created
1. User fills out the application form
2. User uploads a CV
3. User submits the application
4. The data is sent and stored in the database in the jobapplications table
5. User is redirected to the view all applications page
6. Success message is shown.

# How a user is created
1. User fills out the registration form
2. User submits the form
3. The data is sent and stored in the database in the users table
4. User is redirected to the login page
5. Success message is shown.

# How a job is created
1. User fills out the job form
2. User submits the form
3. The data is sent and stored in the database in the jobs table
4. User is redirected to the view all jobs page
5. Success message is shown.

# How a user is logged in
1. User fills out the login form
2. User submits the form
3. We check if the entered username and password match any user in the users table
4. If the user exists, we redirect the user to the dashboard and the username is added to the session
5. If the user does not exist, we redirect the user to the login page and show an error message

