<x-article>
    <x-slot name="title">{{ $article->title }}</x-slot>

    <article class="content">
        {!! $article->body !!}
    </article>

</x-article>
