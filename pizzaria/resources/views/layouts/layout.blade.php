<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <title>Autoescola</title>

    <link rel='stylesheet' id='screenr-style-css'
        href='https://www.autoescolacaleffi.com.br/wp-content/themes/screenr/style.css?ver=6.6' type='text/css'
        media='all' />
    <script type="text/javascript"
        src="https://www.autoescolacaleffi.com.br/wp-includes/js/jquery/jquery.min.js?ver=3.7.1"
        id="jquery-core-js"></script>
    <script type="text/javascript"
        src="https://www.autoescolacaleffi.com.br/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.1"
        id="jquery-migrate-js"></script>
    <!-- -------------------------------------------------------------------------------------------------------------------------------------- -->

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('view-title')</title>

    {{-- Importando o arquivo JS com o Vite que contém os arquivos CSS e JS --}}
    @vite('resources/js/app.js')

    {{-- Icons - Iconify: Implementando os ícones no CSS e utilizando a tag <span> para mostrar os ícones --}}

    {{-- Fonte - Roboto --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    {{-- CSS Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    {{-- * Header/Navbar * --}}

    <header class="sticky-header transparent">
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">

                {{-- Logo da Autoescola --}}
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <img class="logo-cel" src="{{ Vite::asset('resources/img/logo/pizzaria-logo.jpeg') }}" class="img-fluid" alt="Logo Pizzaria">
                </a>

                {{-- Theme Changer (Light/Dark) --}}
                <label class="theme-container" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Aparência: Tema Claro" data-bs-delay='{"show":500,"hide":100}' data-bs-trigger="hover">
                    <input checked="checked" type="checkbox" id="chk">
                    <span class="heroicons--sun sun"></span>
                    <span class="ep--moon moon"></span>
                </label>

                {{-- Botão de Menu da Navbar (o botão aparece apenas em dimensões menores de tela) --}}
                <button class="navbar-toggler navbar-menu-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg" aria-controls="navbarOffcanvasLg" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                {{-- Offcanvas Navbar --}}
                <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvasLg" aria-labelledby="navbarOffcanvasLgLabel">

                    {{-- Logo e o Botão de Fechar da Offcanvas (menu lateral) --}}
                    <div class="offcanvas-header">
                        <a class="navbar-brand d-flex align-items-center" href="/">
                            <img src="{{ Vite::asset('resources/img/logo/logo-autoescola.png') }}" class="img-fluid" alt="Logo Autoescola">
                        </a>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    {{-- Corpo da Navbar --}}
                    <div class="offcanvas-body">
                        <ul class="navbar-nav nav-pills d-flex justify-content-end flex-grow-1">

                            <li class="nav-item">
                                {{-- request()->is('home') = se na url a requisição for home, inserir a classe active, se não, conteúdo em branco  --}}
                                <a class="nav-link roboto-regular {{ request()->is('/') ? 'active' : ''}}" aria-current="page" href="/">HOME</a>
                            </li>

                            <hr class="divider divider--header">

                            <li class="nav-item">
                                <a class="nav-link roboto-regular {{ request()->is('sobre-nos') ? 'active' : ''}}" href="/sobre-nos">SOBRE NÓS</a>
                            </li>

                            <hr class="divider divider--header">

                            <li class="nav-item">
                                <a class="nav-link roboto-regular {{ request()->is('services') ? 'active' : ''}}" href="/services">SERVIÇOS</a>
                            </li>

                            <hr class="divider divider--header">

                            <li class="nav-item">
                                <a class="nav-link roboto-regular" id="contatos-link" href="#contatos">LINKS ÚTEIS</a>
                            </li>

                            <hr class="divider divider--header">

                            <li class="nav-item">
                                <a class="nav-link roboto-regular" id="contatos-link" href="#contatos">CONTATOS</a>
                            </li>

                            <hr class="divider divider--header">
                        </ul>
                    </div>
                </div>

            </div>
        </nav>
    </header>

    {{-- * Content * --}}

    <main>
        @yield('content')
        <a href="https://wa.me/19998477799" target="_blank" class="whatsapp-button">
    <div class="pulse-ring"></div>
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" />

</a>

    </main>

    {{-- * Footer * --}}

    <footer id="contatos">
        <div id="footer-area">
            <div class="container-fluid">
                <div class="row">

                    {{-- Logo da Autoescola --}}
                    <div class="col-md-12">
                        <a class="navbar-brand d-flex align-items-center back-logo" href="/">
                            <img src="{{ Vite::asset('resources/img/logo/pizzaria-logo.jpeg') }}" class="img-fluid" alt="Logo Pizzaria">
                        </a>
                    </div>

                    {{-- Divider do footer --}}
                    <hr class="divider divider--footer">

                    {{-- Seção: Onde nos encontrar --}}
                    <div class="col-md-4 col-sm-12 footer-section-center">
                        <h2 class="tnr-bold tnr-title-size tnr-title-size--sm">ONDE NOS ENCONTRAR</h2>
                        <div id="contact-icons" class="d-flex">
                            <a href="https://wa.me/5519998477799"><span class="ic--baseline-whatsapp icon-effect-wobble whatsapp-icon" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="(19) 99847-7799"></span></a>
                            <a href="https://www.instagram.com/autoescolacaleffi/"><span class="mdi--instagram icon-effect-wobble instagram-icon" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="@autoescolacaleffi"></span></a>
                        </div>
                    </div>

                    {{-- Seção: Localização --}}
                    <div class="col-md-4 col-sm-12 footer-section-center">
                        <h2 class="tnr-bold tnr-title-size tnr-title-size--sm">LOCALIZAÇÃO</h2>
                        <div>
                            <p class="roboto-regular">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 24 24" width="16" fill="#ff0000">
                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 3.44 2.72 6.36 6.84 10.19.1.09.23.13.36.13s.26-.04.36-.13C16.28 15.36 19 12.44 19 9c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z" />
                                    </svg>
                                </span>
                                Rua Marechal Bitencourt, 210 - Ribeirão - Amparo - SP
                            </p>
                            <p class="roboto-regular">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 24 24" width="16" fill="#ff0000">
                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 3.44 2.72 6.36 6.84 10.19.1.09.23.13.36.13s.26-.04.36-.13C16.28 15.36 19 12.44 19 9c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5S13.38 11.5 12 11.5z" />
                                    </svg>
                                </span>
                                Rua João Alves, 292 - Jd. São Dimas - Amparo - SP
                            </p>
                        </div>
                    </div>


                    {{-- Seção: Fale conosco --}}
                    <div class="col-md-4 col-sm-12 footer-section-text-center">
                        <h2 class="tnr-bold tnr-title-size tnr-title-size--sm">FALE CONOSCO</h2>
                        <div class="form-inputs">
                            <form id="contactForm" action="/contact" method="POST">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu Nome">
                                    <label for="floatingInput">Nome</label>
                                    <span class="text-danger" id="nomeError"></span>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="tel" name="tel" placeholder="Telefone">
                                    <label for="floatingInput">Telefone</label>
                                    <span class="text-danger" id="telError"></span>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com">
                                    <label for="floatingInput">Email</label>
                                    <span class="text-danger" id="emailError"></span>
                                </div>

                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Mensagem" id="message" name="message"></textarea>
                                    <label for="floatingTextarea">Mensagem</label>
                                    <span class="text-danger" id="messageError"></span>
                                </div>

                                <button class="main-btn main-btn--footer">
                                    <span>ENVIAR MENSAGEM</span>
                                    <span class="fluent--send-28-filled"></span>
                                </button>
                            </form>
                            <div id="successMessage" class="mt-3 text-success" style="display: none;">
                                Email enviado com sucesso!
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    

    {{-- * Botão de Back to Top (voltar ao topo) --}}
    <button id="backToTop" class="back-to-top-btn d-flex align-items-center" title="Voltar ao topo">
        <span class="iconamoon--arrow-up-2"></span>
    </button>

    {{-- JS Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script type="text/javascript"
        src="https://www.autoescolacaleffi.com.br/wp-content/themes/screenr/assets/js/plugins.js?ver=4.0.0"
        id="screenr-plugin-js"></script>

    <script type="text/javascript" id="screenr-theme-js-extra">
        /* <![CDATA[ */
        var Screenr = {
            "ajax_url": "https:\/\/www.autoescolacaleffi.com.br\/wp-admin\/admin-ajax.php",
            "full_screen_slider": "1",
            "header_layout": "transparent",
            "slider_parallax": "1",
            "is_home_front_page": "1",
            "autoplay": "7000",
            "speed": "700",
            "effect": "slide",
            "gallery_enable": "1"
        };
        /* ]]> */
    </script>
    <script type="text/javascript"
        src="https://www.autoescolacaleffi.com.br/wp-content/themes/screenr/assets/js/theme.js?ver=20120206"
        id="screenr-theme-js"></script>
</body>

</html>