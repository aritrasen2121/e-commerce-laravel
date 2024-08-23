<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
        <header>
            <a href="{{ route('home') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
            </a>
        </header>
    
        <main class="mt-8">
            <h2 class="text-gray-700 dark:text-gray-200">Hi {{ $mailData['name'] }},</h2>
    
            <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
                Thank you for your recent order with <span class="font-semibold ">Eze Buy</span>. We're excited to confirm that your order has been placed successfully.  
            </p>
            Your Orders are
            @isset($mailData['body'])
            <ul>
                @foreach ($mailData['body'] as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
            @endisset
            
            <p class="mt-8 text-gray-600 dark:text-gray-300">
                Thanks, <br>
                Eze Buy
            </p>
        </main>
        
    
        <footer class="mt-8">
           
            <p class="mt-3 text-gray-500 dark:text-gray-400">©  Eze Buy. All Rights Reserved.</p>
        </footer>
    </section>
</body>
</html>


