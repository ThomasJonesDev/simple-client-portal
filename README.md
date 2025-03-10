# Prerequisites

- PHP
- Composer
- Npm

# Setup
The following commands are for the Bash shell.
### Clone GitHub repo
```console
https://github.com/ThomasJonesDev/simple-client-portal.git
```

### cd into the project
```console
cd simple-client-portal
```

### Install and update composer dependencies
```console
composer install && composer update
```

### Create the .env file
```console
cp .env.example .env
```
Configure the .env files as required.

### Generate app key
```console
php artisan key:generate
```

### Migrate the database
```console
php artisan migrate
```

### Install Node.js dependencies
```console
npm install
```

### Run the project
```console
composer run dev
```

# Populate the database
The project comes with Factories to populate the database with fake data (using Faker).

# Future improvements/features
- Componentize the views, to improve reusability.
- Improve the UI/UX
- Take advantage of the dashboard and home views.
