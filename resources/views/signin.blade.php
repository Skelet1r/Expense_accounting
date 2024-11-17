<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/css/register.css')
</head>
<body class="relative">
    @component('header')
    @endcomponent


    <form class="registerForm border-solid rounded-lg  bg-slate-100 space-y-6" action="{{ route('signin') }}" method="POST">
        @csrf
        <h1 class="registerTitle text-2xl">Sign in</h1>
        <input name="email" class="w-full registerEmail border-solid rounded-lg @error('email') border-red-500 @enderror" " type="email" placeholder="email" value="{{ old('email') }}">
        @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        <input name="password" class="w-full registerPassword border-solid rounded-lg @error('password') border-red-500 @enderror" type="password" placeholder="password">
        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        <div class="flex items-center justify-between space-x-28">
            <div class="flex items-center gap-2">
                <input type="checkbox" id="remember" name="remember" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-gray-800">
                <label for="remember">Remember me</label>
            </div>
            <a href="#" class="text-sm font-medium text-black hover:text-gray-800">Forgot password?</a>
        </div>
        <button class="registerSubmit hover:bg-gray-800 cursor-pointer bg-black text-white rounded-lg p-2 transition-transform duration-100 ease-in-out w-full" type="submit">Submit</button>
    </form>

</body>
</html>

