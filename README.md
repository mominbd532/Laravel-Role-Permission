# Laravel Role Permission Project

This project is a Laravel-based API designed to manage roles, permissions, and posts. It includes user authentication via Laravel Passport, role-based access control, and permission management for actions like creating, updating, deleting, and viewing posts.

## Prerequisites
Ensure the following are installed before setting up the project:
- PHP 8.0 or higher
- Composer
- MySQL or any database supported by Laravel
- Laravel 11.x
- Docker (optional, for containerized environments)

## Installation
You can set up the project either manually or using Docker for a streamlined environment.
### Option 1: Manual Setup

1. **Clone the Repository**
   Use the following commands to clone the project repository::
 ```
    git clone https://github.com/mominbd532/Laravel-Role-Permission.git
    
    cd Laravel-Role-Permission
 ```
2. **Install Dependencies**
        Install the required PHP dependencies::
 ```
    composer install
 ```

3. **Copy Environment File**
     Copy the example environment file to create your .env file::
```
    cp .env.example .env
 ```
4. **Generate Application Key**
  Generate the Laravel application key::
 ```
  php artisan key:generate
 ```
5. **Configure Database**
    Edit the .env file with your database credentials::
 ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=root
     DB_PASSWORD=
 ```
Replace `your_database_name` with the actual database name.
6. **Run Database Migrations**
   Create the database tables by running:
 ```
    php artisan migrate
 ```
7. **Set Up Passport (API Authentication)**
   Install Laravel Passport:
 ```
    php artisan passport:install
 ```
This will create the necessary encryption keys for Passport.
8. **Seed Data (Optional)**
   Populate the database with default roles, permissions, or other data:
 ```
    php artisan db:seed
 ```
9. **Start the Development Server**
  Start the Laravel development server::
 ```
    php artisan serve
 ```

Access the API at http://127.0.0.1

---
### Option 2: Docker Setup

#### Step 1: Install Docker
- [Docker for Windows](https://docs.docker.com/docker-for-windows/install/)
- [Docker for Mac](https://docs.docker.com/docker-for-mac/install/)
- [Docker for Linux](https://docs.docker.com/install/linux/docker-ce/ubuntu/)
#### Step 2: Clone the Repository
Clone the project repository:
```
git clone https://github.com/mominbd532/Laravel-Role-Permission.git
cd Laravel-Role-Permission
```
#### Step 3:Build and Start Docker Containers
   Build and launch the containers in detached mode:
 ```
    docker compose build
    dockercompose up -d
 ```
#### Step 4: Install Composer Dependencies Inside the Docker Container
Enter the container and install PHP dependencies:

bash
Copy code
:
``` 
     docker exec -it -u root role-permission-laravel-role-permission-laravel_role_permission-1
 ```
 Update Docker Port on .env file


#### Step 5: Accessing the API
Once everything is set up, you should be able to access your API at `http://localhost:3456`.



## Usage
You can now make API requests to the following endpoints (example routes):

- `GET /api/v1/blogs` - View all posts
- `POST /api/v1/blogs` - Create a new post
- `GET /api/v1/posts/{id}` - View a single post
- `PUT /api/v1/posts/{id}` - Update an existing post

  Ensure you pass the appropriate `Authorization` token in the headers for API access.

### API Documents
View the API Documentation:

#### Web Access:
 Navigate to `/docs/api` in your browser.

#### JSON Format:

 Access the OpenAPI JSON documentation at `/docs/api.json`.


## Troubleshooting

#### Permission Issues:
Ensure the correct roles and permissions are assigned to users.
#### Docker Issues: 
Check container logs for detailed error information.

--- 