<x-app-layout>
    <div class="container pt-3 lg:px-40 md:px-6 px-5">
        <h1 class="h1">Available</h1>
        <a href="{{route('availables.create')}}">+ Create New Available</a>
        <div class="mt-5">
            <table class="w-full">
                <thead class=" bg-slate-500 border border-gray-500">
                    <tr>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">ID</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Size</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Color</th>
                        <th class=" p-3 text-sm font-semibold tracking-wide text-white">Quantity</th>
                    </tr>
                </thead>
                <tbody class="border border-gray-500">
                 
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>