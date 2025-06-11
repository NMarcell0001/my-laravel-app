<x-main>
    <div class="container">
        <div class="columns mt-6 mb-6">
            <div class="column">
                <h1 class="title is-2">All News Articles</h1>
            </div>
            <div class="column">
                @if(auth()->check() && auth()->user()->is_admin)
                    <a href="{{ route('articles.create') }}" class="button is-primary is-pulled-right">
                        Add news
                    </a>
                @endif
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

                        @if(auth()->check() && auth()->user()->is_admin)
                            <div class="level-right">
                                <div class="level-item">
                                    <a href="{{ route('articles.edit', $article) }}" class="button is-warning is-light">
                                        Edit
                                    </a>
                                </div>
                                <div class="level-item">
                                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="margin:0;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button is-danger is-light" type="submit" onclick="return confirm('Are you sure you want to delete this article?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</x-main>
