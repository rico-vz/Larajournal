# Larajournal 📚
Larajournal is a blogging laravel app. 
## Demo

See it work live here: https://lj.rtest.cloud/

https://lj.rtest.cloud/post/16
## Contributing

Contributions are always welcome!

See `contributing.md` for ways to get started.

Please adhere to this project's `code of conduct`.


## Features

- Admin / Author dashboard
- Create / Read / Update / Delete Posts [CRUD]
- WYSIWYG Post editory
- Login / Register
- Auth
- Promote / Demote users to Admin and/or author

Authors can create new posts and edit or delete posts they made themselves.

Administrators can promote/demote accounts, create new posts, edit/delete any posts.


## Screenshots

![App Screenshot](https://i.imgur.com/8Cr7WCM.png)
![App Screenshot](https://i.imgur.com/nICWzZ7.png)
![App Screenshot](https://i.imgur.com/dREzRhM.png)
![App Screenshot](https://i.imgur.com/VSSsJvV.png)
![App Screenshot](https://i.imgur.com/NqcIt5L.png)
![App Screenshot](https://i.imgur.com/tdGpcA5.png)
## Tech Stack

**Client:** Laravel, TailwindCSS

**Server:** Nginx, MySQL 


## Run Locally

Clone the project

```bash
  git clone git@github.com:rico-vz/Larajournal.git
```

Go to the project directory

```bash
  cd Larajournal
```

Install dependencies

```bash
  composer install
```

Set-up the Laravel app

```bash
  php artisan key:generate
```

Copy the .env example to its own file, and edit it to its needs.

```bash
  cp .env.example .env

```

Generate Laravel App Key

```bash
php artisan key:generate
```

Migrate the database

```bash
php artisan migrate
```

Seed the database with posts + 1 admin user

```bash
php artisan db:seed
```
The login details are:

yourname@mail.com:test1234


Finally, serve the website:

```bash
php artisan serve
```
