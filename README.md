# GreenLoop - Item Sharing Platform

A localized web application for sharing items (tools, clothes, books, and household goods) within neighbourhoods in Barcelona.

---

## 🚀 Getting Started

### Prerequisites
* **PHP 8.x** (with SQLite3 extension enabled)
* **Node.js & npm**

### Installation
1. Clone this repository to your local machine.
2. Ensure your backend connection files are properly configured in the `includes/` directory.

---

## 🛠️ Running the Application

To run the full development environment, you need to start both the PHP database initialization/backend server and your Node.js application.

### 1. Start the PHP Server
Run this command in the directory containing your PHP configuration files to host the local environment and seed the SQLite database:
```bash
php -S localhost:3001