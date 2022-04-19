<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>{{ $title }}</title>
   @include('partials.font')
   @trixassets
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="font-poppins bg-primary text-primary-white">
   <div class="z-30 fixed bg-secondary h-[50px] w-full top-0 bottom-[50px]">
      <header class="flex items-center justify-between relative">
         <div class="flex items-center px-4">
            <button class="block absolute mt-2 left-4" id="hamburger" name="hamburger" type="button">
               <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
               <span class="hamburger-line transition duration-300 ease-in-out"></span>
               <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
            </button>

            <nav id="nav-menu"
               class="hidden absolute py-2 px-2 bg-primary shadow-lg rounded-lg max-w-[150px] w-full top-full">
               <ul class="block">
                  <li class="group">
                     <a href="" class="text-base text hover:text-purpink">Home</a>
                  </li>
                  <li class="group">
                     <a href="" class="text-base text hover:text-purpink">About</a>
                  </li>
                  <li class="group">
                     <a href="" class="text-base text hover:text-purpink">Setting</a>
                  </li>
                  <li class="group">
                     <a href="" class="text-base text hover:text-purpink">Logout</a>
                  </li>
               </ul>
            </nav>

         </div>
         <a href=""><img src="{{ asset('img/CG.png') }}" alt="" class="w-10 mt-2 text-purpink ml-4"></a>
         <a href="">
            <x:feather-search class="w-9 mt-2 text-purpink mr-4" />
         </a>
      </header>
   </div>
   <div class="grid grid-cols-1 gap-x-2 p-4 mt-14 md:grid-cols-[.75fr_1.5fr_.75fr]">
      <div class="">
         <div class="rounded-2xl overflow-hidden">
            @yield('sidebar-row-1') {{-- normally this is the profile --}}
         </div>
         @yield('sidebar-row-2') {{-- normally this is the updates of menfess --}}
      </div>
      <div class="overflow-x-scroll no-scrollbar md:h-[86vh]">
         @yield('content')
      </div>
      <div>
         @yield('notifications')
      </div>
      <div class="z-30 md:hidden">
         <nav class="fixed bottom-0 inset-x-0 bg-primary h-[50px] flex justify-between">
            <a href="" class="ease-linear"><svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                  class="fill-purpink w-9 h-9 mt-2 ml-5 hover:fill-darkpink hover:-translate-y-2 hover:duration-700">
                  <path
                     d="M11.4297 25.9776V22.1441C11.4296 21.1726 12.2196 20.3834 13.198 20.3773H16.7908C17.7736 20.3773 18.5703 21.1683 18.5703 22.1441V22.1441V25.9665C18.5703 26.8091 19.255 27.4939 20.1037 27.5H22.5548C23.6995 27.5029 24.7984 27.0535 25.609 26.2509C26.4195 25.4483 26.875 24.3584 26.875 23.2219V12.3323C26.875 11.4142 26.4651 10.5434 25.7558 9.95438L17.4287 3.34284C15.9731 2.1864 13.8942 2.22376 12.4817 3.43173L4.33377 9.95438C3.59093 10.526 3.14694 11.3995 3.125 12.3323V23.2108C3.125 25.5796 5.05923 27.5 7.44522 27.5H9.84036C10.249 27.5029 10.6419 27.3438 10.9318 27.058C11.2218 26.7722 11.3849 26.3833 11.3849 25.9776H11.4297Z" />
               </svg>
            </a>
            <a href="" class="ease-linear"><svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                  class="fill-purpink w-9 h-9 mt-2 ml-5 hover:fill-darkpink hover:-translate-y-2 hover:duration-700">
                  <path
                     d="M22.3981 17.9001C22.0744 18.2139 21.9256 18.6676 21.9994 19.1126L23.1106 25.2626C23.2044 25.7839 22.9844 26.3114 22.5481 26.6126C22.1206 26.9251 21.5519 26.9626 21.0856 26.7126L15.5494 23.8251C15.3569 23.7226 15.1431 23.6676 14.9244 23.6614H14.5856C14.4681 23.6789 14.3531 23.7164 14.2481 23.7739L8.71061 26.6751C8.43686 26.8126 8.12686 26.8614 7.82311 26.8126C7.08311 26.6726 6.58936 25.9676 6.71061 25.2239L7.82311 19.0739C7.89686 18.6251 7.74811 18.1689 7.42436 17.8501L2.91061 13.4751C2.53311 13.1089 2.40186 12.5589 2.57436 12.0626C2.74186 11.5676 3.16936 11.2064 3.68561 11.1251L9.89811 10.2239C10.3706 10.1751 10.7856 9.88762 10.9981 9.46262L13.7356 3.85012C13.8006 3.72512 13.8844 3.61012 13.9856 3.51262L14.0981 3.42512C14.1569 3.36012 14.2244 3.30637 14.2994 3.26262L14.4356 3.21262L14.6481 3.12512H15.1744C15.6444 3.17387 16.0581 3.45512 16.2744 3.87512L19.0481 9.46262C19.2481 9.87137 19.6369 10.1551 20.0856 10.2239L26.2981 11.1251C26.8231 11.2001 27.2619 11.5626 27.4356 12.0626C27.5994 12.5639 27.4581 13.1139 27.0731 13.4751L22.3981 17.9001Z" />
               </svg>
            </a>
            <a href="" class="ease-linear"><svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                  class="fill-purpink w-9 h-9 mt-2 ml-5 hover:fill-darkpink hover:-translate-y-2 hover:duration-700">
                  <path
                     d="M5.60002 11.2C5.59926 9.45467 6.14215 7.75247 7.15326 6.32989C8.16437 4.90731 9.59348 3.835 11.242 3.26196C11.1782 2.862 11.2019 2.45294 11.3115 2.06302C11.4211 1.6731 11.6139 1.3116 11.8768 1.00345C12.1397 0.695309 12.4662 0.44786 12.834 0.278181C13.2018 0.108501 13.602 0.0206299 14.007 0.0206299C14.4121 0.0206299 14.8123 0.108501 15.18 0.278181C15.5478 0.44786 15.8744 0.695309 16.1373 1.00345C16.4001 1.3116 16.593 1.6731 16.7026 2.06302C16.8122 2.45294 16.8359 2.862 16.772 3.26196C18.418 3.83735 19.844 4.91066 20.8525 6.33304C21.861 7.75542 22.4018 9.45636 22.4 11.2V19.6L26.6 22.4V23.8H1.40002V22.4L5.60002 19.6V11.2ZM16.8 25.2C16.8 25.9426 16.505 26.6548 15.9799 27.1799C15.4548 27.705 14.7426 28 14 28C13.2574 28 12.5452 27.705 12.0201 27.1799C11.495 26.6548 11.2 25.9426 11.2 25.2H16.8Z" />
               </svg>
            </a>
            <a href=""><img src="{{ asset('img/user.jpg') }}" alt=""
                  class="fill-purpink w-9 h-9 mt-2 mr-5 outline outline-purpink hover:fill-darkpink hover:-translate-y-2 hover:duration-700 rounded-full">></a>
         </nav>
      </div>
   </div>
   <script>
      // Hamburger
      const hamburger = document.querySelector('#hamburger');
      const navMenu = document.querySelector('#nav-menu');

      hamburger.addEventListener('click', function() {
         hamburger.classList.toggle('hamburger-active');
         navMenu.classList.toggle('hidden');
      });
   </script>

</body>

</html>
