<x-app-layout>
    <div class="container pt-3 lg:px-40 md:px-6 px-5">
        <h1 class="h1 mb-3">Create New Brand</h1>
        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="font-medium block">Name:</label>
                <input type="text" id="name" class="border w-full mt-1" placeholder="Enter Name...">
            </div>
            <div class="mb-3">
                <a href="{{route('brands.index')}}" type="button" class="btn-back">Back</a>
                <input type="submit" value="Create" class="btn-create">
            </div>
        </form>
    </div>
</x-app-layout>