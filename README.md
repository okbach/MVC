# 🚀 MVC and ORM Project

## 💡 Introduction

This project is a practical exercise 👨‍💻 in learning and building a simple **MVC (Model-View-Controller)** architecture and utilizing **ORM (Object-Relational Mapping)** from the **Laravel** framework. It aims to provide a solid foundation 💪 for developing web applications in a structured and maintainable manner.

## 📂 Project Structure

The project adheres to the **MVC** pattern, effectively separating application logic (**Model**) from the user interface (**View**) and control flow (**Controller**). Database interactions are simplified using **Laravel's ORM**.
```bash
.
├── .htaccess
├── composer.json
├── composer.lock
├── env.php
├── index.php
├── LICENSE
├── README.md
├── src
│   ├── bootstrap.php
│   ├── Controllers 🎮
│   │   ├── helpers.php
│   │   └── UserController.php
│   ├── Models 🗃️
│   │   ├── Role.php
│   │   └── User.php
│   └── views 👁️
│       ├── home.php
│       └── users
│           ├── create.php
│           └── index.php
├── start ▶️
│   ├── error_log
│   ├── install.php
│   └── readme.txt
└── test 🧪
├── test.php
└── test2.php
```

### 📝 Explanation of Folders and Files

*   `.htaccess`: Configures **Apache** server settings, such as redirecting requests to `index.php`.
*   `composer.json`: Defines project dependencies, including the **Laravel** framework.
*   `composer.lock`: Contains precise versions of installed dependencies.
*   `env.php`: Holds environment settings, such as database connection details.
*   `index.php`: The main entry point for the application.
*   `src`: Houses the application's source code.
    *   `bootstrap.php`: Initializes the application, loads dependencies, and sets up the database connection.
    *   `Controllers` 🎮: Contains **Controllers** that handle user interactions and application logic.
        *   `helpers.php`: Provides utility functions used throughout the application.
        *   `UserController.php`: An example controller for managing users.
    *   `Models` 🗃️: Contains **Models** representing the application's data.
        *   `Role.php`: Represents a user role.
        *   `User.php`: Represents a user.
    *   `views` 👁️: Contains **Views** responsible for the user interface.
        *   `home.php`: An example of a home page.
        *   `users`: Templates related to users.
            *   `create.php`: A form for creating new users.
            *   `index.php`: Displays a list of users.
*   `start` ▶️: Contains startup scripts.
    *   `error_log`: Logs application errors.
    *   `install.php`: Sets up the project, including the database.
    *   `readme.txt`: Contains initial startup instructions.
*   `test` 🧪: Contains test files.
    *   `test.php`: A general test file.
    *   `test2.php`: Another test file.

## ✅ Requirements

*   **PHP 7.4** or later
*   **Composer**
*   A web server (e.g., **Apache** or **Nginx**)
*   A database (e.g., **MySQL** or **PostgreSQL**)

## ⬇️ Installation

1.  Clone the repository:

    ```bash
    git clone [https://github.com/okbach/MVC.git](https://github.com/okbach/MVC.git)
    ```
2.  Install dependencies via **Composer**:

    ```bash
    composer install
    ```
3.  Execute `install.php` to set up the database:

    ```bash
    php start/install.php
    ```

## ▶️ Usage

1.  Launch the local development server:

    ```bash
    php -S localhost:8000
    ```
2.  Open your web browser and navigate to `http://localhost:8000`.

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1.  Fork the repository.
2.  Create a new branch for your feature.
3.  Commit your changes with clear descriptions.
4.  Submit a pull request.

## 📜 License

This project is licensed under the **MIT License**. See the `LICENSE` file for details.


