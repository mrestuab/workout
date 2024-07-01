@section('navbar')
<nav class="bg-white fixed border-gray-200 dark:bg-gray-900 w-full z-10">
    <div class="flex flex-wrap items-center justify-between p-4">
        <a href="http://127.0.0.1:8000" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="img/logo.png" class="h-8" alt="Workout Logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Admin Workout</span>
        </a>

        <div class="flex items-center md:order-2 space-x-1 md:space-x-0 rtl:space-x-reverse">
            <button type="button" data-dropdown-toggle="language-dropdown-menu" 
            class="inline-flex items-center font-medium justify-center px-4 py-2 text-sm text-gray-900
             dark:text-white rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg class="w-5 h-5 rounded-full me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" 
                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3900 3900">
                    <path fill="#b22234" d="M0 0h7410v3900H0z" />
                    <path d="M0 450h7410m0 600H0m0 600h7410m0 600H0m0 600h7410m0 600H0" stroke="#fff" stroke-width="300" />
                    <path fill="#3c3b6e" d="M0 0h2964v2100H0z" />
                    <g fill="#fff">
                        <g id="d">
                            <g id="c">
                                <g id="e">
                                    <g id="b">
                                        <path id="a" d="M247 90l70.534 217.082-184.66-134.164h228.253L176.466 307.082z" />
                                        <use xlink:href="#a" y="420" />
                                        <use xlink:href="#a" y="840" />
                                        <use xlink:href="#a" y="1260" />
                                    </g>
                                    <use xlink:href="#a" y="1680" />
                                </g>
                                <use xlink:href="#b" x="247" y="210" />
                            </g>
                            <use xlink:href="#c" x="494" />
                        </g>
                        <use xlink:href="#d" x="988" />
                        <use xlink:href="#c" x="1976" />
                        <use xlink:href="#e" x="2470" />
                    </g>
                </svg>
                User Admin
            </button>

            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow
             dark:bg-gray-700" id="language-dropdown-menu">
                <ul class="py-2 font-medium" role="none">
                    <li>
                        <a href="/logout-admin" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100
                         dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                            <div class="inline-flex items-center">
                                <svg class="w-3 h-3 me-2 text-gray-800 dark:text-white" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3" />
                                </svg>
                                Logout
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
@endsection
