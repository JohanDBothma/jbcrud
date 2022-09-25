<div>
    <div class="mx-auto flex max-w-7xl justify-between px-4 pb-8 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-medium leading-tight tracking-tight text-body">Interests</h1>

        <button
            class="inline-flex items-center rounded-full border border-transparent bg-cyan-500 px-4 py-2 text-sm font-medium text-white hover:bg-cyan-700"
            wire:click='$emit("openModal", "create-interest")'
        >Add Interest</button>
    </div>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="relative my-1 rounded-md">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-4 w-4 text-gray-400"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                    />
                </svg>

            </div>
            <input
                wire:model="search"
                type="search"
                placeholder="Search for any interest"
                class="w-72 rounded-md border-gray-300 py-2 pl-8 placeholder-gray-400 shadow-sm focus:border-cyan-400 focus:ring-cyan-400 sm:text-sm"
            />
        </div>
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
        @endif
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr class="divide-x divide-gray-200">
                                    <th
                                        scope="col"
                                        class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pl-6"
                                    >ID</th>
                                    <th
                                        scope="col"
                                        class="w-3/4 py-3.5 pl-4 pr-4 text-left text-sm font-normal text-gray-900 sm:pl-6"
                                    >
                                        <div class="flex items-center">
                                            <button wire:click="sortBy('name')">
                                                Name
                                            </button>
                                            <x-sort-icon
                                                field="name"
                                                :sortField="$sortField"
                                                :sortAsc="$sortAsc"
                                            />
                                        </div>
                                    </th>
                                    <th
                                        scope="col"
                                        colspan="2"
                                        class="py-3.5 pl-4 pr-4 text-left text-sm font-semibold text-gray-900 sm:pr-6"
                                    >Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($interests as $i)
                                    <tr class="divide-x divide-gray-200">
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                            {{ $i->id }}</td>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-4 text-sm font-medium text-gray-900 sm:pl-6">
                                            {{ $i->name }}</td>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-6">

                                            <button
                                                class="text-cyan-600 hover:text-cyan-900"
                                                wire:click='$emit("openModal", "edit-interest", @json($i))'
                                            >Edit Interest</button>

                                        </td>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-4 text-sm text-gray-500 sm:pr-6">

                                            <a
                                                href="#"
                                                class="text-red-600 hover:text-red-900"
                                                wire:click="delete({{ $i->id }})"
                                            >
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $interests->links() }}</div>
                </div>

            </div>
        </div>
    </div>
</div>
