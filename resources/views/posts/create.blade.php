<x-layout>
    <section class="px-6 py-8">
        <x-panel class="max-w-sm mx-auto">
            <form method="POST" action="/admin/posts">
                @csrf
                <!-- LABEL PARA O TITULO -->
                <div class="mb-6">
                    <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for="title"
                    >
                        Título
                    </label>
                    <input  class="border border-gray-400 p-2 w-full"
                            type="text"
                            name="title"
                            id="title"
                            value="{{ old('title') }}"
                            required>
                        @error('title')
                            <p class= "text-red-500 text-xs mt-2">{{ $message }} </p>
                        @enderror
                </div>

                <!-- LABEL PARA O SLUG -->
                <div class="mb-6">
                    <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for="slug"
                    >
                        Slug
                    </label>
                    <input  class="border border-gray-400 p-2 w-full"
                            type="text"
                            name="slug"
                            id="slug"
                            value="{{ old('slug') }}"
                            required>
                        @error('slug')
                            <p class= "text-red-500 text-xs mt-2">{{ $message }} </p>
                        @enderror
                </div>
                
                <!-- LABEL PARA O RESUMO -->
                <div class="mb-6">
                    <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for="excerpt"
                    >
                        Resumo
                    </label>

                    <textarea  class="border border-gray-400 p-2 w-full"
                            type="text"
                            name="excerpt"
                            id="excerpt"
                            required
                        >{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                            <p class= "text-red-500 text-xs mt-2">{{ $message }} </p>
                        @enderror
                </div>

                <!-- LABEL PARA O TEXTO -->
                <div class="mb-6">
                    <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for="body"
                    >
                        Texto
                    </label>

                    <textarea  class="border border-gray-400 p-2 w-full"
                            type="textarea"
                            name="body"
                            id="body"
                            required
                        >{{ old('body') }}</textarea>
                        @error('body')
                            <p class= "text-red-500 text-xs mt-2">{{ $message }} </p>
                        @enderror
                </div>

                <!-- LABEL PARA A CATEGORIA -->
                <div class="mb-6">
                    <label  class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            for="category_id"
                    >
                        Categoria
                    </label>

                    <select name="category_id" id="category_id">
                        @foreach (\App\Models\Category::all() as $category)
                            <option 
                                value="{{ $category->id }}" 
                                {{ old('category->id')  == $category->id ? 'selected': ''}}
                                >{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>

                        @error('category')
                            <p class= "text-red-500 text-xs mt-2">{{ $message }} </p>
                        @enderror
                </div>

                <div class="mb-6">
                    <x-button-submit>
                        Publicar
                    </x-button-submit>
                </div>
            </form>
        </x-panel>
    </section>
</x-layout>