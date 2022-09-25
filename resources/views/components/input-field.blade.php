<div>
    <label
        for="name"
        class="sr-only"
    >{{ $placeholder }}</label>
    <div class="relative my-1 rounded-md shadow-sm">
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
            {!! $icon !!}
        </div>
        <input
            wire:model="{{ $name }}"
            id="{{ $name }}"
            type="{{ $type }}"
            name="{{ $name }}"
            value="{{ old($name) }}"
            class="@error($error) placeholder-red-300 border border-red-300 @enderror block w-full rounded-md border-gray-300 py-2 pl-8 placeholder-gray-400 shadow-sm focus:border-cyan-400 focus:ring-cyan-400 sm:text-sm"
            placeholder="{{ $placeholder }}"
        >
        @error($error)
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                <!-- Heroicon name: mini/exclamation-circle -->
                <svg
                    class="h-5 w-5 text-red-500"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true"
                >
                    <path
                        fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z"
                        clip-rule="evenodd"
                    />
                </svg>
            </div>
        @enderror
    </div>
    @error($name)
        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>
