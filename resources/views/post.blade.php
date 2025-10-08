<x-layout>
    <div class="flex justify-items-center flex-col items-center mt-10">

        <article class="py-5 max-w-screen-md">
            <h3 class="mb-1 text-3xl tracking-tight font-semibold">{{ $blogs['title'] }}</h3>
            <span class="text-base text-gray-500">
                <a href="#">{{ $blogs['author'] }}</a> | {{ date('d M Y', strtotime($blogs['date'])) }}
            </span>
            <p class="my-3 font-light text-justify">{{ $blogs['body'] }}</p>

            <a href="/posts" class="font-medium text-blue-500 hover:underline">back to all post</a>
        </article>
    </div>
</x-layout>
