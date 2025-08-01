<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Administrator</title>

    {{-- import theme --}}
    @include('components.layouts.partials._styles')

    {{-- livewire style --}}
    @livewireStyles
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        {{-- 1. navbar --}}
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            @include('components.layouts.partials.navbar')
        </nav>

        {{-- 2. sidebar --}}
        <aside class="main-sidebar sidebar-dark-success elevation-0">
            <div class="sidebar">
                @include('components.layouts.partials.sidebar')
            </div>
        </aside>

        {{-- 3. content --}}
        <div class="content-wrapper">
            <section class="content pt-3">
                <div class="container-fluid">
                    {{ $slot }}
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content-body -->
        </div>
        <!-- /.content-wrapper -->

        {{-- 4. footer --}}
        @include('components.layouts.partials.footer')

    </div>
    {{-- wrapper --}}

    {{-- import script --}}
    @include('components.layouts.partials._scripts')

    {{-- livewire script --}}
    @livewireScripts
</body>

</html>