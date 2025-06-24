# 🗓️ Employee Shift Planner

A sample project from my portfolio – a simple web application for clear and efficient planning of employee shifts in a restaurant.

👉 [View the live project](http://smeny.wz.cz:8080)

---

## 🧾 Project Description

The Shift Planner is a practical web application intended for internal use in a restaurant or bistro.  
It allows for easy scheduling of employee shifts. Employees are visually distinguished by color and grouped for better orientation.  
The application is localized in Czech and accessible from mobile devices.

![image](https://github.com/user-attachments/assets/f1030afa-04d5-49df-b32b-ac2797e79c34)

![image](https://github.com/user-attachments/assets/ed2ea27d-45ce-4fb5-b9fb-ba21b91fed42)

---

## 🛠️ Technologies Used

### 💻 Frontend

- **HTML5** – page structure  
- **CSS3** – styling and layout  
- **JavaScript** – interactive features (e.g. calendar handling, AJAX)  
- **FullCalendar.js** – interactive calendar for displaying and managing shifts

### 🔙 Backend

- **PHP (procedural)** – request processing and database interaction  
- **MySQL** – storing shift data

### 🧰 Development Tools

- **AJAX (fetch API)** – dynamic communication between frontend and backend  
- **XAMPP** – local development environment with Apache, MySQL, and PHP  
- **Apache** – web server for running PHP applications

---

## ✨ Application Features

- ✅ View shifts in daily, weekly, or monthly format  
- ✅ Add a new shift (select employee, date, and note)  
- ✅ Color-coded employees for clarity  
- ✅ View shift details in a modal window by clicking a day  
- ✅ Delete shift protected by a simple password  
- ✅ Prevent duplicate entries – cannot assign the same shift twice to the same person  
- ✅ Fully localized into Czech  
- ✅ Intuitive and user-friendly interface, even for non-technical users

---

## 🔒 Password Note

Deleting a shift is protected by a simple password `12345` – for demonstration purposes only.

---

## 📱 Responsiveness & Accessibility

The application is optimized for:

- 🖥️ Desktop and laptop computers  
- 📱 Mobile devices (phones and tablets)

---

## 🛢️ Database Table

```sql
CREATE TABLE shifts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  shift_date DATE NOT NULL,
  note TEXT,
  color VARCHAR(7),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
