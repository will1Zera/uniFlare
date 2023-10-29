<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            @yield('title')
        </title>
        <!-- Importando css -->
        <link rel="stylesheet" href="/css/styles.css">
        <!-- Importando javascript -->
        <script src="/js/scripts.js"></script>
        <!-- Importando bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <!-- Importando font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/uniflare_logo.svg" alt="Logo">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Eventos</a>
                        </li>

                        <!-- Mostra somente para aqueles logados no sistema -->
                        @auth
                            <li class="nav-item">
                                <a href="/events/create" class="nav-link">Criar eventos</a>
                            </li>
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link">Meus eventos</a>
                            </li>
                            <li class="nav-item">
                                <!-- Form necessário para criar o logout -->
                                <form action="/logout" method="POST">
                                    @csrf
                                    <a href="/logout"
                                        class="nav-link"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        Sair
                                    </a>
                                </form>
                            </li>
                        @endauth

                        <!-- Oculta ao estar logado no sistema -->
                        @guest
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

        <main>
            <div class="container-fluid">
                <div class="row">
                    <!-- Verificação da flash message -->
                    @if(session('msg'))
                        <p class="msg">{{ session('msg') }}</p>
                    @endif

                    <!-- Tag que substitui pelos conteúdos das páginas -->
                    @yield('content')
                </div>
            </div>
        </main>
        <footer>
            <p>UniFlare &copy; 2023</p>
        </footer>

        <!-- Ionicons -->
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    </body>
</html>
