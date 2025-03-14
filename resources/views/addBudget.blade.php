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
<body>
    @component('header')
    @endcomponent

    <form class="registerForm border-solid rounded-lg  bg-slate-100 space-y-6" action="{{ route('saveBudget') }}" method="POST">
        @csrf
        <h1 class="registerTitle text-2xl">Каков ваш бюджет?</h1>
        <input name="budget" class="w-full registerEmail border-solid rounded-lg @error('budget') border-red-500 @enderror" type="text" placeholder="Бюджет">
        @error('budget')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        <button class="registerSubmit hover:bg-gray-800 cursor-pointer bg-black text-white rounded-lg p-2 transition-transform duration-100 ease-in-out w-full" type="submit">Submit</button>
    </form>
</body>
</html>
