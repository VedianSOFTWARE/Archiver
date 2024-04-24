<div>
    <dt class="text-sm font-semibold leading-6 text-gray-900">
        <label for="visibility" class="block">Visibility</label>
    </dt>

    <dd class="mt-1 text-base font-semibold leading-6 text-gray-900">
        <select
            name="visibility"
            id="visibility"
            class="block w-full rounded-md border-0 py-1.5 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
            @foreach($options as $option)
                <option value="{{ $option->name }}">{{ $option->value }}</option>
            @endforeach
        </select>
    </dd>
</div>
