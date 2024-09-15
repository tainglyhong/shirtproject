<x-app-layout>
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Description
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                                
                                <th scope="col" class="px-6 py-3">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-3 font-medium text-gray-900 dark:text-white">
                                        {{ $product->id }}
                                    </td>
                                    <td class="px-6 py-3 font-medium text-gray-900 dark:text-white">
                                        {{ $product->name }}
                                    </td>
                                    <td class="px-6 py-3 font-medium text-gray-900 dark:text-white">
                                        {{ $product->description }}
                                    </td>
                                    <td class="px-6 py-3 font-medium text-gray-900 dark:text-white">
                                        {{ $product->price }}$
                                    </td>
                                    

                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        <img src="{{ asset($product->image) }}" alt="Product"
                                            class="rounded-circle img-fluid" style="width: 70px; height: 90px;">
                                    
                                    
                                    <td class="px-6 py-3 font-medium text-gray-900 dark:text-white">
                                        <a href="{{ route('Products.edit', $product->id) }}"
                                            class="text-blue-600 hover:text-blue-900">{{ __('Edit') }}</a>

                                        <form action="{{ route('Products.destroy', $product->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="text-red-600 hover:text-red-900"
                                                onclick="return confirm('Are you sure?')">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
