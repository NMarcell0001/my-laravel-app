<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Articles page</title>

        {{-- Compiled assets --}}
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        {{-- Navigation bar --}}
        <nav class="navbar is-primary  has-text-white" >
            <div class="container">
                <div class="navbar-brand">
                    <a href="/" class="navbar-item">
                        <strong>Articles page</strong>
                    </a>
                    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>
                <div class="navbar-menu" id="navMenu">
                    <div class="navbar-start">
                        <a href="{{ route('dashboard') }}"
                           class="navbar-item {{ request()->route()->getName() === 'dashboard' ? "is-active" : "" }}">
                            Home
                        </a>
                        <a href="{{ route('articles.index') }}"
                           class="navbar-item {{ request()->route()->getName() === 'articles.index' ? "is-active" : "" }}">
                            Articles
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        {{-- Main content --}}
        {{ $slot }}

        {{-- Footer --}}
        <footer class="footer">
            <div class="container">
                <div class="columns is-multiline">

                    <div class="column has-text-centered">
                        <div>
                            <a href="/" class="link">Home</a>
                        </div>
                    </div>

                    <div class="column has-text-centered">
                        <div>
                            <a href="https://opensource.org/licenses/MIT" class="link">
                                <i class="fa fa-balance-scale" aria-hidden="true"></i> License: MIT
                            </a>
                        </div>
                    </div>

                </div>

                <div class="content is-small has-text-centered">
                    <p class="">Theme built by <a href="https://www.csrhymes.com">C.S. Rhymes</a> | adapted by <a href="https://github.com/dwaard">BugSlayer</a></p>
                    <p>footer</p>
                </div>
            </div>
        </footer>

    </body>
</html>
