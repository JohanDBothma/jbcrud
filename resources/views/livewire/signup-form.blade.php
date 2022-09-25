<div>
    <form
        wire:submit.prevent="submitForm"
        action="signup"
        method="POST"
        class="grid grid-cols-1 gap-y-6"
    >
        @csrf
        @if ($notification)
            <div class="rounded-md bg-green-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg
                            class="h-5 w-5 text-green-400"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm leading-5 text-green-800">
                            {{ $notification }}
                        </p>
                    </div>
                    <div class="ml-auto pl-3">
                        <div class="-mx-1.5 -my-1.5">
                            <button
                                type="button"
                                wire:click="$set('notification', null)"
                                class="inline-flex rounded-md p-1.5 text-green-500 transition duration-150 ease-in-out hover:bg-green-100 focus:bg-green-100 focus:outline-none"
                                aria-label="Dismiss"
                            >
                                <svg
                                    class="h-5 w-5"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{ $notification }}
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <x-input-field
                    type="text"
                    name="name"
                    icon="name"
                    placeholder="Name"
                    error='name'
                />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-input-field
                    type="text"
                    name="surname"
                    icon="surname"
                    placeholder="Surname"
                    error='surname'
                />
            </div>
        </div>



        <x-input-field
            type="number"
            name="id_number"
            icon="id_number"
            placeholder="South African ID Number"
            error='id_number'
        />

        <x-input-field
            type="number"
            name="mobile"
            icon="mobile"
            placeholder="Mobile Number"
            error='mobile'
        />

        <x-input-field
            type="email"
            name="email"
            icon="email"
            placeholder="Email Address"
            error='email'
        />

        <x-select-field
            options="languages"
            icon="translate"
            name="language"
            placeholder="Language"
            error='language'
            multiselect="false"
        />

        <x-select-field
            options="interests"
            icon="thumb-up"
            name="interests"
            placeholder="Interests"
            error='interests'
            multiselect="true"
        />

        <x-input-field
            type="date"
            name="dob"
            icon="dob"
            placeholder="Date of Birth"
            error='dob'
        />

        <div class="">
            <span class="inline-flex rounded-md shadow-sm">
                <x-primary-button type="submit">
                    <svg
                        wire:loading
                        wire:target="submitForm"
                        class="-ml-1 mr-3 h-5 w-5 animate-spin text-white"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <circle
                            class="opacity-25"
                            cx="12"
                            cy="12"
                            r="10"
                            stroke="currentColor"
                            stroke-width="4"
                        ></circle>
                        <path
                            class="opacity-75"
                            fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                        >
                        </path>
                    </svg>
                    <span>Submit</span>
                </x-primary-button>
            </span>
        </div>
    </form>
</div>
