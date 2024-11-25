<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex justify-center items-center min-h-screen flex-col">
        <p class="p-10 font-extrabold text-5xl">Error 404 | Sorry, we didn't manage to find this page</p>
        <a href="{{ route('getSignin') }}" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition-colors duration-200">Main page</a>
    </div>
</body>
</html>
