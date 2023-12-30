    <!-- navigation -->


    @php
    use App\Models\PageEng;
    use App\Models\Page;
    if(session('lang')=="eng"){
        $beranda=PageEng::where('page_id','36435435-96de-4c4a-8a6c-ffcf607d196d')->first();
        $perusahaan=PageEng::where('page_id','36435435-96de-4c4a-8a6c-ffcf607d196c')->first();
        $kontraktor=PageEng::where('page_id','36435435-96de-4c4a-8aadd-ffcf607d196d')->first();
        $catudaya=PageEng::where('page_id','d8a487db-30a9-4895-80d8-fda47256f820')->first();
        $kontak=PageEng::where('page_id','51de527c-a7c2-4b3b-b4b4-8614b24c4474')->first();

        $new_page=PageEng::where('can_be_deleted',1)->where('hidden',0)->orderBy('created_at','ASC')->get();
    } else {
        $beranda=Page::where('id','36435435-96de-4c4a-8a6c-ffcf607d196d')->first();
        $perusahaan=Page::where('id','36435435-96de-4c4a-8a6c-ffcf607d196c')->first();
        $kontraktor=Page::where('id','36435435-96de-4c4a-8aadd-ffcf607d196d')->first();
        $catudaya=Page::where('id','d8a487db-30a9-4895-80d8-fda47256f820')->first();
        $kontak=Page::where('id','51de527c-a7c2-4b3b-b4b4-8614b24c4474')->first();
        $new_page=Page::where('can_be_deleted',1)->where('hidden',0)->orderBy('created_at','ASC')->get();
    }
    
    @endphp
    <navbar class="fixed top-0 left-0 justify-center bg-white items-center w-full flex z-10">
        <span class="flex justify-between max-w-screen-xl w-full px-4 pt-8 pb-4">
            <div class="flex justify-center items-center">
                <a href="{{url('/')}}" class="flex justify-center items-center">
                    <img class="h-[32px] lg:h-[48px]" src="{{url('/web')}}/img/logo.svg" alt="icon-logo">
                </a>
            </div>
            <div class="flex justify-center items-center">
                <menu>
                    <div class="hidden text-light-blue lg:flex gap-8 text-base">
                        @if($beranda->hidden==0)
                        <a style="text-transform: uppercase;" class="flex justify-center items-center {{ (request()->is('/')) ? 'text-blue-two font-extrabold' : 'text-grey-2 font-semibold' }}"
                            href="{{url('/')}}">{{$beranda->name}}</a>
                            @endif
                            @if($perusahaan->hidden==0)
                            <a style="text-transform: uppercase;" class="flex justify-center items-center {{ (request()->is('perusahaan')) ? 'text-blue-two font-extrabold' : 'text-grey-2 font-semibold' }}"
                                href="{{route('perusahaan')}}">{{$perusahaan->name}}</a>
                                @endif
                                @if($kontraktor->hidden==0)
                                <a style="text-transform: uppercase;" class="flex justify-center items-center  {{ (request()->is('kontraktor')) ? 'text-blue-two font-extrabold' : 'text-grey-2 font-semibold' }}"
                                    href="{{url('/kontraktor')}}">{{$kontraktor->name}}</a>
                                    @endif
                                    @if($catudaya->hidden==0)
                                    <a style="text-transform: uppercase;" class="flex justify-center items-center  {{ (request()->is('catudaya')) ? 'text-blue-two font-extrabold' : 'text-grey-2 font-semibold' }}"
                                        href="{{url('/catudaya')}}">{{$catudaya->name}}</a>
                                        @endif
                                        @if($kontak->hidden==0)
                                        <a style="text-transform: uppercase;" class="flex justify-center items-center  {{ (request()->is('kontak')) ? 'text-blue-two font-extrabold' : 'text-grey-2 font-semibold' }}"
                                            href="{{url('/kontak')}}">{{$kontak->name}}</a>
                                            @endif
                                            <a style="text-transform: uppercase;" class="flex justify-center items-center  {{ (request()->is('blog')) ? 'text-blue-two font-extrabold' : 'text-grey-2 font-semibold' }}"
                                                href="{{url('/blog')}}">BLOG</a>
                                                @foreach($new_page as $new)
                                                <a style="text-transform: uppercase;" class="flex justify-center items-center  {{ (request()->is('page/'.$new->slug)) ? 'text-blue-two font-extrabold' : 'text-grey-2 font-semibold' }}"
                                                    href="{{url('page/'.$new->slug)}}">{{$new->name}}</a>
                                                    @endforeach

                                                    <!-- btn bahasa -->
                                                    <div class="flex justify-center relative">
                                                        <button id="dropdown-button"
                                                        class="inline-flex justify-center text-sm font-bold items-center text-blue-two ">
                                                        @if(session('lang')=="eng")
                                                        EN
                                                        @else
                                                        ID
                                                        @endif

                                                        <svg width="12" height="6" class="ml-2" viewBox="0 0 12 6" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6 6L0 0H12L6 6Z" fill="#2473BA" />
                                                    </svg>

                                                </button>
                                                <div id="dropdown-menu"
                                                class="origin-top-right absolute right-0 mt-8 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                                                <div class="py-2 p-2" role="menu" aria-orientation="vertical"
                                                aria-labelledby="dropdown-button">
                                                <form action="{{route('lang')}}" method="POST">
                                                    @csrf
                                                    <button type="submit" 
                                                    class="flex js-btn-modal rounded-md w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer">
                                                    @if(session('lang')=="eng")
                                                    ID
                                                    @else
                                                    EN
                                                    @endif
                                                </button>
                                            </form>



                                        </div>
                                    </div>
                                    <script>
                                        const dropdownButton = document.getElementById('dropdown-button');
                                        const dropdownMenu = document.getElementById('dropdown-menu');
                                let isDropdownOpen = true; // Set to true to open the dropdown by default, false to close it by default

                                // Function to toggle the dropdown
                                function toggleDropdown() {
                                    isDropdownOpen = !isDropdownOpen;
                                    if (isDropdownOpen) {
                                        dropdownMenu.classList.remove('hidden');
                                    } else {
                                        dropdownMenu.classList.add('hidden');
                                    }
                                }

                                // Initialize the dropdown state
                                toggleDropdown();

                                // Toggle the dropdown when the button is clicked
                                dropdownButton.addEventListener('click', toggleDropdown);

                                // Close the dropdown when clicking outside of it
                                window.addEventListener('click', (event) => {
                                    if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                                        dropdownMenu.classList.add('hidden');
                                        isDropdownOpen = false;
                                    }
                                });
                            </script>
                        </div>
                    </menu>

                    <!-- menu mobile -->
                    <div class="flex lg:hidden">
                        <button class="flex btnclick justify-center items-center h-[64px]">
                            <img class="open-menu" src="{{url('/web')}}/img/menu.svg" alt="icon-menu">
                            <img class="close-menu" src="{{url('/web')}}/img/close.svg" alt="icon-menu">

                        </button>

                        <div


                        class="menu-mobile hidden right-0 w-full absolute lg:hidden top-[80px] bg-white text-light-blue slide-bottom">
                        <a class="border-b-white border-b px-4 py-8 block text-center text-blue-two font-extrabold items-center"
                        href="{{url('/')}}">{{$beranda->name}}</a>
                        <a class="border-b-white border-b px-4 py-8 block text-center font-semibold items-center text-grey-2"
                        href="{{route('perusahaan')}}">{{$perusahaan->name}}</a>
                        <a class="border-b-white border-b px-4 py-8 block text-center font-semibold items-center text-grey-2"
                        href="{{url('/kontraktor')}}">{{$kontraktor->name}}</a>
                        <a class="border-b-white border-b px-4 py-8 block text-center font-semibold items-center text-grey-2"
                        href="{{url('/catudaya')}}">{{$catudaya->name}}</a>
                        <a class="border-b-white border-b px-4 py-8 block text-center font-semibold items-center text-grey-2"
                        href="{{url('/kontak')}}">{{$kontak->name}}</a>
                        <a class="border-b-white border-b px-4 py-8 block text-center font-semibold items-center text-grey-2"
                        href="{{url('/blog')}}">BLOG</a>
                        @foreach($new_page as $new)
                        <a class="border-b-white border-b px-4 py-8 block text-center font-semibold items-center text-grey-2"
                        href="{{url('/page')}}/{{$new->slug}}">{{$new->name}}</a>
                        @endforeach
                        <!-- btn bahasa -->
                        <div class="flex justify-center relative">
                            <button id="dropdown-button2"
                            class="inline-flex justify-center text-sm font-bold items-center text-blue-two ">
                            @if(session('lang')=="eng")
                            EN
                            @else
                            ID
                            @endif
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-5" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                            d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div id="dropdown-menu2"
                    class="origin-top-right absolute right-auto luto mt-8 lg:w-32 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                    <div class="py-2 p-2" role="menu" aria-orientation="vertical"
                    aria-labelledby="dropdown-button">
                    <form action="{{route('lang')}}" method="POST">
                        @csrf
                        <button type="submit" 
                        class="flex js-btn-modal rounded-md w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer"
                        >
                        @if(session('lang')=="eng")
                        ID
                        @else
                        EN
                        @endif
                    </button>
                </form>

            </div>
        </div>
        <script>
            const dropdownButton2 = document.getElementById('dropdown-button2');
            const dropdownMenu2 = document.getElementById('dropdown-menu2');
                                let isDropdownOpen2 = true; // Set to true to open the dropdown by default, false to close it by default

                                // Function to toggle the dropdown
                                function toggleDropdown() {
                                    isDropdownOpen2 = !isDropdownOpen2;
                                    if (isDropdownOpen2) {
                                        dropdownMenu2.classList.remove('hidden');
                                    } else {
                                        dropdownMenu2.classList.add('hidden');
                                    }
                                }

                                // Initialize the dropdown state
                                toggleDropdown();

                                // Toggle the dropdown when the button is clicked
                                dropdownButton2.addEventListener('click', toggleDropdown);

                                // Close the dropdown when clicking outside of it
                                window.addEventListener('click', (event) => {
                                    if (!dropdownButton2.contains(event.target) && !dropdownMenu2.contains(event.target)) {
                                        dropdownMenu2.classList.add('hidden');
                                        isDropdownOpen2 = false;
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <!-- menu mobile end -->

            </div>
        </span>
    </navbar>
    <!-- navigation end -->