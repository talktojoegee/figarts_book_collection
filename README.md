
# Figarts Book Collection Application

This is a Laravel-based Book Management Application designed to manage a collection of books. Follow the instructions below to set up and run the application.

---

## **Setup Instructions**

### **1. Clone the Repository**
Clone the project from the Git repository:
```bash
git clone https://github.com/talktojoegee/figarts_book_collection.git
```

### **2. Navigate to the Project Directory**
Move into the project's root directory:
```bash
cd figarts_book_collection
```

### **3. Install Dependencies**
Install all necessary dependencies using Composer:
```bash
composer update
```

### **4. Configure the Environment**
Ensure your environment is properly configured:
- Copy the `.env.example` file to `.env`:
  ```bash
  cp .env.example .env
  ```
- Update the `.env` file with the following parameters:
  ```env
  DB_CONNECTION=sqlite
  ```

### **5. Set Up the Database**
Create the SQLite database file:
```bash
touch database/database.sqlite
```

Run database migrations:
```bash
php artisan migrate
```

### **6. Seed the Database**
Seed the database with sample data:
```bash
php artisan db:seed --class=BookSeeder
```

### **7. Run the Application**
Start the development server:
```bash
php artisan serve
```

---

## **Accessing the Application**
Once the application is running, access it in your browser at:
```
http://127.0.0.1:8000
```

---

## **Additional Notes**
- Ensure you have the following prerequisites installed:
    - PHP >= 8.0
    - Composer
    - SQLite
- If you encounter any issues, double-check your environment configuration and ensure all dependencies are installed.

Thank you! 📚

---

