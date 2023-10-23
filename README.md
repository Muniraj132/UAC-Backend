# I referred from

click here  <a href="https://github.com/hsdmr/laravel-admin/blob/main/README-tr.md">admin-backend</a>.





## Download with git


If git is not installed on your computer, install the appropriate one for your operating system from this <a href="https://git-scm.com/downloads">link</a>

- Open the terminal screen and paste the code below and run it.

  ```
  git clone https://github.com/Muniraj132/UAC-Backend.git
  ```
## Installation

- Rename the file named .env.example in the project file to .env .
- Save your database information in the appropriate place in the .env file.
- Enter the project file from the terminal and paste the following codes respectively.

  ```
  composer update
  php artisan key:generate
  php artisan storage:link
  php artisan migrate:fresh
  php artisan db:seed
  php artisan optimize
  php artisan serve
  ```

- You can access the project from 'localhost:8000' .

## Reminders

If folder permission errors occur while deploying the project to the server, you can try the following codes.

  ```
  chmod -R o+w storage
  chmod 755 -R laravel-admin
  ```

