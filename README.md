# Affiliate Marketing App


## Project Description

The project is a virtual affiliate marketing system built with [Laravel 7](https://laravel.com) The features of this project include

1. Registration & login for users.
2. Users Can invite another users through their referral link.
3. Users can know number of registered users through his link.
4. Counter for viewers of registration page.
5. Admin Can show the list of Users Table & Number of referred users .

## Register(Route)

/register

## login(Route)

/login

## admindetails (after dB::seed)

email : firas@gmail.com
password : firas123


## Project Setup(Web Portal)

### Cloning the GitHub Repository.

Clone the repository to your local machine by running the terminal command below.

```bash
git clone https://github.com/FirasDiab/Affiliate-Marketing-App.git
```

### Setup Database

Create your MySQL database and note down the required connection parameters. (DB Host, Username, Password, Name)

### Install Composer Dependencies

Navigate to the project root directory via terminal and run the following command.

```bash
composer install
```

### Create a copy of your .env file

Run the following command

```bash
cp .env.example .env
```

This should create an exact copy of the .env.example file. Name the newly created file .env and update it with your local environment variables (database connection info and others).

### Migrate the database

```bash
php artisan migrate
```

### Send the seeds

```bash
php artisan db:seed
```

### Send the seeds-byclass

```bash
php artisan db:seed --class=RegisterViewSeeder
php artisan db:seed --class=UserSeeder

```
### Open Tinker

```bash
php artisan tinker

```

### Use factory to create users account``

```bash
factory(App\Models\User::class, 50)->create();

```

### Future Possible Updates

The following features are to be added in the next available upgrade of the system.

1. Add extra points system for registration through referral link.
2. Add more features on admin panel
