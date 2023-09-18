# hotelpms-adminpanel
Hotel Property Management System Admin Panel

Certainly! Below are step-by-step instructions for installing your this project on XAMPP, on a web hosting server, and for uploading the SQL file.  

# Hotel Property Management System Admin Panel

## Installation Instructions

### Local Development Environment (XAMPP)

1. **Download and Install XAMPP:**
   - Download and install XAMPP from [https://www.apachefriends.org/index.html]
   - Follow the installation instructions for your operating system.

2. **Start XAMPP:**
   - Open the XAMPP control panel and start the Apache server.

3. **Create a Project Folder:**
   - Navigate to the `htdocs` directory inside your XAMPP installation (usually located at `C:\xampp\htdocs` on Windows or `/Applications/XAMPP/htdocs` on macOS).
   - Create a new folder for your project (e.g., `hotelpms`).

4. **Copy Project Files:**
   - Copy all PHP files and other project assets into the `hotelpms` folder.


5. **Set Up the Database:**
   - Open your web browser and go to `http://localhost/phpmyadmin`.
   - Click on the "New" button to create a new database.
   - Enter a name for your database (e.g., `hotelpms_database`) and click "Create".

6. **Import SQL Database:**
   - In phpMyAdmin, select the newly created database.
   - Go to the "Import" tab.
   - Click on "Choose File" and import the SQL file "hotel_pms.sql" you will find the file inside the "database_sql" folder
     in the project files.
   - Click "Go" to import the database structure and data.

7. **Access Your Project:**
   - Open your web browser and go to `http://localhost/my_project` to view your project.

 
### Web Hosting Server

1. **Access Your Web Hosting Account:**
   - Log in to your web hosting account through the provided credentials.

2. **Upload Files via Cpanel File manager:**
   - Navigate to the directory where you want to host the project (usually `public_html` or `www`).
   - Upload all PHP files and project assets.

3. **Create a Database (if needed):**
   - In your web hosting control panel, create a new database and note down the credentials (database name, username, password).

4. **Update Database Configuration:**
   - In your project, locate the configuration file (e.g., `set.php`) and update the database connection details.

5. **Import SQL Database:**
   - Using phpMyAdmin or a similar tool provided by your web host, import the SQL file "hotel_pms.sql" you will find the file inside the "database_sql" folder
     in the project files.

6. **Access Your Project:**
   - Visit your website's domain (e.g., `http://www.yourwebsite.com`) to view the project.

### Download from GitHub

To download the project from GitHub, follow these steps:

1. **Clone the Repository:**
   - Open your command prompt or terminal.
   - Navigate to the directory where you want to store the project.
   - Use the following command to clone the repository:

   ```bash
   git clone https://github.com/chrysanthusobinna/hotelpms-adminpanel.git
   ```

2. **Access the Project:**
   - You now have a local copy of the Hotel Property Management System Admin Panel project.

---

These instructions will guide users through the process of installing this PHP project on both XAMPP and a web hosting server, 
as well as how to download the project from your GitHub repository.
