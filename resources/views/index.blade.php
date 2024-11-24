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
    @component('header')
    @endcomponent
    <main class="pt-28">
        <div class="p-10">
            <div class="bg-slate-100 rounded-lg flex p-5 h-screen border-solid ">

                <div class="flex-[3] w-3/10 p-5 flex justify-center items-center">
                    <div class="w-80 h-80 bg-slate-400 relative justify-center items-center flex flex-col rounded-lg">
                        <a class="text-1xl font-sans p-5" href="{{ route('getAddBudget') }}">Изменить/добавить бюджет</a>
                        <p class="text-2xl font-bold">{{ number_format($budget, 0, '', ' ') }} рублей</p>
                    </div>
                </div>

                <div class="flex-[7] w-7/10 p-5 bg-slate-200 rounded-lg h-full flex flex-col">
                    <!-- Кнопки Income и Consumption -->
                    <div class="flex space-x-40 justify-center items-center">
                        <a href="{{ route('getIncome') }}" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition-colors duration-200">Income</a>
                        <a href="{{ route('getConsumption') }}" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition-colors duration-200">Consumption</a>
                        <form method="GET" action="{{ route('getIndex') }}">
                            <select class="rounded-lg text-white bg-black hover:to-black" name="sort_order" onchange="this.form.submit()">
                                <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>По возрастанию</option>
                                <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>По убыванию</option>
                            </select>
                        </form>
                    </div>


                    <!-- Контейнер для данных с прокруткой -->
                    <div class="mt-4 flex-grow overflow-y-auto">
                        @foreach ($groupedByDate as $date => $items)
                            <li class="list-none">
                                <!-- Заголовок даты -->
                                <ul class="p-2 m-4 font-bold">{{ $date }}</ul>
                                <!-- Список элементов для данной даты -->
                                @foreach ($items as $dateSort)
                                    <ul class="p-2 m-4 min-h-14 whitespace-normal break-words rounded-lg border-solid border-2 justify-center items-center flex space-x-80 bg-gray-400 font-bold">
                                        <li>{{ $dateSort->name }}</li>
                                        <li>{{ $dateSort->description }}</li>
                                        <li>{{ $dateSort->money }}</li>
                                        <li class="text-red-500">
                                            <form method="POST" action="{{ route('delete', ['expense' => $dateSort->id]) }}">
                                                @csrf
                                                @method('delete')
                                                <input class="hover:cursor-pointer px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-800 transition-colors duration-200" type="submit" value="Delete">
                                            </form>

                                        </li>
                                    </ul>
                                @endforeach
                            </li>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </main>
</body>
</html>
