<div class="py-6 px-12">
    @if (isset($notification))
        <div class="mt-2 rounded-md bg-green-50 p-4">
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
        <br />
    @endif
    <form
        wire:submit.prevent="update"
        action="update"
        method="PUT"
        class="grid grid-cols-1 gap-y-6"
    >
        @csrf

        <div class="col-span-6 sm:col-span-3">
            <x-input-field
                type="text"
                name="name"
                icon="language"
                placeholder="Name"
                error='name'
            />
        </div>

        <div class="ml-auto flex space-x-4">
            <span class="inline-flex rounded-md shadow-sm">
                <button
                    type="submit"
                    class="inline-flex items-center rounded-full border border-transparent bg-cyan-500 px-4 py-2 text-sm font-medium text-white hover:bg-cyan-700"
                    class="focus:shadow-outline-cyan text-smleading-6 px -6 inline-flex items-center justify-center transition duration-150 ease-in-out hover:bg-cyan-500 focus:border-cyan-700 focus:outline-none active:bg-cyan-700 disabled:opacity-50"
                >
                    <svg
                        wire:loading
                        wire:target="update"
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
                    <span>Update</span>
                </button>
            </span>
            <button
                type="button"
                class="inline-flex items-center rounded-full border border-transparent bg-gray-500 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700"
                class="focus:shadow-outline-cyan text-smleading-6 px -6 inline-flex items-center justify-center transition duration-150 ease-in-out hover:bg-gray-500 focus:border-cyan-700 focus:outline-none active:bg-cyan-700 disabled:opacity-50"
                wire:click="$emit('closeModal')"
            >
                Cancel
            </button>
        </div>
    </form>
</div>
