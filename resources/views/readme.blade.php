<a href="/">back</a>
{{ Illuminate\Mail\Markdown::parse(file_get_contents(base_path() . '/README.md')) }}

{{-- 
<x-app-layout>
    <p><strong>todo:</strong></p>
    <ul>
        <li>update languages</li>
        <li>update interests</li>
    </ul>
    <p><strong>Remember:</strong></p>
    <ul>
        <li>update env!</li>
        <li>unit testing command</li>
        <li>unit testing expected results</li>
        <li>installation command</li>
    </ul>
    <div class="py-16 px-4 sm:py-8 sm:px-6 lg:px-8">
        <p class="mt-1 text-2xl font-medium tracking-tight text-gray-900 sm:text-5xl lg:text-2xl">About JB CRUD</p>
        <p class="mt-5 text-body">
            This CRUD has been built on Laravel, with the Breeze framework as the quick starter kit. It uses
            TailwindCSS
            for
            its styling, SQLite for the database.</p>
    </div>

    <div class="py-8 px-4 sm:py-8 sm:px-6 lg:px-8">
        <p class="mt-1 text-2xl font-medium tracking-tight text-gray-900 sm:text-5xl lg:text-2xl">Why SQLite?</p>
        <p class="mt-5 text-body">
            To ease use the setup up the project on other environments, I decided to use the incredibly light weight
            library
            SQLite. The beauty of this libary is that everything works on installation of this project, which
            includes
            running the migrations via composer. To access the database via a GUI, you can use any database viewing
            software
            such as
            <x-inline-link
                href="https://www.navicat.com/en/products/navicat-for-mysql"
                text="Navicat"
            />,
            <x-inline-link
                href="https://tableplus.com/"
                text="TablePlus"
            /> or the free tool as advised by Laravel,
            <x-inline-link
                href="https://dbngin.com"
                text="DBngin"
            />
        </p>
    </div>


    <div class="py-8 px-4 sm:py-8 sm:px-6 lg:px-8">
        <p class="mt-1 text-2xl font-medium tracking-tight text-gray-900 sm:text-5xl lg:text-2xl">Overview of libraries
            used</p>
        <p class="my-4 text-xl tracking-tight text-gray-900 sm:text-3xl lg:text-xl">General</p>
        <ul>
            <li>
                <x-inline-link
                    href="https://laravel.com/docs/9.x/sail"
                    text="Laravel Sail"
                /> - For quick setup via Docker
            </li>
            <li>
                <x-inline-link
                    href="https://laravel.com/docs/9.x/starter-kits#laravel-breeze"
                    text="Laravel Breeze"
                /> - For minimal authentication features, installing Tailwind and getting Vite up and running
            </li>
        </ul>

    </div>


    <h2>Overview of libraries used</h2>
    <h3>General</h3>
</x-app-layout>

 --}}
