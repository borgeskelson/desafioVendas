<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>App Name - @yield('title')</title>
    <link rel="stylesheet" href="site.css"/>
</head>
<body>
    <header>
        <h1>Meu blog</h1>
    </header>

    <section class="menu">
        <ul>
           <li><a href="#"/>Home</a></li>
            <li><a href="#"/>Banco de Dados</a></li>
           <li><a href="#"/>Programação</a></li>
        </ul>
    </section>

    <section class="content">
        @yield('conteudo')
    </section>

    <section class="author">
        @yield('autor')
    </section>
</body>
</html>