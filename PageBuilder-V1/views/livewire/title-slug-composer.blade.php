<div>
    <div class="py-4">

        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
        <div class="mt-2">
            <input type="text" name="title" id="title"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                placeholder="Enter the name of your page" wire:model="title" wire:keydown="makeSlug">

        </div>
    </div>
    <div class="py-4">
        <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Slug</label>
        <div class="mt-2">

            <div
                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                <span class="flex select-none items-center pl-3 text-gray-400 sm:text-sm">{{ url('/') }}/</span>
                <input type="text" name="company-website" id="company-website"
                    class="block flex-1 border-0 bg-transparent py-1.5 pl-0.5 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm"
                    placeholder="enter-the-name-of-your-page"
                    wire:model="slug"
                    wire:keydown.enter="modifySlug">
            </div>
            {{-- <input type="text" name="slug" id="slug"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                placeholder="Enter the name of your page" wire:model="slug" readonly> --}}
        </div>
    </div>
</div>
