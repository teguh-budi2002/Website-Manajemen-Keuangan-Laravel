<div class="btn_nav">
    <button
        class="text-white bg-violet-700 hover:bg-violet-800 focus:ring-4 focus:ring-violet-300 font-medium rounded text-sm px-4 py-1 mr-2 dark:bg-violet-600 dark:hover:bg-violet-700 focus:outline-none dark:focus:ring-violet-800"
        type="button" data-drawer-target="drawer-navbarComponent" data-drawer-show="drawer-navbarComponent"
        aria-controls="drawer-navbarComponent">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
    </button>
</div>
<div class="p-2 rounded bg-white flex items-center space-x-2">
    <p class="uppercase text-gray-400 font-semibold">{{ Auth::check() ? auth()->user()->name : "" }}</p>
    <div class="p-1 w-10 h-10 rounded-full ring-2 ring-gray-300 dark:ring-gray-500">
        <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
            </path>
        </svg>
    </div>
</div>


<!-- drawer component -->
<div id="drawer-navbarComponent" class="fixed z-40 h-screen p-4 overflow-y-auto bg-white w-80 dark:bg-gray-800"
    tabindex="-1">
    <div class="logo_web flex justify-center items-end space-x-1 mt-3 mb-3">
      <img src="{{ asset("img/rupiah_logo.png") }}" alt="rupiah_logo" class="w-10 h-auto">
        <p class="text-xl uppercase font-semibold text-blue-500">Manage</p>
    </div>
    <div class="flex justify-between items-center">
        <h5 id="drawer-navbarComponent-label"
            class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Menu
        </h5>
        <button type="button" data-drawer-dismiss="drawer-navbarComponent" aria-controls="drawer-navbarComponent"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover rounded-lg text-sm p-1.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
    </div>
    <div class="py-4 overflow-y-auto">
        <ul class="space-y-2 uppercase text-gray-400">
            <li>
                <a href="{{ URL('dashboard') }}"
                    class="flex items-center p-2 text-base font-normal rounded-md dark:text-white hover:bg-gray-100 hover:text-violet-500 hover:border-l-4 hover:border-violet-500 dark:hover:bg-gray-700 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="w-6 h-6 text-violet-500 dark:text-gray-400 group-hover dark:group-hover:text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base font-normal transition-all duration-300 rounded-md group hover:bg-gray-100 hover:text-violet-500 hover:border-l-4 hover:border-violet-500 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="flex-shrink-0 w-6 h-6 text-violet-500 group-hover dark:text-gray-400 dark:group-hover:text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3" />
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">CASH MANAGE</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ URL('category') }}"
                            class="flex items-center w-full p-2 text-base font-normal transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">kategori</a>
                    </li>
                    <li>
                        <a href="{{ URL('cash') }}"
                            class="flex items-center w-full p-2 text-base font-normal transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">uang
                            masuk</a>
                    </li>
                    <li>
                        <a href="{{ URL('cash-out') }}"
                            class="flex items-center w-full p-2 text-base font-normal transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">uang
                            keluar</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ URL('user/info') }}"
                    class="flex items-center p-2 text-base font-normal rounded-md dark:text-white hover:bg-gray-100 hover:text-violet-500 hover:border-l-4 hover:border-violet-500 dark:hover:bg-gray-700 transition-all duration-300">
                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-violet-500 transition duration-75 dark:text-gray-400 group-hover dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Profile</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center w-full p-2 text-base font-normal transition-all duration-300 rounded-md group hover:bg-gray-100 hover:text-violet-500 hover:border-l-4 hover:border-violet-500 dark:text-white dark:hover:bg-gray-700"
                    aria-controls="laporan_dropdown" data-collapse-toggle="laporan_dropdown">
                    <svg aria-hidden="true"
                        class="w-6 h-6 text-violet-500 dark:text-gray-400 group-hover dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span
                        class="flex-1 ml-3 text-left whitespace-nowrap uppercase">laporan
                    </span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="laporan_dropdown" class="hidden py-2 space-y-2">
                    <li>
                        <a href="{{ URL('/report/cash-in') }}"
                            class="flex items-center w-full p-2 text-base font-normal transition duration-75 rounded-lg pl-5 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mr-2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                            </svg>
                            laporan uang masuk
                          </a>
                    </li>
                    <li>
                        <a href="{{ URL('/report/cash-out') }}"
                            class="flex items-center w-full p-2 text-base font-normal transition duration-75 rounded-lg pl-5 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mr-2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                            </svg>
                            laporan uang
                            keluar
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <form action="{{ URL("/logout") }}" method="post"
                    class="flex justify-start items-center p-2 text-base font-normal rounded-md hover:text-violet-500 hover:border-l-4 hover:border-violet-500 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-300">
                    @csrf
                    <svg aria-hidden="true"
                        class="flex-shrink-0 rotate-180 w-6 h-6 text-violet-500 transition duration-75 dark:text-gray-400 group-hover dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <button type="submit" class="ml-3 whitespace-nowrap">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</div>
