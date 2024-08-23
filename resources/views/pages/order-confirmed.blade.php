<script src="https://cdn.tailwindcss.com"></script>

<div class="flex justify-center items-center h-screen bg-gray-900">
    <div class=" flex flex-col items-center justify-center bg-gray-800 h-60 w-[30rem] rounded-xl">
        <p class="text-gray-300 font-medium text-xl">Order confirmed.</p>
        <p class="text-gray-200 font-medium text-3xl"> Please check your email...!</p>
        <a class="mt-6 inline-flex items-center rounded-lg bg-bblue-800 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4  focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-bblue-800 dark:focus:ring-blue-800"
         href={{ route('cart.index') }}>Go Back -></a>
    </div>
</div>
