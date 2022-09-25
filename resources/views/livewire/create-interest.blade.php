<div class="py-6 px-12">
    <form
        wire:submit.prevent="create"
        action="create"
        method="POST"
        class="grid grid-cols-1 gap-y-6"
    >
        @csrf

        <div class="col-span-6 sm:col-span-3">
            <x-input-field
                type="text"
                name="name"
                icon="interest"
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
                        wire:target="create"
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
                    <span>Save</span>
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
