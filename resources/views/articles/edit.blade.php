<x-main>
    <div class="container">
        <div class="columns mt-6 mb-6">
            <div class="column">
                <h1 class="title is-2">Edit Article</h1>
            </div>
        </div>
        <div class="box">

            <form action="{{ route('articles.update', $article->id) }}" method="POST">
                @csrf
                @method('PUT')

                <h2 class="subtitle is-6 is-italic">
                    Update the form fields and click 'Save'
                </h2>

                <div class="field">
                    <label class="label">Title</label>
                    <div class="control">
                        <input class="input" type="text" name="title" required
                               value="{{ old('title', $article->title) }}">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Body</label>
                    <div class="control">
                        <textarea class="textarea" name="body" required>{{ old('body', $article->body) }}</textarea>
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="button is-primary">Save</button>
                    </div>
                    <div class="control">
                        <a href="{{ route('articles.index') }}" class="button is-light">Cancel</a>
                    </div>
                </div>
            </form>

        </div>
    </div>

    @if ($errors->any())
        <article style="margin-top: 2rem" class="message is-danger">
            <div class="message-header">
                <p>Errors</p>
            </div>
            <div class="message-body">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </article>
    @endif
</x-main>
