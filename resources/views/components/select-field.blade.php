<div>
    <label
        for="name"
        class="sr-only"
    >{{ $placeholder }}</label>
    <div class="relative my-1 rounded-md shadow-sm">
        @if ($multiselect)
            <x-select
                icon="{{ $icon }}"
                placeholder="{{ $placeholder }}"
                wire:model="{{ $name }}"
                multiselect={{ $multiselect }}
                :options="$options"
                option-label="name"
                option-value="id"
            >
                @foreach ($options as $o)
                    <x-select.option
                        label="{{ $o->name }}"
                        value="{{ $o->id }}"
                        selected
                    />
                @endforeach
            </x-select>
            {{-- <x-select
                icon="{{ $icon }}"
                placeholder="{{ $placeholder }}"
                wire:model="{{ $name }}"
                multiselect={{ $multiselect }}
                :options="$options"
                option-label="name"
                option-value="id"
            >
                @foreach ($options as $o)
                    <x-select.option
                        label="{{ $o->name }}"
                        value="{{ $o->id }}"
                    />
                @endforeach
            </x-select> --}}
        @else
            <x-select
                icon="{{ $icon }}"
                placeholder="{{ $placeholder }}"
                wire:model.defer="{{ $name }}"
                :options="$options"
                option-label="name"
                option-value="id"
            />
        @endif

        @error($error)
            <div class="pointer-events-none absolute inset-y-0 -top-5 right-3 flex items-center pr-3">
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
</div>
