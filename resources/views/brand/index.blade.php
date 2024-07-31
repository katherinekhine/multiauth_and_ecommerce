<x-app-layout>
    <div class="container pt-3 lg:px-40 md:px-6 px-5">
        <h1 class="h1">Brands</h1>
        <a href="{{route('brands.create')}}">+ Create New Brand</a>
        <div class="mt-5">
            <table class="w-full">
                <thead class=" bg-slate-500 border border-gray-500">
                    <tr>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">ID</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Name</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Actions</th>
                    </tr>
                </thead>
                <tbody class="border border-gray-500">
                    @foreach ($brands as $brand)
                        <tr>
                            <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500">{{ $brand->id }}</td>
                            <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500">{{ $brand->name }}</td>
                            <td class="p-3 text-sm font-semibold tracking-wide flex items-center justify-center gap-2 border-t border-gray-500">
                                <a href="{{ route('brands.edit', $brand->id) }}" class=" text-blue-600">Edit</a> |
                                <form action="{{ route('brands.destroy', $brand->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this brand?')" class=" text-red-600">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if ($brands->isEmpty())
                        <tr>
                            <td colspan="3">No brands found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>