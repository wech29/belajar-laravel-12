<x-layout :title="$title ?? 'All Post'">

    {{-- @foreach ($posts as $blog)
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
    @endforeach --}}


    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">

        <div class="grid gap-8 lg:grid-cols-3 md:grid-cols-2">
            @foreach ($posts as $blog)
                <article
                    class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center mb-5 text-gray-500">
                        <a href="/posts/category/{{ $blog->category->slug }}">
                            <span
                                class="{{ $blog->category->color }} text-neutral-50 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                {{ $blog->category->name }}
                            </span>
                        </a>
                        <span class="text-sm">{{ $blog->created_at->diffForHumans() }}</span>
                    </div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <a href="/posts/{{ $blog['slug'] }}">{{ $blog->title }}</a>
                    </h2>
                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ Str::limit($blog['body'], 150) }}</p>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-4">
                            <a href="/posts/author/{{ $blog->author->username }}">
                                <span class="font-medium dark:text-white">
                                    {{-- {{ Str::words($blog->author->name, 2, ' ') }}        jika ingin mengambil 2 nama pertama --}}
                                    {{ $blog->author->name }}
                                </span>
                            </a>
                        </div>
                        <a href="/posts/{{ $blog['slug'] }}"
                            class="inline-flex text-xs  items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                            Read more ...
                        </a>
                    </div>
                </article>
            @endforeach

        </div>
    </div>


</x-layout>
