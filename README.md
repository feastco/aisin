# AISIN Inventory Management System

> Web-based inventory management — PHP CodeIgniter 4

[![Stack](https://img.shields.io/badge/Stack-PHP%20%7C%20CodeIgniter%204%20%7C%20MySQL-blue?style=flat-square)](#tech-stack)
[![GitHub](https://img.shields.io/badge/GitHub-feastco%2Faisin-181717?style=for-the-badge&logo=github)](https://github.com/feastco/aisin)

Web-based **inventory management application** for spare-part tracking — built with PHP and CodeIgniter 4. Covers CRUD workflows for stock and product data, data validation, and relational MySQL schema design.

## ✨ Features

- **Part master** — CRUD for spare-part catalog (MasterPart, MasterFG, MasterPartNeed)
- **Stock transactions** — inbound/outbound with validation
- **Dashboard** — operational summary
- **Authentication** — login / logout / session
- **Relational schema** — proper MySQL foreign keys & joins
- **Admin theme** — SB Admin template

## 🛠 Tech Stack

| Layer | Technology |
|---|---|
| Language | PHP 8.x |
| Framework | CodeIgniter 4 |
| Database | MySQL / MariaDB |
| Web Server | Apache / Nginx |
| Frontend | SB Admin (Bootstrap 4) |
| Pattern | MVC |

## 📂 Project Structure

```
aisin/
├── app/
│   ├── Controllers/        # Pages, Dashboard, Master*, Part
│   ├── Models/             # DB models
│   └── Views/              # PHP+HTML templates
├── public/                 # Webroot (index.php)
├── writable/               # Logs, cache, uploads
├── composer.json
└── aisin.sql               # Database schema + seed
```

## ⚡ Quick Start

```bash
git clone https://github.com/feastco/aisin.git
cd aisin
composer install
cp env .env
# Configure database credentials in .env

# Import schema
mysql -u root -p your_db < aisin.sql

# Serve
php spark serve
# Open http://localhost:8080
```

## 🗄 Database Schema

Main tables: `users`, `part`, `master_fg`, `master_part_need`, `transactions`. See `aisin.sql` for the full schema.

## 👤 Author

**Fisco Maulana Ikhwan** — Informatics Engineering (D3), Universitas Dian Nuswantoro
- GitHub: [@feastco](https://github.com/feastco)
- LinkedIn: [fiscomaulanaikhwan](https://www.linkedin.com/in/fiscomaulanaikhwan)
