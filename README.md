<h1 align="center">
  TeamUp: Assemble your dream team in one click
</h1>

## Table of Contents
- [Table of Contents](#table-of-contents)
- [Setup](#setup)
- [How to Setup the webapps](#how-to-setup-the-webapps)
- [Next-features](#next-features)
- [Bug Known](#bug-known)

## Setup 

## How to Setup the webapps

1. Run 
   <br>

    ```
        php artisan migrate
        php artisan db:seed
        php artisan serve
    ```
2. Run this seeder 2 to 3 times (optional)
   <br>
   
   ```
      php artisan db:seed --class=FollowerSeeder
      php artisan db:seed --class=PreferredSportSeeder
   ```
3.  Visit the address or http://127.0.0.1:8000/

## Next-features

1. Assign badge automatically using middleware
2. Make group post of sports or community
3. 

## Bug Known

1. Follower and preferred sport seed as it caused unique constraint error