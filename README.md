# 🧾 Invoices Management System

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-8-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" />
  <img src="https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" />
</p>

A comprehensive invoice management application built with **Laravel**, featuring real-time notifications, role-based access, status tracking, and Docker containerization.

---

## ✨ Features

### 🧾 Invoice Management
- **Full CRUD** — Create, read, update, delete invoices
- **Status Tracking** — Paid, unpaid, partially paid with visual indicators
- **Invoice Details** — Client info, line items, totals, due dates
- **Search & Filter** — Find invoices by date, status, client, or amount

### 🔔 Notifications
- **Real-Time Notifications** — Laravel notification system
- **Database Notifications** — Unread notification badges in dashboard
- **Email Notifications** — Auto-triggered on invoice events
- **Notification Center** — View and manage all notifications

### 🔐 Access Control
- **Role-Based Access** — Admin and staff permission levels
- **Protected Actions** — Only authorized users can modify invoices
- **User Management** — Admin can manage staff accounts

### 🐳 Docker Support
- **Docker Compose** — One-command development environment
- **Containerized** — PHP, MySQL, Nginx in containers
- **Portable** — Run anywhere with Docker

### 📊 Dashboard
- **Overview Statistics** — Total invoices, paid/unpaid counts, revenue
- **Recent Activity** — Latest invoice actions
- **Quick Actions** — Create invoice shortcuts

---

## 🛠 Tech Stack

| Category | Technology |
|----------|-----------|
| **Framework** | Laravel 8 |
| **Frontend** | Blade Templates + Bootstrap |
| **Database** | MySQL |
| **Notifications** | Laravel Notifications (DB + Email) |
| **Containerization** | Docker + Docker Compose |
| **Build Tool** | Laravel Mix |

---

## 🚀 Getting Started

### Standard Setup

```bash
git clone https://github.com/510AS/-Invoices_Project.git
cd -Invoices_Project

composer install
npm install && npm run dev

cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

### Docker Setup

```bash
docker-compose up -d
```

---

## 📁 Project Structure

```
app/
├── Http/Controllers/    # Invoice, Dashboard, User controllers
├── Models/              # Invoice, Payment, User
├── Notifications/       # InvoiceCreated, PaymentReceived, etc.
resources/
├── views/
│   ├── invoices/        # Invoice CRUD views
│   ├── dashboard/       # Admin dashboard
│   └── layouts/         # Base templates
routes/
├── web.php              # Web routes
database/
├── migrations/          # Invoice, notification tables
docker-compose.yml       # Container orchestration
```

---

## 📄 License

This project is for educational and portfolio purposes.
