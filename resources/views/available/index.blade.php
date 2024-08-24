<x-app-layout>
    <div class="container pt-3 lg:px-40 md:px-6 px-5">
        <h1 class="h1">Available</h1>
        <a href="{{ route('availables.create') }}">+ Create New Available</a>
        <div class="mt-5">
            <table class="w-full">
                <thead class=" bg-slate-500 border border-gray-500">
                    <tr>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">ID</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Size</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Color</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Quantity</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Product Name</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Action</th>
                    </tr>
                </thead>
                <tbody class="border border-gray-500">
                    @foreach ($availables as $available)
                        <tr>
                            <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500">
                                {{ $available->id }}</td>
                            <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500">
                                {{ $available->size }}</td>
                            <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500">
                                {{ $available->color }}</td>
                            <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500">
                                {{ $available->quantity }}</td>
                            <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500">
                                {{ $available->product->name }}</td>
                            <td
                                class="p-3 text-sm font-semibold tracking-wide flex items-center justify-center gap-2 border-t border-gray-500">
                                <a href="{{ route('availables.edit', ['available' => $available]) }}"
                                    class=" text-blue-600">Edit</a> |
                                <form action="{{ route('availables.destroy', ['available' => $available]) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this Available?')"
                                    class=" text-red-600">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
