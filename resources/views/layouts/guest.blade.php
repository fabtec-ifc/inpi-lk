<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet"
        href="https://cdngovbr-ds.estaleiro.serpro.gov.br/design-system/fonts/rawline/css/rawline.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900&amp;display=swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />

    <!-- Styles -->
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body>

    <main id="main" class="d-flex flex-fill">
        <!-- Define a largura da página -->
        <div class="container-lg d-flex justify-content-center">
            <div id="main-content" class="main-content pl-sm-3">
                @hasSection ('login')
                    @yield('login')
                @endif
            </div>
        </div>
    </main>

</body>

</html>
