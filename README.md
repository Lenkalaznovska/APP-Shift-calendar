# 🗓️ Employee Shift Planner (v2)

A modern, professional-grade single-page application (SPA) for efficient employee shift management. This project is architected for extreme simplicity, requiring zero build tools or complex dependencies.

👉 [Live Demo](https://smeny.wz.cz/)

<img width="1884" height="972" alt="image" src="https://github.com/user-attachments/assets/3e9e7372-464b-4741-ad4c-0e1660cc96aa" />
<img width="589" height="772" alt="image" src="https://github.com/user-attachments/assets/d5758648-0517-425c-bc1b-424ae9ccb262" />
<img width="683" height="246" alt="image" src="https://github.com/user-attachments/assets/eb4fb27d-08bc-47c0-8801-c5a61e0942cf" />
<img width="1897" height="915" alt="image" src="https://github.com/user-attachments/assets/68d4a3f1-3374-4518-9563-53ac87b10d14" />

---

## ✨ Key Features

- **Single Page Application (SPA)**: Seamless and fast user interface without any page reloads.
- **Interactive Calendar**: Drag-and-drop interface for scheduling, editing, and deleting shifts.
- **Advanced Dashboard**: Monthly statistics including total hours, shift counts, and workload distribution.
- **Dynamic Filtering & Export**: Filter by employee and export calendar or dashboard as print-ready PDF.
- **Full CRUD Functionality**: Create, read, update, and delete shifts with built-in validations.
- **Smart Deletion**: Soft-delete for recent shifts (keeps data for stats) and hard-delete for future ones.
- **Dark/Light Mode**: Respects user’s system theme and saves preference using `localStorage`.
- **Fully Responsive Design**: Optimized for desktops, tablets, and smartphones.
- **Zero Dependencies**: No `npm`, `composer`, or build steps required.

---

## 🛠️ Technologies & Architecture

This project is designed as a single-file monolithic application (`index.php`) to demonstrate a powerful yet deployment-friendly architecture.

### 🖥️ Frontend

- **Vue.js 3 (via CDN)** – Used with Composition API for reactive UI, no build tools needed.
- **Tailwind CSS (via CDN)** – Utility-first CSS framework for fast and responsive styling.
- **JavaScript (ES6+) & Fetch API** – Handles all client-side logic and API calls.

### 🔙 Backend

- **PHP 8+** – RESTful API architecture using object-oriented principles (e.g., `ApiController`, `Database` classes).
- **MySQL / MariaDB** – Relational database, accessed securely via `PDO` to prevent SQL injection.

---

## 🗃️ Database Schema

<details>
  <summary>Click to view SQL Schema</summary>

  ```sql
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
  ```
</details>

---

## 🔌 API Documentation

All requests are made to `index.php?api=true` with a specified `action` parameter.

| Action                     | Method | Parameters / Body                                                                 | Description                                                              |
|---------------------------|--------|------------------------------------------------------------------------------------|--------------------------------------------------------------------------|
| `get_initial_data`        | `GET`  | `year`, `month`, `employeeId`                                                     | Fetches employee and shift data for the calendar.                        |
| `get_dashboard_data`      | `GET`  | `year`, `month`, `employeeId`                                                     | Returns summary statistics for the selected month and employee.          |
| `create_shift`            | `POST` | JSON `{ employee_id, start_time, end_time, note }`                                | Creates a new shift. Overlapping shifts are prevented.                   |
| `update_shift`            | `POST` | JSON `{ id, start_time, end_time, note }`                                         | Updates an existing shift.                                               |
| `delete_shift`            | `POST` | JSON `{ id }`                                                                     | Deletes a shift. Soft-delete for past shifts, hard-delete for future.    |
| `get_print_view`          | `GET`  | `year`, `month`, `employeeId`                                                     | Returns an HTML version of the calendar for printing.                    |
| `get_dashboard_print_view`| `GET`  | `year`, `month`                                                                   | Returns a printable version of the dashboard statistics.                 |

---
