Laravel API + Next.js Project
-------------
Login :
email: k@gmail.com
password: 12345678
-------------
🏗️ Architecture

Backend: Laravel 11 (API-only)

Frontend: Next.js 15 + TypeScript + React 19

Styles: TailwindCSS 4

Database: SQLite (for development)

Requirements

PHP 8.2+

Node.js 18+ (recommended 20+)

Composer

NPM or Yarn

Installation

Clone the repository

git clone <your-repo-url>
cd my-lar-project


Install PHP dependencies

composer install


Install Node.js dependencies

npm install


Set up environment

cp .env.example .env
php artisan key:generate


Run migrations

php artisan migrate

🔧 Development
Run in development mode

🎯 Recommended (two terminals):

# Terminal 1: Laravel API server (port 8000)
php artisan serve

# Terminal 2: Next.js dev server (port 3000)
npm run dev


⚡ Quick start (single command):

npm run dev:all

Application access

Next.js Frontend: http://localhost:3000

Laravel API: http://localhost:8000

API test: http://localhost:8000/api/home

📁 Project structure
├── app/Http/Controllers/Api/    # 🔌 Laravel API controllers
│   └── HomeController.php
├── pages/                       # 📄 Next.js pages
│   ├── _app.tsx                # ⚙️ Root Next.js component
│   ├── index.tsx               # 🏠 Home page
│   ├── users/
│   │   └── index.tsx           # 👥 Users page
│   └── products/
│       └── index.tsx           # 📦 Products page
├── styles/                     # 🎨 Global styles
│   └── globals.css             # 🌐 TailwindCSS styles
├── routes/                     # 🛣️ Laravel routes
│   ├── api.php                 # 🔌 API routes
│   └── web.php                 # 🌐 Web routes
├── config/                     # ⚙️ Laravel configuration
├── database/                   # 🗄️ Migrations & factories
└── package.json                # 📦 Next.js dependencies

🧩 Modular system
Available pages

Home 🏠 — Dashboard & navigation

Users 👥 — User management

Products 📦 — Product catalog

Settings ⚙️ — (planned)

Creating a new page
# 1. Create a Next.js page
touch pages/your-page.tsx

# 2. Create an API endpoint in Laravel
php artisan make:controller Api/YourPageController

# 3. Add routes in routes/api.php

# 4. Register the route in api.php

🛠 Technologies

Backend: Laravel 11 (API-only)

Frontend: Next.js 15 + TypeScript + React 19

Styles: TailwindCSS 4

HTTP Client: Fetch API

Architecture: API-first + SSR/CSR hybrid

📝 API
Main endpoints

GET /api/home — Home page data

GET /api/test-message — Test message

GET /api/users — List of users (planned)

GET /api/products — List of products (planned)

Example API response
{
  "message": "Laravel API is working!",
  "frontend": "http://localhost:3000",
  "api": "http://localhost:8000/api"
}

🚨 Troubleshooting
API connection issues
# Check if Laravel server is running
php artisan route:list

# Check API routes
curl http://localhost:8000/api/home

Next.js issues
# Clear Next.js cache
rm -rf .next
npm run dev

Dependency issues
# Reinstall dependencies
rm -rf node_modules package-lock.json
npm install