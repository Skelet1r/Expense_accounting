<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @component('header')
    @endcomponent

    <h1>jshfhsglsaygfh</h1>

    <form class="registerForm border-solid rounded-lg  bg-slate-100 space-y-6" action="{{ route('resetPassword') }}" method="POST">
        @csrf
        <h1 class="registerTitle text-2xl">Reset Your Password</h1>
        <input name="token" class="w-full registerEmail border-solid rounded-lg @error('token') border-red-500 @enderror" " type="text" placeholder="token" value="{{ old('token') }}">
        @error('token')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        <input name="email" class="w-full registerEmail border-solid rounded-lg @error('email') border-red-500 @enderror" " type="email" placeholder="email" value="{{ old('email') }}">
        @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        <input name="password" class="w-full registerEmail border-solid rounded-lg @error('password') border-red-500 @enderror" " type="password" placeholder="password" value="{{ old('password') }}">
        @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        <button class="registerSubmit hover:bg-gray-800 cursor-pointer bg-black text-white rounded-lg p-2 transition-transform duration-100 ease-in-out w-full" type="submit">Submit</button>
    </form>
</body>
</html>
