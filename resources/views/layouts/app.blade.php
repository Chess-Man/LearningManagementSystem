<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Alphine -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
                <main class="md:w-3/4 mx-4 md:mx-4 md:ml-72 py-6 px-4 sm:px-6">
                    {{$slot}}
                </main>

        </div>
        @livewireScripts
    </body>
    {{--sweet alert--}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
            /** Delete Confirmation */
            window.addEventListener('show-delete-confirmation', event =>{
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
                }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmed')
                }
                })
            })

            window.addEventListener('deleted', event=> {
                Swal.fire(
                'Deleted!',
                    event.detail.message,
                'success'
                )
            }) 

            
    </script>
  
</html>
