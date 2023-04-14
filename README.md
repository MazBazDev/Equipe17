Welcome to Equipe17, a web application that allows you to organize foosball matches and rank players based on their performance. This application was developed during a 48-hour challenge organized by Ynov Campus.

## Prerequisites
- PHP >= 7.4
- Composer
- Node.js
- NPM

## Installation

    1. Clone the repository `git clone https://github.com/your_name/equipe17.git`
    2. Navigate to the project directory `cd equipe17`
    3. Install PHP dependencies `composer install`
    4. Copy the .env.example file to .env `cp .env.example .env`
    5. Generate an application key `php artisan key:generate`
    6. Configure your database settings in the .env file
    7. Migrate the database `php artisan migrate`
    8. Install Javascript dependencies `npm install`
    9. Compile assets `npm run dev`
    10. Start the development server `php artisan serve`

## Features

- User account creation
- Team creation
- Adding players to a team
- Organizing matches between teams
- Ranking system based on the ELO algorithm

## Technologies Used

- Laravel 10
- Jetstream
- Tailwind CSS
- Alpine.js
- MySQL

## Author

This application was developed by [your_name] during the 48-hour challenge organized by Ynov Campus.
