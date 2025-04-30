<x-layouts.public>

    <ul class="space-y-6 mb-4">
        @foreach ($posts as $post)
            <li>
                <article class="bg-white rounded shadow-lg">
                    <img class="h-72 w-full object-cover object-center" src="{{ $post->image }}" alt="">
                    <div class="px-6 py-2">
                        <h1 class="font-semibold text-xl mb-2">
                            <a href="{{ route('posts.show', $post) }}" class="text-blue-500 hover:text-blue-700">
                                {{ $post->title }}
                            </a>
                        </h1>
                        <div>
                            {{ $post->excert }}
                        </div>
                    </div>
                </article>
            </li>            
        @endforeach
    </ul>
    <div>
        {{ $posts->links() }}
    </div>
    
</x-layouts.public>