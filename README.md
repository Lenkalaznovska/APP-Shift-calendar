# 🗓️ Employee Shift Planner (v2)

A modern single-page web application (SPA) for efficient employee shift management.  
Built using **Vue.js 3**, **Tailwind CSS**, and a **PHP + MySQL/MariaDB** backend.

👉 [Live Demo](http://smeny.wz.cz:8080)

---

## ✨ Key Features

- ⚡ **Single Page Application (SPA)** – seamless interface, no full page reloads
- 📅 **Interactive Calendar** – intuitive shift scheduling, editing, and deletion
- 📊 **Dashboard Overview** – monthly statistics, total hours, shift count, employee workload
- 🧠 **Filtering & Export** – filter by employee, print or export to PDF/XLS
- 🔄 **Full CRUD** – create, read, update, and delete shifts
- 🌗 **Dark/Light Mode** – theme preference saved automatically in the browser
- 📱 **Fully Responsive Design** – optimized for desktop, tablets, and mobile phones

---

## 🛠️ Technologies Used

### 🖥️ Frontend

- **Vue.js 3** – Composition API, reactive components
- **Tailwind CSS** – utility-first CSS framework
- **JavaScript (ES6+) & Fetch API** – asynchronous communication and logic

### 🔙 Backend

- **PHP 8+** – REST API written in OOP (classes: `Database`, `ApiController`)
- **MySQL / MariaDB** – relational database, using PDO for secure communication

---

## 🚀 Installation & Setup

1. **Upload to Server**  
   Upload project files (e.g. `index.php`, `assets/`, `components/`, `api/`) to your web server or local host.

2. **Create Database**  
   In MySQL/MariaDB, create a new database with `utf8mb4` encoding.

3. **Configure PHP Connection**  
   Open `index.php` and update your database credentials:

   ---

CREATE TABLE `departments` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `employees` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `department_id` INT NOT NULL,
  `color` VARCHAR(7) NOT NULL DEFAULT '#3b82f6',
  `is_active` BOOLEAN NOT NULL DEFAULT TRUE,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`department_id`) REFERENCES `departments`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `shifts` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `employee_id` INT NOT NULL,
  `start_time` DATETIME NOT NULL,
  `end_time` DATETIME NOT NULL,
  `note` TEXT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL,
  FOREIGN KEY (`employee_id`) REFERENCES `employees`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

