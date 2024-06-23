## Project Schedule Management
Nhóm 18

Hoàng Thị Khuyên

Nguyễn Đại Phát

Project uses Php with laravel framework
# Install version
Install php to version 7.4

xampp older version [Xammp](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/7.4.16/)

# Installation Steps
1.Clone the repository

```shell
git clone https://github.com/PhatNguyen24/Schedule-Management.git
```
Then, Copy file example.env and rename to .env

2.Enable xampp to set up a web development environment and database connection:
- Create a database with the file name schedulemanagement
- Import file schedulemanagement.sql

3.Use the following command to clear the cache that composer has stored

```shell
composer clear-cache
```

4.Before running, clean up the project to avoid problems related to version conflicts or errors during the installation process

- Window

```shell
Remove-Item -Recurse -Force .\vendor
```

- Unix/Linux

```shell
rm -rf vendor
```

5.Install the Composer tool to manage packages for PHP. It allows declaring the libraries on which the project depends and managing (installing and updating) them.

```shell
composer install
```

6.Run a command like:

```shell
php artisan serve
```














