<x-main>
    <div class="container">
        <div class="columns mt-6 mb-6">
            <div class="column">
                <h1 class="title is-2">All News Articles</h1>
            </div>
            <div class="column">
                @auth
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('articles.create') }}" class="button is-primary is-pulled-right">
                            Add news
                        </a>
                    @endif
                @endauth
            </div>
        </div>

        @foreach($articles as $article)
            <article class="media">
                <div class="content">
                    <div class="level is-mobile">
                        <div class="level-left">
                            <div class="level-item">
                                <a href="{{ route('articles.show', $article) }}">
                                    <strong>{{ $article->title }}</strong>
                                </a>
                            </div>
                            <div class="level-item">
                                <small>{{ $article->published_at }}</small>
                            </div>
                        </div>

                        @auth
                            @if(auth()->user()->is_admin)
                                <div class="flex justify-between mt-4">
                                    <a href="{{ route('articles.edit', $article) }}"
                                       class="flex items-center gap-2 px-4 py-2 bg-blue-100 text-blue-400 rounded-lg hover:bg-blue-200 transition font-medium hover:text-blue-900">
                                        <span class="material-icons text-base">edit</span>Edit
                                    </a>
                                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this article?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="flex items-center gap-2 px-4 py-2 bg-pink-100 hover:text-pink-700 text-pink-400 rounded-lg hover:bg-pink-200 transition font-medium cursor-pointer">
                                            <span class="material-icons text-base">delete</span>Delete
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</x-main>
