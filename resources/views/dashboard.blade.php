<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


        <div id="home">
                <div class="lg:flex justify-center items-center mb-6">
                  <p class="text-2xl font-semibold mt-2 mb-2 lg:mb-0">Hello, {{ Auth::user()->name }}. Welcome back!</p>
                </div>

                <div class="flex justify-around flex-wrap -mx-3 mb-20">

                    <div class="w-1/2 xl:w-1/4 px-3">
                        <div class="w-full bg-gray-700 border  rounded-lg flex items-center p-6">
                            <svg class="w-16 h-16 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20">
                                <path d="M17.35,2.219h-5.934c-0.115,0-0.225,0.045-0.307,0.128l-8.762,8.762c-0.171,0.168-0.171,0.443,0,0.611l5.933,5.934c0.167,0.171,0.443,0.169,0.612,0l8.762-8.763c0.083-0.083,0.128-0.192,0.128-0.307V2.651C17.781,2.414,17.587,2.219,17.35,2.219M16.916,8.405l-8.332,8.332l-5.321-5.321l8.333-8.332h5.32V8.405z M13.891,4.367c-0.957,0-1.729,0.772-1.729,1.729c0,0.957,0.771,1.729,1.729,1.729s1.729-0.772,1.729-1.729C15.619,5.14,14.848,4.367,13.891,4.367 M14.502,6.708c-0.326,0.326-0.896,0.326-1.223,0c-0.338-0.342-0.338-0.882,0-1.224c0.342-0.337,0.881-0.337,1.223,0C14.84,5.826,14.84,6.366,14.502,6.708"></path>
                              </svg>

                          <div >
                            <p class="font-semibold  text-3xl">{{$totalProducts}}</p>
                            <p>Total Products</p>
                          </div>
                        </div>
                      </div>




                  <div class="w-1/2 xl:w-1/4 px-3">
                    <div class="w-full bg-gray-700 border  rounded-lg flex items-center p-6">
                      <svg class="w-16 h-16 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20">
                        <path d="M14.999,8.543c0,0.229-0.188,0.417-0.416,0.417H5.417C5.187,8.959,5,8.772,5,8.543s0.188-0.417,0.417-0.417h9.167C14.812,8.126,14.999,8.314,14.999,8.543 M12.037,10.213H5.417C5.187,10.213,5,10.4,5,10.63c0,0.229,0.188,0.416,0.417,0.416h6.621c0.229,0,0.416-0.188,0.416-0.416C12.453,10.4,12.266,10.213,12.037,10.213 M14.583,6.046H5.417C5.187,6.046,5,6.233,5,6.463c0,0.229,0.188,0.417,0.417,0.417h9.167c0.229,0,0.416-0.188,0.416-0.417C14.999,6.233,14.812,6.046,14.583,6.046 M17.916,3.542v10c0,0.229-0.188,0.417-0.417,0.417H9.373l-2.829,2.796c-0.117,0.116-0.71,0.297-0.71-0.296v-2.5H2.5c-0.229,0-0.417-0.188-0.417-0.417v-10c0-0.229,0.188-0.417,0.417-0.417h15C17.729,3.126,17.916,3.313,17.916,3.542 M17.083,3.959H2.917v9.167H6.25c0.229,0,0.417,0.187,0.417,0.416v1.919l2.242-2.215c0.079-0.077,0.184-0.12,0.294-0.12h7.881V3.959z"></path>
                      </svg>

                      <div >
                        <p class="font-semibold  text-3xl">{{$totalOrder}}</p>
                        <p>Total Orders</p>
                      </div>
                    </div>
                  </div>



                </div>

                <div class="flex  mx-3">
                  <div class="w-full  px-3">
                    <p class="text-xl font-semibold mb-4">Recent Orders</p>
                    <div>
                        <table class="w-full table-auto">
                    <tr>
                        <th class="border bg-gray-700 px-2 py-2 text-center">Id</th>
                        <th class="border bg-gray-700  px-4 py-2 text-center">Name</th>
                        <th class="border bg-gray-700  px-4 py-2 text-center">Phone</th>
                        <th class="border bg-gray-700  px-4 py-2 text-center">City</th>
                        <th class="border bg-gray-700  px-4 py-2 text-center">Street Address</th>
                       <th class="border bg-gray-700  px-4 py-2 text-center">products</th>

                    </tr>

                    @if(!empty($lastInvoice))
                                <tr>
                                    <td class="border bg-gray-700  text-center px-2 py-2 ">{{$lastInvoice->id}}</td>
                                    <td class="border bg-gray-700  px-4 py-2 ">{{$lastInvoice->name}}</td>
                                    <td class="border bg-gray-700  px-4 py-2 ">{{$lastInvoice->phone}}</td>
                                    <td class="border bg-gray-700  px-4 py-2 ">{{$lastInvoice->address}}</td>
                                    <td class="border bg-gray-700  px-4 py-2 ">{{$lastInvoice->Staddress}}</td>
                                    <td class="border bg-gray-700  px-4 py-2 "><div class="flex gap-2 flex-wrap">
                                            @foreach($lastInvoice->items as $item)
                                                <p class="bg-green-500 text-xs text-white py-1 px-2">{{$item->product->name}}</p>
                                            @endforeach
                                        </div>
                                    </td>

                                </tr>
                    @endif
                        </table>
                    </div>
                  </div>
                </div>
        </div>




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
