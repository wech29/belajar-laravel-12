<x-layout :title="$title ?? 'All Post'">

    @foreach ($posts as $blog)
        <article class="py-5 max-w-screen-md border-b border-gray-300">
            <a href="/posts/{{ $blog['slug'] }}" class="hover:underline">
                <h3 class="mb-1 text-3xl tracking-tight font-semibold">{{ $blog['title'] }}</h3>
            </a>
            <span class="text-base">
                <span class="text-gray-500">by</span> <a href="/posts/author/{{ $blog->author->username }}"
                    class="hover:underline text-dark">{{ $blog->author->name }}</a>
                <span class="text-gray-500">in</span> <a href="/posts/category/{{ $blog->category->slug }}"
                    class="hover:underline">{{ $blog->category->name }}</a>
            </span>
            <span class="text-base text-gray-500 float-end mt-0">
                 {{ date('d M Y', strtotime($blog['date'])) }}
            </span>

            <p class="my-3 font-light text-justify">{{ Str::limit($blog['body'], 250) }}</p>
            <div class="my-0 text-right">
                <a href="/posts/{{ $blog['slug'] }}" class="font-medium text-blue-500 hover:underline">more >></a>
            </div>

        </article>
    @endforeach
</x-layout>
