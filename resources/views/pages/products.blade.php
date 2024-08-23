<script src="https://cdn.tailwindcss.com"></script>
<x-app-layout>
    <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <!-- Heading & Filters -->
            <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8 ">
                <div>
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                            <li class="inline-flex items-center">
                                <a href="/"
                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-gray-400 dark:hover:text-white">
                                    <svg class="me-2.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                    </svg>
                                    Home
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-gray-400 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m9 5 7 7-7 7" />
                                    </svg>
                                    <a href="/products"
                                        class="ms-1 text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-gray-400 dark:hover:text-white md:ms-2">Products</a>
                                </div>
                            </li>

                        </ol>
                    </nav>
                </div>

            </div>

            @isset($products)
                <div class="flex justify-between">
                    <div class="mb-4 flex flex-wrap w-3/4 gap-5 ">
                        @foreach ($products as $item)
                            <div
                                class="rounded-lg w-[31%] h-max border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800 ">
                                <div class="h-56 w-full rounded-md bg-white border-4">
                                    <img class="mx-auto  h-full  " src={{ $item->image }}
                                        alt="" />
                                </div>
                                <div class="pt-6">
                                    <div class="mb-4 flex items-center justify-between gap-4">
                                        <span
                                            class="my-2 rounded bg-primary-100 px-2.5 py-0.5 font-medium text-primary-800 text-sm dark:bg-blue-700 text-gray-200">upto
                                            {{ $item->discount }} % off </span>

                                        <a href="{{ route('product.description', $item->id) }}"
                                            class="flex items-center justify-end gap-1">
                                            <button type="button" data-tooltip-target="tooltip-quick-look"
                                                class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                                <span class="sr-only"> Quick look </span>
                                                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    width="30" height="30" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="2"
                                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                    <path stroke="currentColor" stroke-width="2"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </button>
                                            <div id="tooltip-quick-look" role="tooltip"
                                                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700"
                                                data-popper-placement="top">
                                                Quick look
                                                <div class="tooltip-arrow" data-popper-arrow=""></div>
                                            </div>
                                        </a>
                                    </div>

                                    <a href="{{ route('product.description', $item->id) }}"
                                        class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">{{ $item->name }}</a>

                                    <div class="mt-2 flex items-center gap-2">
                                        <div class="flex items-center">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if ($i < round($item->rating))
                                                    <svg class="h-4 w-4 text-yellow-400" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                                    </svg>
                                                @else
                                                    <svg class="h-4 w-4 text-gray-400" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                                    </svg>
                                                @endif
                                            @endfor


                                        </div>

                                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $item->rating }}</p>
                                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                            ({{ $item->itemsold }})
                                        </p>
                                    </div>

                                    <ul class="mt-2 flex items-center gap-4">
                                        <li class="flex items-center gap-2">
                                            @if ($item->status=='Best Seller')
                                            <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                        </svg>
                                            @else 
                                            <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                        </svg>                                    
                                            @endif
                                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                {{ $item->status }}
                                            </p>
                                        </li>
                                    </ul>

                                    <div class="mt-4 flex items-center justify-between gap-4">
                                        <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">
                                            ₹{{ number_format($item->price) }}</p>
                                        <a href={{ route('cart.store', $item->id) }} type="button"
                                            class="inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium hover:bg-blue-700 text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-blue-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                            </svg>
                                            Add to cart
                                        </a>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                    <form action='{{ route('products.filter') }}'  method="post" id="filterModal" tabindex="-1"
                        aria-hidden="true" class=" w-1/4 px-4 ">
                        @csrf
                        <!-- Modal content -->
                        <div class="relative rounded-lg bg-white shadow dark:bg-gray-800 ">
                            <div class="flex items-start justify-between rounded-t p-4 md:p-5">
                                <h3 class="text-lg font-normal text-gray-500 dark:text-gray-400">Filters</h3>
                            </div>
                            <div class="px-4 md:px-5 ">
                                
                                <div id="myTabContent">
                                    <div class="flex flex-col gap-4" id="brand" role="tabpanel"
                                        aria-labelledby="brand-tab">
                                        <div class="space-y-2 ">
                                            @isset($distinctCategories)
                                            {{-- @foreach ($distinctCategories as $i)
                                            <p>{{  $i}}</p> 
                                            @endfor --}}
                                            
                                                <h5 class="text-lg font-medium uppercase text-black dark:text-white">Category
                                                </h5>
                                                @foreach ($distinctCategories as $item)
                                                    @isset($checked)
                                                        @if (in_array($item, $checked))
                                                            <div class="flex items-center">
                                                                <input id={{ $item }} type="checkbox" checked
                                                                    name="categories[]" value={{ $item }}
                                                                    class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                                                <label for={{ $item }}
                                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                                    {{ $item }}
                                                                </label>
                                                            </div>

                                                        @else
                                                                <div class="flex items-center">
                                                                    <input id={{ $item }} type="checkbox"
                                                                        name="categories[]" value={{ $item }}
                                                                        class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />

                                                                    <label for={{ $item }}
                                                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                                        {{ $item }}
                                                                    </label>
                                                                </div>
                                                        @endif
                                                    @endisset
                                                @endforeach
                                            @endisset
                                            

                                        </div>
                                        <div class="space-y-2" id="advanced-filters" role="tabpanel"
                                        aria-labelledby="advanced-filters-tab">
                                        <div class="">
                                            <div class="grid grid-cols-2 gap-3 ">
                                                <div>
                                                    <label for="min-price"
                                                        class="block text-sm font-medium text-gray-900 dark:text-white">
                                                        Min Price </label>
                                                    </div>

                                                <div>
                                                    <label for="max-price"
                                                        class="block text-sm font-medium text-gray-900 dark:text-white">
                                                        Max Price </label>
                                                </div>

                                                <div class="col-span-2 flex items-center justify-between space-x-2">
                                                    <input type="number" name="min" id="min-price-input"
                                                        max="20000"
                                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500 "
                                                       
                                                        value={{ $min_price }}
                                                    />

                                                    <div class="shrink-0 text-sm font-medium dark:text-gray-300">to</div>

                                                    <input type="number" id="max-price-input" 
                                                        min="20000" name="max" 
                                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                                        value={{ $max_price }}
                                                        />
                                                </div>
                                            </div>


                                        </div>
                                        {{-- rating --}}
                                        <div class="grid grid-cols-2 gap-4 md:grid-cols-3 ">

                                            <div>
                                                <h6 class="mb-2 text-sm font-medium text-black dark:text-white">Rating</h6>
                                                <div class="space-y-2">

                                                    @for ($i = 5; $i >= 1; $i--)
                                                        <div class="flex items-center">
                                                            <input type="radio" value={{ $i }}
                                                                name="rating"
                                                                @isset($rating)
                                                                @if ($rating==$i)
                                                                checked
                                                            
                                                            @endif
                                                                @endisset
                                                                
                                                                class="h-4 w-4 border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                                            <label class="ml-2 flex items-center">
                                                                @for ($j = 1; $j <= 5; $j++)
                                                                    @if ($j <= $i)
                                                                        <svg aria-hidden="true"
                                                                            class="h-5 w-5 text-yellow-300"
                                                                            fill="currentColor" viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <title>star</title>
                                                                            <path
                                                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                                            </path>
                                                                        </svg>
                                                                    @else
                                                                        <svg aria-hidden="true"
                                                                            class="h-5 w-5 text-gray-300 dark:text-gray-500"
                                                                            fill="currentColor" viewBox="0 0 20 20"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <title>star</title>
                                                                            <path
                                                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                                            </path>
                                                                        </svg>
                                                                    @endif
                                                                @endfor

                                                            </label>
                                                        </div>
                                                    @endfor

                                                </div>
                                            </div>

                                        </div>

                                        </div>
                                        <div class="flex items-center dark:border-gray-600 space-x-4 rounded-b py-4 md:mb-5 ">
                                            <button type="submit"
                                                class="inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-blue-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 hover:bg-blue-700">Apply</button>
                
                                            <a href="{{ route('products.index') }}" 
                                                class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Reset</a>
                                        </div>
                                    </div>
                                </div>

                            
                        
                            </div>

                        
                </div>

                </form>
            </div>
        @endisset

        <div class="w-full text-center">
            <button type="button"
                class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Show
                more</button>
        </div>
        </div>

    </section>

</x-app-layout>
