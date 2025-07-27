<header>
    <navbar class="header-items-desktop container px-3 mx-auto flex flex-row justify-between items-center">
        <a href="" class="header-logo m-0 p-0"><img class="w-[100px]" src="{{ asset('assets/images/logo.png') }}"
                alt="Logo"></a>


        <ul class="nav-items mx-auto flex flex-row justify-between items-center gap-5 ">
            <li>
                <a href="#"
                    class="nav-link relative inline-block font-medium py-2 px-2 text-black 
                            after:content-[''] after:absolute after:bottom-0 after:left-0 
                            after:w-full after:h-[2px] after:bg-[#FF4141] after:scale-x-0 
                            after:origin-left after:transition-transform after:duration-300 
                            hover:after:scale-x-100">
                    Home
                </a>
            </li>
            <li>
                <a href="#"
                    class="nav-link relative inline-block font-medium py-2 px-2 text-black 
                        after:content-[''] after:absolute after:bottom-0 after:left-0 
                        after:w-full after:h-[2px] after:bg-[#FF4141] after:scale-x-0 
                        after:origin-left after:transition-transform after:duration-300 
                        hover:after:scale-x-100">
                    About
                </a>
            </li>
            <li>
                <a href="#"
                    class="nav-link relative inline-block font-medium py-2 px-2 text-black 
                        after:content-[''] after:absolute after:bottom-0 after:left-0 
                        after:w-full after:h-[2px] after:bg-[#FF4141] after:scale-x-0 
                        after:origin-left after:transition-transform after:duration-300 
                        hover:after:scale-x-100">
                    Services
                </a>
            </li>
            <li>
                <a href="#"
                    class="nav-link relative inline-block font-medium py-2 px-2 text-black 
                        after:content-[''] after:absolute after:bottom-0 after:left-0 
                        after:w-full after:h-[2px] after:bg-[#FF4141] after:scale-x-0 
                        after:origin-left after:transition-transform after:duration-300 
                        hover:after:scale-x-100">
                    Experties
                </a>
            </li>
            <li>
                <a href="#"
                    class="nav-link relative inline-block font-medium py-2 px-2 text-black 
                        after:content-[''] after:absolute after:bottom-0 after:left-0 
                        after:w-full after:h-[2px] after:bg-[#FF4141] after:scale-x-0 
                        after:origin-left after:transition-transform after:duration-300 
                        hover:after:scale-x-100">
                    Mission
                </a>
            </li>
            <li>
                <a href="#"
                    class="nav-link relative inline-block font-medium py-2 px-2 text-black 
                        after:content-[''] after:absolute after:bottom-0 after:left-0 
                        after:w-full after:h-[2px] after:bg-[#FF4141] after:scale-x-0 
                        after:origin-left after:transition-transform after:duration-300 
                        hover:after:scale-x-100">
                    Contact
                </a>
            </li>
        </ul>

        <!-- Theme Switch -->
        <div class="flex items-center gap-3 mx-3">
            <label class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" id="themeToggle" class="sr-only peer">

                <!-- Background track -->
                <div
                    class="w-14 h-8 bg-gray-300 dark:bg-gray-700 rounded-full peer-checked:bg-gray-800 transition-all duration-300">
                </div>

                <!-- Icon knob -->
                <div id="toggleKnob"
                    class="absolute left-1 top-1 w-6 h-6 bg-white rounded-full shadow-md flex items-center justify-center text-yellow-400 transition-all duration-300 peer-checked:translate-x-6 er-checked:text-blue-400">
                    <i class="fa-solid fa-moon  transition-all duration-300" id="themeIcon"></i>
                </div>
            </label>
        </div>
        <button
            class="hire-btn text-white bg-[#FF4141] hover:bg-[#FF4141] font-semibold px-5 py-3 rounded-xl shadow-md hover:shadow-lg transition-all  duration-300 ease-in-out ">
            Appointment
        </button>

    </navbar>

    <!-- Mobile View Menu Button + Menu -->
    <navbar class="mobile-view-header px-3 mx-auto flex justify-between items-center md:hidden relative z-50">
        <a href="" class="header-logo m-0 p-0">
            <img class="w-[100px]" src="{{ asset('assets/images/logo.png') }}" alt="Logo">
        </a>

        <!-- Toggle Button -->


        <div class="flex justify-center items-center">
      <!-- Theme Switch -->
<div class="flex items-center gap-3 mx-3">
    <label class="relative inline-flex items-center cursor-pointer" id="themeLabel">
        <input type="checkbox" id="themeToggle" class="sr-only peer">

        
        <!-- Background track -->
        <div class="w-14 h-8 bg-gray-300 dark:bg-gray-700 rounded-full peer-checked:bg-gray-800 transition-all duration-300"></div>

        <!-- Icon knob -->
        <div id="toggleKnob"
            class="absolute left-1 top-1 w-6 h-6 bg-white rounded-full shadow-md flex items-center justify-center text-yellow-400 transition-all duration-300 peer-checked:translate-x-6 peer-checked:text-blue-400">
            <i class="fa-solid fa-moon transition-all duration-300" id="themeIcon"></i>
        </div>
    </label>
</div>

            <div
                class="header-nav-button flex justify-center items-center rounded-xl border border-slate-500 shadow-md w-12 h-12 transition duration-300">
                <button id="menuToggle" class="text-white text-2xl focus:outline-none">
                    <i id="menuIcon" class="fa-solid fa-bars transition-all duration-300"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu"
            class="absolute  top-0 left-0 w-full  p-6 rounded-b-xl shadow-xl transform scale-y-0 opacity-0 origin-top transition-all duration-300 ease-in-out z-1">
            <ul class="flex flex-col justify-center items-center gap-5">
                <li><a href="#" class="nav-link text-black hover:text-[#FF4141] transition">Home</a></li>
                <li><a href="#" class="nav-link text-black hover:text-[#FF4141] transition">About</a></li>
                <li><a href="#" class="nav-link text-black hover:text-[#FF4141] transition">Services</a></li>
                <li><a href="#" class="nav-link text-black hover:text-[#FF4141] transition">Experties</a></li>
                <li><a href="#" class="nav-link text-black hover:text-[#FF4141] transition">Mission</a></li>
                <li><a href="#" class="nav-link text-black hover:text-[#FF4141] transition">Contact</a></li>
            </ul>
            <div class="mt-6 flex justify-center">
                \
                <button
                    class="text-white bg-[#FF4141] hover:bg-[#FF4141] font-semibold px-5 py-3 rounded-xl shadow-md transition-all duration-300 ease-in-out">
                    Appointment
                </button>
            </div>
        </div>
    </navbar>


</header>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        let isOpen = false;

        $('#menuToggle').on('click', function() {
            const $menu = $('#mobileMenu');
            const $icon = $('#menuIcon');

            isOpen = !isOpen;

            // Toggle icon between bars and xmark
            $icon.toggleClass('fa-bars fa-xmark');

            if (isOpen) {
                // Show immediately before animation
                $menu.removeClass('hidden');

                // Then animate in
                setTimeout(() => {
                    $menu.removeClass('scale-y-0 opacity-0')
                        .addClass('scale-y-100 opacity-100');
                }, 10); // Small delay to allow browser to register display change
            } else {
                // Animate out
                $menu.removeClass('scale-y-100 opacity-100')
                    .addClass('scale-y-0 opacity-0');

                // After animation ends, hide
                setTimeout(() => {
                    if (!isOpen) {
                        $menu.addClass('hidden');
                    }
                }, 300); // Match Tailwind duration
            }
        });
    });
</script>
