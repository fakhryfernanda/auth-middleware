<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ isset($title) ? $title : "Home" }}</title>
</head>
<body>
    <div class="py-4 bg-pink-300 mb-24">
        <nav class="mx-auto px-36 flex justify-between">
            <ul class="flex gap-10">
                <li class="text-slate-600 text-lg font-semibold"><a href="/">Home</a></li>
                <li class="text-slate-600 text-lg font-semibold"><a href="/product">Produk</a></li>
                <li class="text-slate-600 text-lg font-semibold"><a href="/blog">Blog</a></li>
            </ul>
            <div class="text-slate-600 text-lg font-semibold">
                @auth
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 block">Logout</button>
                    </form>
                @else
                    <a href="/login">Login</a>
                @endauth
            </div>
        </nav>
    </div>
    @yield('content')
</body>
</html>