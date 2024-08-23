<script src="https://cdn.tailwindcss.com"></script>

<x-app-layout>
   
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">      
          <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8 ">
            <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">

              <div>
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl mb-3">Shopping Cart</h2>

                <div class="space-y-6 "> 
                  @if(@isset($user_cart_items))    
                  @foreach ($user_cart_items as $item) 
                  <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                    <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                      <a href="#" class="w-20 shrink-0 md:order-1">
                        <img class="h-20 w-20 rounded-md" src={{ $item->image }} alt="imac image" />
                      </a>
        
                      <div class="flex items-center justify-between md:order-3 md:justify-end">
                        <div class="flex items-center">
                          
                        </div>
                        <div class="text-end md:order-4 ">
                          <p class="text-base font-bold text-gray-900 dark:text-white">${{ $item->price }}</p>
                        </div>
                        <div class="text-end md:order-4 ml-5 underline dark:text-blue-500">
                          <p class="text-base text-gray-900 dark:text-blue-600">{{ $item->discount }}% off</p>
                        </div>
                      </div>
        
                      <div class="w-full min-w-0 flex-1  space-y-4 md:order-2 ">
                        <a href="{{ route('product.description', $item->id) }}" class="text-base font-medium text-gray-900 hover:underline dark:text-white">{{ $item->name }}</a>
        
                        <div class="flex items-center gap-4">  
                          <form method="post" action="{{ route('cart.destroy', $item->id) }}" >
                            @csrf
                            @method('delete')                      
                          <button  type="submit" class="inline-flex items-center text-sm font-medium text-white py-1.5 px-3 rounded-md bg-red-600 hover:underline ">
                            Remove
                          </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @else
                  <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                    <div class=" text-center text-gray-300">
                      No Products in Cart
                    </div>
                  </div>
                  @endif
                </div>
              </div>
              <div>
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl mb-3 mt-8">Previous Orders</h2>

                <div class="flex flex-wrap gap-5"> 
                  @isset($user_order_items)        
                  @foreach ($user_order_items as $item) 
                  <div class="rounded-lg border w-[23%] border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                    <div class="space-y-4 flex flex-col min-h-54 ">
                      <a href="{{ route('product.description', $item->id) }}" class="">
                        <img class="h-40 w-40 rounded-md" src={{ $item->image }} alt="imac image" />
                      </a>        
                      <div class=" min-w-0 space-y-4 w-40 ">
                        <a href="{{ route('product.description', $item->id) }}" class="text-base hover:text-blue-500 font-medium text-gray-900 hover:underline dark:text-white">
                          {{ substr($item->name, 0, 30) }}...
                        </a>                
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @endisset
                </div>
              </div>
              <div class="hidden xl:mt-8 xl:block">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">People also bought</h3>
                @isset($products)
            <div class="py-4 flex flex-wrap justify-between gap-5">
                @foreach ($products as $item)
                    <div
                        class="rounded-lg h-max border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800 ">
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
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                            </svg>
                                        @else
                                            <svg class="h-4 w-4 text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
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
                                <a href={{ route('cart.store', ['id' => $item->id]) }} type="button"
                                    class="inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium hover:bg-blue-700 text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-blue-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                    </svg>
                                    Add to cart
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
            @endisset
              </div>
            </div>
      
            <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
              <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                <p class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</p>
      
                <div class="space-y-4">
                  <div class="space-y-2">
                    <dl class="flex items-center justify-between gap-4">
                      <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Original price</dt>
                      <dd class="text-base font-medium text-gray-900 dark:text-white">${{ $total_price }}</dd>
                    </dl>
      
                    <dl class="flex items-center justify-between gap-4">
                      <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Savings</dt>
                      <dd class="text-base font-medium text-green-600">-${{ $total_discount }}</dd>
                    </dl>
      
                    <dl class="flex items-center justify-between gap-4">
                      <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Store Pickup</dt>
                      <dd class="text-base font-medium text-gray-900 dark:text-white">$99</dd>
                    </dl>
      
                    <dl class="flex items-center justify-between gap-4">
                      <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                      <dd class="text-base font-medium text-gray-900 dark:text-white">$149</dd>
                    </dl>
                  </div>
      
                  <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                    <dd class="text-base font-bold text-gray-900 dark:text-white">
                      @if ($final_price>0)
                      ${{ $final_price }}
                      @else
                      ${{ $final_price }}
                      @endif
                    </dd>
                  </dl>
                </div>
      <form action="{{ route('cart.checkout') }}" method="POST">
        @csrf
        @method('delete')
                <button onclick="alert('Do you wanna check out?...!');" type="submit" class="flex w-full items-center justify-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Proceed to Checkout</button>
              </form>
                <div class="flex items-center justify-center gap-2">
                  <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> or </span>
                  <a href="/products" title="" class="inline-flex items-center gap-2 text-sm font-medium text-blue-700 underline hover:no-underline dark:text-blue-500">
                    Continue Shopping
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                  </a>
                </div>
              </div>
      
              
            </div>
          </div>
        </div>
      </section>
   
    
    </x-app-layout>

    