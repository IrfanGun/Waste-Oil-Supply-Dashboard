<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700,800,900">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles()
    </head>
    
    @livewireScripts()
    <body class="font-inter  bg-[#f4f4f6] antialiased">
        <div class="min-h-screen bg-[#f4f4f6] flex">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 ">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <aside class="ml-5 flex-col space-y-4 ">
                   {{-- Calendar --}}
            <div class="w-[250px]">
               @include('layouts.calendar')
            </div>

            <!-- Live Chat Floating -->


            <div x-data="{ open: false }" class=" w-[250px]">
                
             
                <div  x-transition >
                  <livewire:floating-chat>
                </div>
            </div>

            </aside>
         
           
        </div>

        @livewire('wire-elements-modal')
    </body>
   
</html>
