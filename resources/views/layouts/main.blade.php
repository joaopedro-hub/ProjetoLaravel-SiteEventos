<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    {{-- Este é o comentário do blade,não fica visível --}}
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- titulo da página dinâmicamente --}}
        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- Css Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Css da Aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/hdcevents_logo.svg" alt = "HDC Events">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/events/create" class="nav-link">Criar Eventos</a>
                        </li>
                        
                        @auth{{--Se estiver autenticado no sistema --}}
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link">Meus Eventos</a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <a href="/logout" class="nav-link" onclick="event.preventDefault();
                                this.closest('form').submit();">Sair</a>
                            </form>
                        </li>
                        @endauth

                        @guest{{--Se esstiver autenticado, esses itens irão desaparecer --}}
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link">Cadastrar</a>
                        </li>
                        @endguest

                    </ul>
                </div>
            </nav>
        </header>
        {{-- Aqui vai ficar conteúdo da página dinâmicamente --}}
        <main>
            <div class="container-fluid">
                <div class="row">
                    {{-- Flash menssages --}}
                    @if (session('msg'))
                        <p class="msg"> {{ session('msg') }}</p>                        
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
        <footer>
            <p>Eventos &copy; 2021</p>
        </footer>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
