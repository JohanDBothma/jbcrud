<x-app-layout>
    <div class="text-body">
        <div class="py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="mt-1 text-2xl font-medium tracking-tight text-gray-900 sm:text-5xl lg:text-2xl">About JBCRUD and
                this
                documentation</h1>
            <p class="mt-5 text-body">
                This CRUD has been built on Laravel, with the Breeze framework as the quick starter kit. It uses
                TailwindCSS
                for its styling, SQLite for the database. Here I shall outline how to install, why I made certain
                choices,
                explain what components are used for and the resources used.</p>
            <p class="mt-5 text-body">

                To use this system, follow the commands on the Installation section to get the database generated and
                everything running smoothly. This system runs SQLite, thus there is no need for database setup. Ensure
                that
                you run the database migrations, as it will populate the language and interest fields, create the admin
                user, and create 30 dummy users to populate the table.</p>
            <p class="mt-5 text-body">

                This system has a signupform on the front page where all fields are required. Apon successful
                registration,
                the information will be captured on the system and an email will be sent to said user that their data
                has
                been saved. You can then login by going to the login page and using the following details:
                admin@crud.com,
                password. This is prefillled on the login page so no need to remember this.</p>
            <p class="mt-5 text-body">

                On the dashboard, you can view, edit and delete users. You can also navigate to the Languages and
                Interests
                sections to add, edit and delete the respective options.</p>
        </div>

        <div class="py-8 px-4 sm:px-6 lg:px-8">
            <h1 class="mt-1 text-2xl font-medium tracking-tight text-gray-900 sm:text-5xl lg:text-2xl">Recommended Use
            </h1>
            <p class="mt-5 text-body">I recomend to use the system in the following order:</p>
            <ul class="my-4 ml-8 list-decimal text-gray-800">
                <li class="my-6">
                    Input information into the form
                </li>
                <li class="my-6">View the Mail in MailHog</li>
                <li class="my-6">Login to the system. The admin details are prefilled in the email and password fields
                </li>
                <li class="my-6">Search for your user in the Dashboard</li>
                <li class="my-6">Edit your user and update your name and any other information.</li>
                <li class="my-6">Delete a user</li>
                <li class="my-6">Go to the Language section and add a language</li>
                <li class="my-6">Go to the Interest section and edit an interest</li>
                <li class="my-6">Go back to the form and look if your new language and interest is reflecting</li>
            </ul>
        </div>


        <div class="py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="mt-1 text-2xl font-medium tracking-tight text-gray-900 sm:text-5xl lg:text-2xl">TWP</h1>
            <p class="mt-5 text-body">
                I can expand on this simple little system a lot, but I don't really want to as it is time that I'm going
                to spend without pay. From here on out, I am going to use the abbreviation **[TWP]** to reference these
                cases :).</p>
        </div>

        <div class="py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="mt-1 text-2xl font-medium tracking-tight text-gray-900 sm:text-5xl lg:text-2xl">Why SQLite?</h1>
            <p class="mt-5 text-body">

                To ease use the setup up the project on other environments, I decided to use the incredibly light
                weight
                library SQLite. The beauty of this libary is that everything works on installation of this project,
                which includes running the migrations via composer. To access the database via a GUI, I recommend
                using
                <x-inline-link
                    href="https://sqlitebrowser.org/"
                    text="DB Browser for SQLite"
                />
            </p>
        </div>



        <div class="py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="mt-1 text-2xl font-medium tracking-tight text-gray-900 sm:text-5xl lg:text-2xl">Why integers for
                Language and Interests?</h1>
            <p class="mt-5 text-body">
                I prefer making information that is subject to expansion, to be represented by a table of id's and names
                rather than strings to save database entry size, and speed for queries. Thus in the case of Languages, I
                create a Controller to allow functionality to add, update or delete languages as an admin, a Model and
                Migration for data operations and then lastly a Seeder and Factory to have a handful of data on first
                setup.</p>
            <p class="mt-5 text-body">

                Whenever we want to see the Language or Interest on the user, we use the respective relationship
                function on the User model to call the name value for it.</p>
        </div>

        <div class="py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="mt-1 text-2xl font-medium tracking-tight text-gray-900 sm:text-5xl lg:text-2xl">How are emails
                sent?</h1>
            <p class="mt-5 text-body">

                I added creation of Mailhog to be part of the setup, so once you run the sail up command, Mailhog would
                be accessible on port 8025
            </p>
        </div>

        <div class="py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="mt-1 text-2xl font-medium tracking-tight text-gray-900 sm:text-5xl lg:text-2xl">Installation</h1>
            <p class="mt-5 text-body">

                I installed this using
                <x-inline-link
                    href="https://www.docker.com/"
                    text="Docker"
                /> and I used
                <x-inline-link
                    href="https://laravel.com/docs/9.x/sail"
                    text="Laravel Sail"
                /> to speed up the creation process.
            </p>
        </div>

        <div class="py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="mt-1 text-2xl font-medium tracking-tight text-gray-900 sm:text-5xl lg:text-2xl">Steps to install
                on Docker</h1>
            <ul class="my-4 ml-8 list-decimal text-gray-800">
                <li class="my-6">
                    Copy the repository link and add it to a file via the command
                    <pre class="my-2 w-1/2 border-l-2 border-black bg-gray-200 pl-8">git clone https://github.com/JohanDBothma/jbcrud.git</pre>
                </li>
                <li class="my-6">Move to the new directory</li>
                <li class="my-6">Run composer to install everything:
                    <pre class="my-2 w-1/2 border-l-2 border-black bg-gray-200 pl-8">composer install</pre>
                </li>
                <li class="my-6">Run npm to install all packages:
                    <pre class="my-2 w-1/2 border-l-2 border-black bg-gray-200 pl-8">npm install</pre>
                </li>
                <li class="my-6">Setup the database, choose
                    <pre class="my-2 w-1/2 border-l-2 border-black bg-gray-200 pl-8">yes</pre> when prompted to create a new database. It will create a local SQLite
                    database:
                    <pre class="my-2 w-1/2 border-l-2 border-black bg-gray-200 pl-8">php artisan migrate</pre>
                </li>
                <li class="my-6">Seed the datablase with all the needed data run this command
                    <pre class="my-2 w-1/2 border-l-2 border-black bg-gray-200 pl-8">php artisan db:seed</pre>
                </li>
                <li class="my-6">
                    Run Laravel Sail to create a Docker Container
                    <pre class="my-2 w-1/2 border-l-2 border-black bg-gray-200 pl-8">./vendor/bin/sail up</pre>
                </li>
                <li class="my-6">
                    Install php unit testing
                    <pre class="my-2 w-1/2 border-l-2 border-black bg-gray-200 pl-8">./vendor/bin/phpunit</pre>
                </li>
                <li class="my-6">
                    Run a test to ensure everything is passing with
                    <pre class="my-2 w-1/2 border-l-2 border-black bg-gray-200 pl-8">php artisan test</pre>
                </li>
                <li class="my-6">
                    This uses Vite so you can either run this system, or make a build, using
                    <pre class="my-2 w-1/2 border-l-2 border-black bg-gray-200 pl-8">npm run dev</pre> or
                    <pre class="my-2 w-1/2 border-l-2 border-black bg-gray-200 pl-8">npm run build</pre> respectively.
                </li>
            </ul>
            <p class="mt-5 text-body">
                The system should now be available on localhost
            </p>
        </div>

        <div class="py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="mt-1 text-2xl font-medium tracking-tight text-gray-900 sm:text-5xl lg:text-2xl">Laravel
                Components
            </h1>
            <div class="my-8">
                <h2 class="text-xl font-medium tracking-tight text-gray-900 sm:text-3xl lg:text-xl">SortIcon
                </h2>
                <p class="mt-5 text-body">A Laravel component to render the respective sorting icon on the datatables
                    headers.
                </p>
            </div>
            <div class="my-8">
                <h2 class="text-xl font-medium tracking-tight text-gray-900 sm:text-3xl lg:text-xl">InputField
                </h2>
                <p class="mt-5 text-body">
                    This is a Laravel component that is used for basic text, email or number inputs to have all the
                    styling, logic and error code in one place. The private get_icon function is used to pass a
                    paramater of icon, and return the SVG of said icon.
                </p>
            </div>
            <div class="my-8">
                <h2 class="text-xl font-medium tracking-tight text-gray-900 sm:text-3xl lg:text-xl">SelectField
                </h2>
                <p class="mt-5 text-body">
                    A component to easily render a select or multi select field with the help of
                    <x-inline-link
                        href="https://livewire-wireui.com/docs/get-started"
                        text="WireUI"
                    />.
                </p>
            </div>
        </div>

        <div class="py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="mt-1 text-2xl font-medium tracking-tight text-gray-900 sm:text-5xl lg:text-2xl">Livewire
                Components
            </h1>
            <div class="my-8">
                <h2 class="text-xl font-medium tracking-tight text-gray-900 sm:text-3xl lg:text-xl">SignupForm
                </h2>
                <p class="mt-5 text-body">This is a livewire component that is used for the main signup form. It
                    includes validation, calling the mailable class for the success email, and resetting the data once
                    done.
                </p>
            </div>
            <div class="my-8">
                <h2 class="text-xl font-medium tracking-tight text-gray-900 sm:text-3xl lg:text-xl">DataTablesUsers
                </h2>
                <p class="mt-5 text-body">
                    A Livewire component to display all users and gives functionality to interact with said users.The
                    data table can do the following:

                </p>
                <ul class="my-4 ml-8 list-disc text-gray-800">
                    <li class="my-2">search by name, surname and email</li>
                    <li class="my-2">sort name, surname and email by ascending or descending</li>
                    <li class="my-2">persist search query on refresh</li>
                    <li class="my-2">move pagination not run server side, avoiding full page refreshes</li>
                    <li class="my-2">edit a user</li>
                    <li class="my-2">delete a user</li>
                </ul>
            </div>
            <div class="my-8">
                <h2 class="text-xl font-medium tracking-tight text-gray-900 sm:text-3xl lg:text-xl">EditUser
                </h2>
                <p class="mt-5 text-body">
                    A Livewire component that utilizes the
                    <x-inline-link
                        href="https://github.com/wire-elements/modal"
                        text="WireElementsModal"
                    /> to give us a nice edit user modal. This also gives us a callback for the respective datatable to
                    listen when there are changes, and rerender automatically
                </p>
            </div>
            <div class="my-8">
                <h2 class="text-xl font-medium tracking-tight text-gray-900 sm:text-3xl lg:text-xl">DataTablesLanguages
                </h2>
                <p class="mt-5 text-body">
                    A Livewire component to display all languages and gives the same functionality as the main
                    DataTablesUsers, but this is for languages. Here you can add more languages, edit languages and
                    delete them. I did not set up relationships and prevent foreignkey constraints apon deleting a
                    language that is linked to a user, because <strong>TWP</strong>
                </p>
            </div>
            <div class="my-8">
                <h2 class="text-xl font-medium tracking-tight text-gray-900 sm:text-3xl lg:text-xl">CreateLanguage
                </h2>
                <p class="mt-5 text-body">
                    A Livewire component that utilizes the
                    <x-inline-link
                        href="https://github.com/wire-elements/modal"
                        text="WireElementsModal"
                    /> to give us a nice create language modal. This also gives us a callback for the respective
                    datatable to listen when there are changes, and rerender automatically
                </p>
            </div>
            <div class="my-8">
                <h2 class="text-xl font-medium tracking-tight text-gray-900 sm:text-3xl lg:text-xl">EditLanguage
                </h2>
                <p class="mt-5 text-body">
                    A Livewire component that utilizes the
                    <x-inline-link
                        href="https://github.com/wire-elements/modal"
                        text="WireElementsModal"
                    /> to give us a nice edit language modal. This also gives us a callback for the respective datatable
                    to listen when there are changes, and rerender automatically
                </p>
            </div>
            <div class="my-8">
                <h2 class="text-xl font-medium tracking-tight text-gray-900 sm:text-3xl lg:text-xl">DataTablesInterests
                </h2>
                <p class="mt-5 text-body">
                    A Livewire component to display all interests and gives the same functionality as the main
                    DataTablesUsers, but this is for interests. Here you can add more interests, edit interests and
                    delete them. I did not set up relationships and prevent foreignkey constraints apon deleting a
                    language that is linked to a user, because <strong>TWP</strong>
                </p>
            </div>
            <div class="my-8">
                <h2 class="text-xl font-medium tracking-tight text-gray-900 sm:text-3xl lg:text-xl">CreateInterest
                </h2>
                <p class="mt-5 text-body">
                    A Livewire component that utilizes the
                    <x-inline-link
                        href="https://github.com/wire-elements/modal"
                        text="WireElementsModal"
                    /> to give us a nice create interest modal. This also gives us a callback for the respective
                    datatable to listen when there are changes, and rerender automatically
                </p>
            </div>
            <div class="my-8">
                <h2 class="text-xl font-medium tracking-tight text-gray-900 sm:text-3xl lg:text-xl">EditInterest
                </h2>
                <p class="mt-5 text-body">
                    A Livewire component that utilizes the
                    <x-inline-link
                        href="https://github.com/wire-elements/modal"
                        text="WireElementsModal"
                    /> to give us a nice edit interest modal. This also gives us a callback for the respective datatable
                    to listen when there are changes, and rerender automatically
                </p>
            </div>
        </div>

        <div class="py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="mt-1 text-2xl font-medium tracking-tight text-gray-900 sm:text-5xl lg:text-2xl">Testing
            </h1>
            <p class="mt-5 text-body">
                General test cases has been added. I did not add test cases for every single function because
                <strong>TWP</strong>
            </p>
            <p class="mt-5 text-body">

                To test, run php artisan test</p>
            <p class="mt-5 text-body">

                The following 18 cases should succeed
            </p>
            <div class="my-8">
                <h2 class="text-xl font-medium tracking-tight text-gray-900 sm:text-3xl lg:text-xl">AuthenticationTest
                </h2>
                <ul class="my-4 ml-8 list-decimal text-gray-800">
                    <li class="my-2">login screen can be rendered
                    </li>
                    <li class="my-2">users can authenticate using the login screen
                    </li>
                    <li class="my-2">users can not authenticate with invalid password
                    </li>
                </ul>
            </div>
            <div class="my-8">
                <h2 class="text-xl font-medium tracking-tight text-gray-900 sm:text-3xl lg:text-xl">PasswordRestTest
                </h2>
                <ul class="my-4 ml-8 list-decimal text-gray-800">
                    <li class="my-2">reset password link screen can be rendered
                    </li>
                    <li class="my-2">reset password link can be requested
                    </li>
                    <li class="my-2">reset password screen can be rendered
                    </li>
                    <li class="my-2">password can be reset with valid token
                    </li>
                </ul>
            </div>
            <div class="my-8">
                <h2 class="text-xl font-medium tracking-tight text-gray-900 sm:text-3xl lg:text-xl">DataTablesUserTest
                </h2>
                <ul class="my-4 ml-8 list-decimal text-gray-800">
                    <li class="my-2">datatable exists when logged in
                    </li>
                    <li class="my-2">datatable contains specified user
                    </li>
                    <li class="my-2">datatable can search
                    </li>
                    <li class="my-2">datatable can sort ascending
                    </li>
                    <li class="my-2">datatable can sort descending
                    </li>
                </ul>
            </div>
            <div class="my-8">
                <h2 class="text-xl font-medium tracking-tight text-gray-900 sm:text-3xl lg:text-xl">SignupFormTest
                </h2>
                <ul class="my-4 ml-8 list-decimal text-gray-800">
                    <li class="my-2">signup form exists
                    </li>
                    <li class="my-2">signup form submits
                    </li>
                    <li class="my-2">signup form submits and emails
                    </li>
                    <li class="my-2">signup form submits and emails and creates user
                    </li>
                    <li class="my-2">signup form name field is required
                    </li>
                    <li class="my-2">signup form id number field has minimum characters
                    </li>
                </ul>
            </div>
        </div>

        <div class="py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="mt-1 text-2xl font-medium tracking-tight text-gray-900 sm:text-5xl lg:text-2xl">Overview of
                libraries used
            </h1>

            <div class="my-8">
                <h2 class="text-xl font-medium tracking-tight text-gray-900 sm:text-3xl lg:text-xl">General
                </h2>
                <ul class="my-4 ml-8 list-disc text-gray-800">
                    <li class="my-2">
                        <x-inline-link
                            href="https://laravel.com/docs/9.x/sail"
                            text="Laravel Sail"
                        /> - For quick setup via Docker
                    </li>
                    <li class="my-2">
                        <x-inline-link
                            href="https://laravel.com/docs/9.x/starter-kits#laravel-breeze"
                            text="Laravel Breeze"
                        /> - For minimal authentication features, installing Tailwind and getting Vite up and running.
                    </li>
                    <li class="my-2">
                        <x-inline-link
                            href="https://www.sqlite.org/index.html"
                            text="SQLite"
                        /> - For very light weight database queries and data saving. No need for usernames or passwords.
                    </li>
                    <li class="my-2">
                        <x-inline-link
                            href="https://github.com/defstudio/vite-livewire-plugin"
                            text="Vite Livewire"
                        /> - Allows Vite to hot reload blade files
                    </li>
                </ul>
                <h2 class="text-xl font-medium tracking-tight text-gray-900 sm:text-3xl lg:text-xl">Styling and
                    Components
                </h2>
                <ul class="my-4 ml-8 list-disc text-gray-800">
                    <li class="my-2">
                        <x-inline-link
                            href="https://tailwindcss.com/"
                            text="TailwindCSS"
                        /> - For all my beautiful styling needs.
                    </li>
                    <li class="my-2">
                        <x-inline-link
                            href="https://tailwindui.com/components"
                            text="TailwindUI"
                        /> - Quick Tailwind Templates.
                    </li>
                    <li class="my-2">
                        <x-inline-link
                            href="https://fonts.google.com/specimen/Poppins"
                            text="Google Fonts - Poppins"
                        /> - For all headings
                    </li>
                    <li class="my-2">
                        <x-inline-link
                            href="https://fonts.google.com/specimen/Work+Sans"
                            text="Google Fonts - Work Sans"
                        /> - For all other text
                    </li>
                    <li class="my-2">
                        <x-inline-link
                            href="https://livewire-wireui.com/docs/get-started"
                            text="WireUI"
                        />
                    </li>
                    <li class="my-2">
                        <x-inline-link
                            href="https://github.com/wire-elements/modal"
                            text="WireElementsModal"
                        />
                    </li>
                    <li class="my-2">
                        <x-inline-link
                            href="https://alpinejs.dev/"
                            text="AplineJS"
                        />
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
