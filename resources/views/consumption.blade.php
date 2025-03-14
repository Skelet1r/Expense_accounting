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


    <form class="registerForm border-solid rounded-lg  bg-slate-100 space-y-6" action="{{ route('saveConsumption') }}" method="POST">
        @csrf
        <h1 class="registerTitle text-2xl">New consumption</h1>
        <input name="name" class="w-full registerEmail border-solid rounded-lg @error('name') border-red-500 @enderror" type="text" placeholder="Consumption name" value="{{ old('name') }}">
        @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

        <input name="description" class="w-full registerEmail border-solid rounded-lg @error('description') border-red-500 @enderror" type="text" placeholder="Consumption description" value="{{ old('description') }}">
        @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

        <input name="money" class="w-full registerEmail border-solid rounded-lg @error('money') border-red-500 @enderror" type="number" placeholder="Consumption" value="{{ old('money') }}">
        @error('money')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror

        <button class="registerSubmit hover:bg-gray-800 cursor-pointer bg-black text-white rounded-lg p-2 transition-transform duration-100 ease-in-out w-full" type="submit">Submit</button>
    </form>

</body>
</html>
