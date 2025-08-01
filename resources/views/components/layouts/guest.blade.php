<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>LST-FMIPA UI</title>

    {{-- import theme --}}
    @include('components.layouts.partials._styles')

    {{-- livewire style --}}
    @livewireStyles
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <section class="content mt-5">
        <div class="container">
            {{ $slot }}
        </div>
    </section>

    {{-- import script --}}
    @include('components.layouts.partials._scripts')

    {{-- livewire script --}}
    @livewireScripts
</body>

</html>