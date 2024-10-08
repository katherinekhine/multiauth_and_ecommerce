<x-app-layout>
    <div class="container pt-3 lg:px-40 md:px-6 px-5">
        <h1 class="h1">Category</h1>
        <a href="{{route('categories.create')}}">+ Create New Category</a>
        <div class="mt-5">
            <table class="w-full">
                <thead class=" bg-slate-500 border border-gray-500">
                    <tr>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">ID</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Name</th>
                        {{-- <th class=" p-3 text-sm font-semibold tracking-wide text-white">BrandName</th> --}}
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Actions</th>
                    </tr>
                </thead>
                <tbody class="border border-gray-500">
                   @foreach ($categories as $cat)
                       <tr>
                        <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500">{{$cat->id}}</td>
                        <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500">{{$cat->name}}</td>
                        {{-- <td class="p-3 text-sm font-semibold tracking-wide text-center border border-gray-500">{{$cat->brand->name}}</td> --}}
                        <td class="p-3 text-sm font-semibold tracking-wide flex items-center justify-center gap-2 border-t border-gray-500">
                            <a href="{{ route('categories.edit', ['category' => $cat]) }}" class=" text-blue-600">Edit</a> |
                            <form action="{{ route('categories.destroy', ['category' => $cat]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Category?')" class=" text-red-600">
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