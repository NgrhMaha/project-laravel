<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <title>Welcome!</title>
</head>

<body background="{{asset('storage/covers/bg.jpg')}}" class="bg-cover">
  <header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-2 flex-col md:flex-row items-center">
      <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0 px-8">
        <img src="{{asset('storage/covers/rpm.png')}}" width="45" height="45" alt="">
        <span class="ml-3 text-xl">RPM PULSA</span>
      </a>
      <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
        @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 py-4 sm:block px-10">
                    @auth
                    <a href="{{ url('/dashboard') }}" class="mr-5 hover:text-gray-900">Dashboard</a>
                    @else
                    <a href="{{ route('login') }}" class="mr-5 hover:text-gray-900">Login</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}"  class="mr-5 hover:text-gray-900">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
      </nav>
    </div>
  </header>

<!-- Hero -->
  <section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-10 py-24 md:flex-row flex-col items-center">
    <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center ml-10">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900 font-bold">Temukan Kami di 
        <br class="hidden lg:inline-block font-bold">Google Play Store!
      </h1>
      <p class="mb-8 leading-relaxed">Download aplikasi RPM Pulsa dengan cepat di google playstore</p>
      <div class="flex justify-center">
        <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Download</button>
      </div>
    </div>
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mr-10">
      <img src="{{asset('storage/covers/jmbtrn.png')}}" alt="">
    </div>
  </div>
</section>
  

</body>
</html>