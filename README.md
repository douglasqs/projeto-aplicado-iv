# Knowledge Showcase - PHP MVC Catalog System

A modern, refactored PHP application built as a college project to demonstrate proficiency in software architecture, security, and web development.

## 🚀 Overview
This project is a complete reformulation of a legacy catalog system. It transitions from procedural PHP with BLOB storage to a clean **MVC (Model-View-Controller)** architecture using **SQLite** for easy portability and **Bcrypt** for secure user authentication.

## ✨ Key Features
- **MVC Architecture**: Decoupled concerns between logic (Models), display (Views), and routing (Controllers).
- **SQLite Integration**: Zero-configuration database storage using a local `.sqlite` file.
- **Modern Authentication**: Secure login and registration flows with password hashing via `password_hash()`.
- **Product Management**: A dynamic catalog where users can add products with image uploads (stored in the file system).
- **Responsive UI**: A fresh, modern interface built with CSS Flexbox and Grid, ensuring a premium look and feel.

## 🛠️ Tech Stack
- **Language**: PHP 8.1+
- **Database**: SQLite 3 (via PDO)
- **Frontend**: Vanilla CSS, HTML5, Inter Font (Google Fonts)

## 📁 Project Structure
```text
.
├── public/                 # Web server root
│   ├── css/                # Modern styles
│   ├── uploads/            # Product image storage
│   └── index.php           # Entry Point (Router)
├── src/                    # Source code
│   ├── Config/             # Database & environment settings
│   ├── Controllers/        # Business logic & request handling
│   ├── Models/             # Database interactions (User, Product)
│   └── Views/              # Templates & Layouts
├── database/               # SQL scripts & database files
└── walkthrough.md          # Internal project guide
```

## 🚥 How to Run

1. **Prerequisites**: 
   - Ensure you have PHP installed with `pdo_sqlite` and `mbstring` extensions enabled in your `php.ini`.

2. **Start the local server**:
   From the project root directory, run:
   ```bash
   php -S localhost:8000 -t public
   ```

3. **Access the Application**:
   Open your browser and go to `http://localhost:8000`.

---
*Created as a "Projeto Aplicado" for academic purposes.*
