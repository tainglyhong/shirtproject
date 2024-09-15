<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Edit Form --}}
                    <form method="post" action="{{ route('Products.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') {{-- For PUT request to update --}}
                        
                        {{-- Hidden input for t_id --}}
                        <input type="hidden" name="p_id" value="{{ auth()->user()->id }}">

                        {{-- Name --}}
                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700">{{ __('Product Name') }}</label>
                            <input type="text" name="name" id="name"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                value="{{ old('name', $product->name) }}" required>
                        </div>

                        {{-- Description --}}
                        <div class="mb-4">
                            <label for="description"
                                class="block text-sm font-medium text-gray-700">{{ __('Product Description') }}</label>
                            <textarea name="description" id="description" cols="100" rows="5" required>{{ old('description', $product->description) }}</textarea>
                        </div>

                        {{-- Price --}}
                        <div class="mb-4">
                            <label for="price"
                                class="block text-sm font-medium text-gray-700">{{ __('Product Price') }}</label>
                            <input type="number" name="price" id="price" step="0.01" min="0"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                value="{{ old('price', $product->price) }}" required>
                        </div>

                        {{-- Image --}}
                        <div class="mb-4">
                            <label for="image"
                                class="block text-sm font-medium text-gray-700">{{ __('Product Image') }}</label>
                            <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            
                            {{-- Display existing image --}}
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="mt-2 w-20 h-20 object-cover">
                            @endif
                        </div>

                        <button type="submit"
                            class="w-full px-4 py-2 border border-black text-black font-semibold rounded-md hover:bg-black hover:text-white transition duration-300">
                            Update Product
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
