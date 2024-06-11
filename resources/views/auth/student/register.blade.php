<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SkillTool | Student Login</title>
</head>

<body class="h-screen bg-gradient-to-t from-blue-500 to-slate-200">

    {{-- header --}}
    <section class=" mb-36">
        <div class="flex justify-center ">
            <h1 class=" text-2xl font-Fjualla font-bold text-green-900">S<span
                    class=" text-4xl font-bold font-roboto text-red-900">K</span>ilL <span
                    class=" text-4xl font-bold font-roboto text-red-900">T</span>ooL</h1>
        </div>
        <div class="flex justify-center mb-5">
            <h3 class="font-roboto font-bold text-blue-900 text-xs uppercase">Horizon Campus</h3>
        </div>

    </section>
    {{-- end of header --}}

    {{-- print errors --}}

    @if ($errors->any())
        {{ $errors }}
    @endif


    {{-- end of print errors --}}
    <div class=" flex justify-center items-center w-auto">

        <form method='POST' action='{{ route('register') }}'>
            @csrf
            <div
                class="border-2 border-red-800 bg-gradient-to-r from-green-600 to-yellow-600 px-10 py-8 rounded-3xl w-auto shadow-xl max-w-sm">
                <div class="space-y-4">
                    <h1 class="text-center text-2xl font-semibold text-black">Student Login</h1>
                    <hr>
                    <div class="flex items-center border-2 py-2 px-3 rounded-md mb-4">
                        <img class="  h-5 mr-1" src="{{ asset('images/person-icon.svg') }}" alt="">
                        <input class="pl-2 outline-none border-none w-full rounded-md" type="text" name="name"
                            value="" placeholder="Name" required />

                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center border-2 py-2 px-3 rounded-md mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-5 w-5 " fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                            <input class="pl-2 outline-none border-none w-full rounded-md" type="email" name="email"
                                value="" placeholder="Email" required />

                        </div>

                        <div class="flex items-center border-2 py-2 px-3 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-5 w-5 " viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <input class="pl-2 outline-none border-none w-full rounded-md" type="password"
                                name="password" id="" placeholder="Password" required />

                        </div>
                        <div class="flex items-center border-2 py-2 px-3 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-5 w-5 " viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <input class="pl-2 outline-none border-none w-full rounded-md" type="password"
                                name="password" id="" placeholder="Confirm Password" required />

                        </div>
                    </div>


                    <button type="submit" value="login" id="login"
                        class="mt-6 w-full py-2.5 px-6 rounded-lg text-sm font-medium text-white hover:bg-blue-800 bg-blue-900">Register</button>
                    <hr>


                </div>
                <div class="pt-6 text-base font-semibold leading-7">
                    <p class="font-sans text-red-600 text-md hover:font-bold hover:text-red-800">
                        <a href="/" class="absolute">&larr; Go back</a>
                    </p>
                </div>
        </form>
    </div>
</body>

</html>
