<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('Products.store') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Hidden input for t_id --}}
                        <input type="hidden" name="p_id" value="{{ auth()->user()->id }}"> {{-- Example: set t_id to the logged-in user ID --}}


                        {{-- Name for Team 1 --}}
                        <div class="mb-4">
                            <label for="name"
                                class="block text-sm font-medium text-gray-700">{{ __('Product Name') }}</label>
                            <input type="text" name="name" id="name"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        {{-- description --}}
                        <div class="mb-4">
                            <label for="description"
                                class="block text-sm font-medium text-gray-700">{{ __('Product Description') }}</label>
                            <textarea name="description" id="description" cols="100" rows="5"></textarea>
                        </div>

                        {{-- Price --}}
                        <div class="mb-4">
                            <label for="price"
                                class="block text-sm font-medium text-gray-700">{{ __('Product Price') }}</label>
                            <input type="number" name="price" id="price" step="0.01" min="0"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>




                        {{-- Image --}}
                        <div class="mb-4">
                            <label for="image1"
                                class="block text-sm font-medium text-gray-700">{{ __('Product Image') }}</label>
                            <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <button type="submit"
                            class="w-full px-4 py-2 border border-black text-black font-semibold rounded-md hover:bg-black hover:text-white transition duration-300">
                            Submit
                        </button>


                    </form>
                </div>
            </div>
        </div>
        {{-- <div class="flex items-center justify-end mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
                {{ __('Add User') }}
            </button>
        </div> --}}

    </div>
</x-app-layout>
