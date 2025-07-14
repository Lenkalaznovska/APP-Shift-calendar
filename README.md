# 🗓️ Employee Shift Planner (v2)

A modern, professional-grade single-page application (SPA) for efficient employee shift management. This project is architected for extreme simplicity, requiring zero build tools or complex dependencies.

👉 [Live Demo](https://smeny.wz.cz/)

<img width="1884" height="972" alt="image" src="https://github.com/user-attachments/assets/3e9e7372-464b-4741-ad4c-0e1660cc96aa" />
<img width="589" height="772" alt="image" src="https://github.com/user-attachments/assets/d5758648-0517-425c-bc1b-424ae9ccb262" />
<img width="683" height="246" alt="image" src="https://github.com/user-attachments/assets/eb4fb27d-08bc-47c0-8801-c5a61e0942cf" />
<img width="1897" height="915" alt="image"src="https://github.com/user-attachments/assets/68d4a3f1-3374-4518-9563-53ac87b10d14" />

---

## ✨ Key Features

- **Single Page Application (SPA)**: A seamless and fast user interface with no page reloads.
- **Interactive Calendar**: Drag-and-drop style interface for intuitive shift scheduling, editing, and deletion.
- **Advanced Dashboard**: In-depth monthly statistics including total hours, shift counts, and individual employee workload percentages.
- **Dynamic Filtering & Export**: Filter the view by employee and export the calendar or dashboard to a print-friendly PDF format directly from the browser.
- **Full CRUD Functionality**: Create, Read, Update, and Delete shifts with built-in validation (e.g., prevents overlapping shifts).
- **Smart Deletion**: Implements a soft-delete for recent shifts (preserving data for stats) and a hard-delete for shifts far in the future.
- **Dark/Light Mode**: Automatic theme preference detection and saving via `localStorage`.
- **Fully Responsive Design**: Optimized for a perfect experience on desktops, tablets, and mobile phones.
- **Zero Dependencies**: No `npm`, `composer`, or build steps required.

---

## 🛠️ Technologies & Architecture

This project is intentionally built as a monolithic single-file application (`index.php`) to demonstrate a powerful, yet easy-to-deploy architecture.

### 🖥️ Frontend

- **Vue.js 3 (via CDN)**: Powers the reactive UI using the Composition API. Chosen to avoid a mandatory Node.js build environment.
- **Tailwind CSS (via CDN)**: Provides a modern, utility-first CSS framework for rapid and responsive design.
- **JavaScript (ES6+) & Fetch API**: Manages all client-side logic and asynchronous communication with the backend.

### 🔙 Backend

- **PHP 8+**: A self-contained, object-oriented REST API (`ApiController`, `Database` classes).
- **MySQL / MariaDB**: The relational database, accessed securely via the `PDO` extension to prevent SQL injection.

---

## 🗃️ Database Schema

For developers who wish to understand the data structure, here is the SQL schema used by the application.

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

Rozumím. API dokumentace je klíčová a musí být součástí finálního souboru.

Pro naprostou jistotu zde nejdříve uvádím **samotnou API dokumentaci**, kterou si přejete zahrnout:

### 🔌 API Dokumentace

| Akce | Metoda | Parametry / Tělo (Body) | Popis |
| :--- | :--- | :--- | :--- |
| `get_initial_data` | `GET` | `year`, `month`, `employeeId` | Načte směny a zaměstnance pro kalendář. |
| `get_dashboard_data` | `GET` | `year`, `month`, `employeeId` | Získá statistiky pro dashboard. |
| `create_shift` | `POST` | **Body (JSON):**\<br\>`{ employee_id, start_time, end_time, note }` | Vytvoří novou směnu. Validuje proti překryvu. |
| `update_shift` | `POST` | **Body (JSON):**\<br\>`{ id, start_time, end_time, note }` | Upraví existující směnu. |
| `delete_shift` | `POST` | **Body (JSON):**\<br\>`{ id }` | Smaže směnu (měkce/tvrdě podle data). |
| `get_print_view` | `GET` | `year`, `month`, `employeeId` | Vrátí HTML stránku kalendáře pro tisk. |
| `get_dashboard_print_view`| `GET` | `year`, `month` | Vrátí HTML stránku dashboardu pro tisk. |

-----

Níže je **celý soubor `README.md` v jednom bloku ke zkopírování**, který tuto API dokumentaci samozřejmě obsahuje, přesně podle vašeho zadání.

````markdown
# 🗓️ Employee Shift Planner (v2)

A modern, professional-grade single-page application (SPA) for efficient employee shift management. This project is architected for extreme simplicity, requiring zero build tools or complex dependencies.

👉 [Live Demo](https://smeny.wz.cz/)

<img width="1884" height="972" alt="image" src="https://github.com/user-attachments/assets/3e9e7372-464b-4741-ad4c-0e1660cc96aa" />
<img width="589" height="772" alt="image" src="https://github.com/user-attachments/assets/d5758648-0517-425c-bc1b-424ae9ccb262" />
<img width="683" height="246" alt="image" src="https://github.com/user-attachments/assets/eb4fb27d-08bc-47c0-8801-c5a61e0942cf" />
<img width="1897" height="915" alt="image"src="https://github.com/user-attachments/assets/68d4a3f1-3374-4518-9563-53ac87b10d14" />

---

## ✨ Key Features

- **Single Page Application (SPA)**: A seamless and fast user interface with no page reloads.
- **Interactive Calendar**: Drag-and-drop style interface for intuitive shift scheduling, editing, and deletion.
- **Advanced Dashboard**: In-depth monthly statistics including total hours, shift counts, and individual employee workload percentages.
- **Dynamic Filtering & Export**: Filter the view by employee and export the calendar or dashboard to a print-friendly PDF format directly from the browser.
- **Full CRUD Functionality**: Create, Read, Update, and Delete shifts with built-in validation (e.g., prevents overlapping shifts).
- **Smart Deletion**: Implements a soft-delete for recent shifts (preserving data for stats) and a hard-delete for shifts far in the future.
- **Dark/Light Mode**: Automatic theme preference detection and saving via `localStorage`.
- **Fully Responsive Design**: Optimized for a perfect experience on desktops, tablets, and mobile phones.
- **Zero Dependencies**: No `npm`, `composer`, or build steps required.

---

## 🛠️ Technologies & Architecture

This project is intentionally built as a monolithic single-file application (`index.php`) to demonstrate a powerful, yet easy-to-deploy architecture.

### 🖥️ Frontend

- **Vue.js 3 (via CDN)**: Powers the reactive UI using the Composition API. Chosen to avoid a mandatory Node.js build environment.
- **Tailwind CSS (via CDN)**: Provides a modern, utility-first CSS framework for rapid and responsive design.
- **JavaScript (ES6+) & Fetch API**: Manages all client-side logic and asynchronous communication with the backend.

### 🔙 Backend

- **PHP 8+**: A self-contained, object-oriented REST API (`ApiController`, `Database` classes).
- **MySQL / MariaDB**: The relational database, accessed securely via the `PDO` extension to prevent SQL injection.

---

## 🗃️ Database Schema

For developers who wish to understand the data structure, here is the SQL schema used by the application.

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
````

---

## 🔌 API Documentation

The backend logic is exposed through a simple set of API endpoints. All requests are sent to `index.php?api=true` and differentiated by the `action` parameter.

| Action                         | Method | Parameters / Body                                                                                                                                     | Description                                                                 |
| ------------------------------ | ------ | ----------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------- |
| `get_initial_data`             | `GET`  | `year`, `month`, `employeeId`                                                                                                                         | Fetches shifts and employees for the calendar view.                         |
| `get_dashboard_data`           | `GET`  | `year`, `month`, `employeeId`                                                                                                                         | Retrieves aggregated statistics for the dashboard.                          |
| `create_shift`                 | `POST` | **Body (JSON):**\<br\>`{ employee_id, start_time, end_time, note }`                                                                                      | Creates a new shift. Validates against overlapping shifts.                  |
| `update_shift`                 | `POST` | **Body (JSON):**\<br\>`{ id, start_time, end_time, note }`                                                                                               | Updates an existing shift's time and note.                                  |
| `delete_shift`                 | `POST` | **Body (JSON):**\<br\>`{ id }`                                                                                                                          | Deletes a shift (soft or hard delete based on the date).                    |
| `get_print_view`               | `GET`  | `year`, `month`, `employeeId`                                                                                                                         | Returns a clean HTML page of the shift calendar for printing.               |
| `get_dashboard_print_view`     | `GET`  | `year`, `month`                                                                                                                                       | Returns a clean HTML page of the dashboard statistics for printing.         |
