<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite('resources/css/header.css')
</head>
<body>
    <header class="fixed inset-x-0 bg-white border-b">
        <div class="flex items-center justify-between p-0 container mx-auto">
            <a href="#" class="flex items-center gap-2 text-3x1">
                <svg class="size-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M64 64C28.7 64 0 92.7 0 128L0 384c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-256c0-35.3-28.7-64-64-64L64 64zm64 320l-64 0 0-64c35.3 0 64 28.7 64 64zM64 192l0-64 64 0c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64l0 64-64 0zm64-192c-35.3 0-64-28.7-64-64l64 0 0 64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/></svg>
                <p class="text-4xl font-extrabold">Expense Accounting</p>
            </a>
            <nav>
                <ul class="flex gap-8">
                    <li>
                        <div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a onclick="event.preventDefault(); this.closest('form').submit();" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition-colors duration-200" href="{{ route('logout') }}">
                                    Logout
                                </a>
                            </form>
                        </div>
                    </li>
                    <li><a class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition-colors  duration-200" href="{{ route('getSignin') }}">
                        Sign In
                        </a>
                    </li>
                    <li>
                        <a class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition-colors duration-200" href="{{ route('getIndex') }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition-colors duration-200" href="{{ route('getRegister') }}">
                            Create Account
                        </a>
                    </li>
                    <li>
                        <div>
                            <a  class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition-colors duration-200" href="{{ route('getForgotPassword') }}">
                                Change Password
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</body>
</html>
