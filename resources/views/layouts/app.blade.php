<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        @media print {
            .hidden-print{
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <div id="app">

        @php
            /** @var \Bootstrapper\Navbar $navbar */
            $navbar = Navbar::withBrand(config('app.name'), route('admin.dashboard'))->inverse();
            if(Auth::check()){
                $arrayLinks = [
                    ['link' => route('admin.users.index'), 'title' => 'Usuários'],
                ];

                $arrayLinksRight = [
                    [
                        Auth::user()->name,
                        [
                            [
                                'link' => route('logout'),
                                'title' => 'Logout',
                                'linkAttributes' => [
                                        'onclick' => 'event.preventDefault();document.getElementById("logout-form").submit();'
                                ]
                            ]
                        ]
                    ]
                ];

                $navbar->withContent(Navigation::links($arrayLinks))
                        ->withContent(Navigation::links($arrayLinksRight)->right());

                $formLogout = FormBuilder::plain([
                    'id' => 'logout-form',
                    'url' => route('logout'),
                    'method' => 'POST',
                    'style' => 'display:none'
                ]);

                echo form($formLogout);
            }

        @endphp
        {!! $navbar !!}

        @if(Session::has('message'))
            <div class="container hidden-print">
                <div class="row">
                    {!! Alert::success(Session::get('message'))->close() !!}
                </div>

            </div>
        @endif

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
