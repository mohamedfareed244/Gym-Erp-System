# **GymERP 🏋️ – Gym Management System**  

**GymERP** is a **dynamic and modular ERP system** designed to **fully manage gym operations**. Built with **PHP, Bootstrap, and MySQL**, it provides a **complete solution** for handling **memberships, class reservations, personal training, HR management, payroll, and role-based access**.  

The system follows:  
✅ **MVC Architecture** – Ensures **separation of concerns** for maintainability  
✅ **Observer Design Pattern** – Used for **event-driven updates** (e.g., auto-updating salary calculations, notifying users about reservations)  

---

## **Features** 🚀  

✅ **Customer Management** – Register clients, manage memberships, and track attendance  
✅ **Class Booking & Attendance** –  
   - Clients can **book classes**  
   - Coaches **take attendance** and manage schedules  
✅ **Personal Trainer Packages** – Clients can enroll in personalized training sessions  
✅ **HR & Payroll Module** –  
   - Track **employee attendance** (admin records daily attendance)  
   - Monitor **monthly performance targets**  
   - **Auto-calculate salaries** based on attendance & targets  
✅ **Employee Role (Receptionist)** –  
   - Register new clients  
   - Reserve **classes & memberships** for clients  
✅ **Role-Based Access Control (RBAC)** –  
   - **Admin**: Full control over system operations  
   - **Coach**: Manage client **attendance & training**  
   - **Client**: View **class history & bookings**  
   - **Employee (Receptionist)**: Handle **class & membership bookings**  
✅ **ERP Modularity** – Independent modules for **HR, Client Management, and Class Attendance**  
✅ **Dynamic Dashboards** –  
   - **Admin Panel** – Manage clients, employees, memberships, and payroll  
   - **Coach Panel** – Take class attendance and track training schedules  
   - **Client Panel** – View booked classes, personal trainers, and attendance history  
   - **Employee Panel** – Register clients, reserve memberships, and book classes  
✅ **Event-Based Notifications** – Uses **Observer Pattern** to notify users about:  
   - **Successful reservations**  
   - **Class cancellations**  
   - **Payroll updates**  
✅ **Responsive UI** – Built with **Bootstrap** for seamless usage across devices  

---

## **Tech Stack** 🛠  

- **Backend:** PHP (Laravel or Core PHP)  
- **Frontend:** Bootstrap, CSS, JavaScript  
- **Database:** MySQL  
- **Architecture:** **MVC Design Pattern**  
- **Design Pattern:** **Observer Pattern** (Event-driven notifications & salary updates)  

---

## **User Roles & Permissions** 🔑  

| Role   | Privileges |
|--------|----------------------------------------------------------------|
| **Admin**  | Manage **clients, trainers, employees, classes, and payroll** |
| **Coach**  | Record **client attendance**, manage training schedules |
| **Client** | Reserve **classes**, track **attendance**, view personal trainers |
| **Employee (Receptionist)** | Register **clients**, book **classes & memberships** |

---
