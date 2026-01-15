# Refactoring Plan - Modern PHP MVC

## Goal
Refactor the legacy procedural PHP application into a modern, structured MVC application without heavy frameworks. Improve security (password hashing) and UX.

## User Review Required
> [!IMPORTANT]
> **Database Changes**: The `usuario` table will be modified to support longer password hashes (bcrypt). A new `produtos` table script will be created based on the code analysis.
> **Image Storage**: Moving away from BLOB storage for images is recommended for performance, but for this refactor I will stick to BLOB to minimize infrastructure changes unless requested, OR I can switch to file system storage (recommended). **Decision**: I'll switch to File System storage for images for better practice, storing only the path in DB.

## Proposed Structure
```text
project-root/
├── public/                 # Web root
│   ├── index.php           # Entry Point
│   ├── css/
│   ├── js/
│   └── uploads/            # Product images
├── src/
│   ├── Config/
│   │   └── Database.php
│   ├── Controllers/
│   │   ├── AuthController.php
│   │   └── ProductController.php
│   ├── Models/
│   │   ├── User.php
│   │   └── Product.php
│   └── Views/
│       ├── layouts/
│       ├── auth/
│       └── products/
└── database/
    └── schema.sql          # Complete DB Schema
```

## Proposed Changes

### Database
#### [NEW] [schema.sql](file:///c:/Users/do053261/Desktop/Trabalho/projeto%20aplicado/projeto-aplicado-iv/database/schema.sql)
- Recreate `usuario` with `password` VARCHAR(255).
- Create `produtos` table (id, nome, potencia, preco, cor, estoque, imagem_path).

### Source Code (src/)
#### [NEW] [Database.php](file:///c:/Users/do053261/Desktop/Trabalho/projeto%20aplicado/projeto-aplicado-iv/src/Config/Database.php)
- Singleton PDO connection.

#### [NEW] [Models](file:///c:/Users/do053261/Desktop/Trabalho/projeto%20aplicado/projeto-aplicado-iv/src/Models/)
- `User.php`: methods `create`, `findByEmail`, `verifyPassword`.
- `Product.php`: methods `getAll`, `create`.

#### [NEW] [Controllers](file:///c:/Users/do053261/Desktop/Trabalho/projeto%20aplicado/projeto-aplicado-iv/src/Controllers/)
- `AuthController.php`: Handle login/register logic.
- `ProductController.php`: Handle listing and creating products.

### Frontend (public/)
#### [NEW] [index.php](file:///c:/Users/do053261/Desktop/Trabalho/projeto%20aplicado/projeto-aplicado-iv/public/index.php)
- Simple router (switch/case based on `?action=`).

#### [NEW] [Views](file:///c:/Users/do053261/Desktop/Trabalho/projeto%20aplicado/projeto-aplicado-iv/src/Views/)
- Modern HTML5 with CSS Flexbox/Grid.
- specialized views for Login, Register, Product Catalog.

## Verification Plan
1.  **Database Setup**: Run the new SQL script.
2.  **Navigation**: Test flow Home -> Login -> Register -> Login -> Dashboard.
3.  **Features**: Test adding a product (image upload) and viewing the list.
