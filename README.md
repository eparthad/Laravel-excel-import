<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a>
<h1 align="center">Laravel Project Based On Excel Importing</h1>
</p>


<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This Project
This is a simple Excel based project on <b>Laravel</b>. For excel importing here i used <b>"Laravel Excel"</b> package. With help of <b>"Laravel Excel"</b>, we import excel file's data into our database. But in case of large size file upload, php exceed server limit. To solve this problem, we use queue for chunk wise upload. And after completing upload send email to the user.

## Project Goal

- Importing large size CSV file into chunk wise by using <b>Queue</b>.
- Show imported data in list view.
- Add a <b>Store Procedure</b> system.
- Event & Listener
- Sending email to specific user 30s after import complete.


## Project Setup Instruction

- First clone the project
- Set your database & email configration in .env file
- Run "php artisan migrate" for migrating database
- After upload <b>CSV</b> file, run command <b>php artisan queue:work</b> for importing into database
- For email sending after 30s, set email address into <b>afterImport</b> function from "app>imports>CustomersImport.php" 



