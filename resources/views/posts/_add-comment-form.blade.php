@auth
<x-panel class="p-6">
    <form method="POST" action="/posts/{{ $post->slug }}/comments">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">

            <h2 class="ml-4">Deixe seu comentário!</h2>
        </header>
        <div class="mt-6">
            <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5" placeholder="Participe da conversa com os outros usuários!" required></textarea>

            @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
            <x-button-submit>Postar</x-button-submit>
        </div>
    </form>
</x-panel>
@else
<p>
    <a href="/register" class="hover:underline color-blue-500 font-semibold text-blue-500">Registre-se</a> ou realize o seu <a href="/login" class="hover:underline font-semibold text-blue-500">login</a> para participar da conversa!</a>
</p>
@endauth