<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700,800,900">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
        <div >
<body class="bg-gray-300 h-screen w-screen border flex items-center justify-center font-poppins ">
    <div class="bg-white box-content container m-auto rounded-lg w-1/2 p-2 shadow-xl">
        <div class=" font-semibold p-1 ">
            <h1 class="text-[16px] mx-2 mt-1">
                Menunggu Konfirmasi
            </h1>
        </div>
        <div class=" p-1">
            <h2 class=" text-[14px] mx-2 ">Registrasi akun dalam tahap peninjauan administrator. Terima kasih atas perhatiannya</h2>
        </div>
        <div class="flex w-full h-full pt-1">
            <a  class="bg-red-bright text-white text-[14px] font-medium w-full p-1 mb-2 mx-2 mt-2 rounded-lg hover:bg-[#cc0003]" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
                
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST"   
        style="display: none;">
            @csrf
        </form> 
        </div>
       
    </div>
      

    </div>
   
</body>
</html>