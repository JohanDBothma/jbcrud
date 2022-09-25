<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 inline-flex items-center rounded-full border border-transparent bg-cyan-500 px-4 py-2 text-sm font-medium text-white
                    ',
    ]) }}
>
    {{ $slot }}
</button>
