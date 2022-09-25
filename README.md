<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# About JBCRUD and this documentation

This CRUD has been built on Laravel, with the Breeze framework as the quick starter kit. It uses TailwindCSS for its styling, SQLite for the database. Here I shall outline how to install, why I made certain choices, explain what components are used for and the resources used. 

To use this system, follow the commands on the Installation section to get the database generated and everything running smoothly. This system runs SQLite, thus there is no need for database setup. Ensure that you run the database migrations, as it will populate the language and interest fields, create the admin user, and create 30 dummy users to populate the table.

This system has a signupform on the front page where all fields are required. Apon successful registration, the information will be captured on the system and an email will be sent to said user that their data has been saved. You can then login by going to the login page and using the following details: admin@crud.com, password. This is prefillled on the login page so no need to remember this.

On the dashboard, you can view, edit and delete users. You can also navigate to the Languages and Interests sections to add, edit and delete the respective options.

## TWP

I can expand on this simple little system a lot, but I don't really want to as it is time that I'm going to spend without pay. From here on out, I am going to use the abbreviation **[TWP]** to reference these cases :).

## Why SQLite?

To ease use the setup up the project on other environments, I decided to use the incredibly light weight library SQLite. The beauty of this libary is that everything works on installation of this project, which includes running the migrations via composer. To access the database via a GUI, I recommend using **[DB Browser for SQLite](https://sqlitebrowser.org/)**.

## Why integers for Language and Interests?

I prefer making information that is subject to expansion, to be represented by a table of id's and names rather than strings to save database entry size, and speed for queries. Thus in the case of Languages, I create a Controller to allow functionality to add, update or delete languages as an admin, a Model and Migration for data operations and then lastly a Seeder and Factory to have a handful of data on first setup.

Whenever we want to see the Language or Interest on the user, we use the respective relationship function on the User model to call the name value for it.

## How are emails sent?

I added creation of Mailhog to be part of the setup, so once you run the sail up command, Mailhog would be accessible on port 8025

## Installation

I installed this using **[Docker](https://www.docker.com/)** and I used **[Laravel Sail](https://laravel.com/docs/9.x/sail)** to speed up the creation process.

### Steps to install on Docker

Copy the repository link and add it to a file via the command git clone https://github.com/JohanDBothma/jbcrud.git

Move to the new directory

Run composer to install everything: ```composer install```

Run npm to install all packages: ```npm install```

Setup the database, choose ```yes``` when prompted to create a new database. It will create a local SQLite database: ```php artisan migrate```

Seed the datablase with all the needed data run this command ```php artisan db:seed```

Run Laravel Sail to create a Docker Container ```./vendor/bin/sail up```

Install php unit testing ```./vendor/bin/phpunit```

Run a test to ensure everything is passing with ```php artisan test```

This uses Vite so you can either run this system, or make a build, using ```npm run dev``` or ```npm run build``` respectively.

The system should now be available on localhost

## Laravel Components

### SortIcon

A Laravel component to render the respective sorting icon on the datatables headers.

### InputField

This is a Laravel component that is used for basic text, email or number inputs to have all the styling, logic and error code in one place. The private get_icon function is used to pass a paramater of icon, and return the SVG of said icon.

### SelectField

A component to easily render a select or multi select field with the help of **[WireUI](https://livewire-wireui.com/docs/get-started)**

## Livewire Components

### SignupForm

This is a livewire component that is used for the main signup form. It includes validation, calling the mailable class for the success email, and resetting the data once done.

### DataTablesUsers

A Livewire component to display all users and gives functionality to interact with said users.The data table can do the following:

- search by name, surname and email
- sort name, surname and email by ascending or descending
- persist search query on refresh
- move pagination not run server side, avoiding full page refreshes.
- edit a user
- delete a user

### EditUser

A Livewire component that utilizes the **[WireElementsModal](https://github.com/wire-elements/modal)** to give us a nice edit user modal. This also gives us a callback for the respective datatable to listen when there are changes, and rerender automatically

### DataTablesLanguages

A Livewire component to display all languages and gives the same functionality as the main DataTablesUsers, but this is for languages. Here you can add more languages, edit languages and delete them. I did not set up relationships and prevent foreignkey constraints apon deleting a language that is linked to a user, because **TWP**. 

### CreateLanguage

A Livewire component that utilizes the **[WireElementsModal](https://github.com/wire-elements/modal)** to give us a nice create language modal. This also gives us a callback for the respective datatable to listen when there are changes, and rerender automatically

### EditLanguage

A Livewire component that utilizes the **[WireElementsModal](https://github.com/wire-elements/modal)** to give us a nice edit language modal. This also gives us a callback for the respective datatable to listen when there are changes, and rerender automatically

### DataTablesInterests

A Livewire component to display all interests and gives the same functionality as the main DataTablesUsers, but this is for interests. Here you can add more interests, edit interests and delete them. I did not set up relationships and prevent foreignkey constraints apon deleting a language that is linked to a user, because **TWP**. 

### CreateInterest

A Livewire component that utilizes the **[WireElementsModal](https://github.com/wire-elements/modal)** to give us a nice create interest modal. This also gives us a callback for the respective datatable to listen when there are changes, and rerender automatically

### EditInterest

A Livewire component that utilizes the **[WireElementsModal](https://github.com/wire-elements/modal)** to give us a nice edit interest modal. This also gives us a callback for the respective datatable to listen when there are changes, and rerender automatically

### SignupMailable

The mail that is sent on successful signup. The mail will format the languages and interests in human readable data before it sends it off in markdown format, to save time on styling.

## Testing

General test cases has been added. I did not add test cases for every single function because that would take me a very long time without getting paid :)

To test, run php artisan test

The following 18 cases should succeed

### AuthenticationTest

- login screen can be rendered
- users can authenticate using the login screen
- users can not authenticate with invalid password

### PasswordRestTest

- reset password link screen can be rendered
- reset password link can be requested
- reset password screen can be rendered
- password can be reset with valid token

### DataTablesUserTest

- datatable exists when logged in
- datatable contains specified user
- datatable can search
- datatable can sort ascending
- datatable can sort descending

### SignupFormTest

- signup form exists
- signup form submits
- signup form submits and emails
- signup form submits and emails and creates user
- signup form name field is required
- signup form id number field has minimum characters

## Overview of libraries used

### General

- **[Laravel Sail](https://laravel.com/docs/9.x/sail)** - For quick setup via Docker
- **[Laravel Breeze](https://laravel.com/docs/9.x/starter-kits#laravel-breeze)** - For minimal authentication features, installing Tailwind and getting Vite up and running.
- **[SQLite](https://www.sqlite.org/index.html)** - For very light weight database queries and data saving. No need for usernames or passwords.

### Vite
- **[Vite Livewire](https://github.com/defstudio/vite-livewire-plugin)** - Allows Vite to hot reload blade files

### Styling

- **[TailwindCSS](https://tailwindcss.com/)** - For all my beautiful styling needs.
- **[TailwindUI](https://tailwindui.com/components)** - Quick Tailwind Templates.
- **[Blade Heroicons](https://github.com/blade-ui-kit/blade-heroicons)** - For using Heroicons in blade pages that were created by the talented TailwinCSS team.
- **[Google Fonts - Poppins](https://fonts.google.com/specimen/Poppins)** - For all headings
- **[Google Fonts - Work Sans](https://fonts.google.com/specimen/Work+Sans)** - For all other text

### Components

- **[WireUI](https://livewire-wireui.com/docs/get-started)**
- **[WireElementsModal](https://github.com/wire-elements/modal)**
- **[AplineJS](https://alpinejs.dev/)**
