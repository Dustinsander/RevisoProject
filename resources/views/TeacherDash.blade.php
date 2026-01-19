<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reviso – Student Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 min-h-screen">

    {{-- TOP BAR --}}
    <header class="bg-white h-16 flex items-center justify-between px-6 shadow">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/RevisoLogo.png') }}" alt="Reviso Logo" class="max-w-sm max-h-32">

        </div>

        <div class="w-10 h-10 rounded-full bg-gray-500 flex items-center justify-center text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5.121 17.804A9 9 0 1119.78 6.22M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>
    </header>

    <div class="flex">

        {{-- SIDEBAR --}}
        <aside class="w-64 bg-[#EA4E4E] min-h-[calc(100vh-4rem)] text-white">
           <nav class="flex flex-col text-lg font-semibold">
        <a href="#" data-tab="dashboard" class="bg-[#E12828] px-6 py-5">Dashboard</a>
        <a href="#" data-tab="lectures" class="px-6 py-5 hover:bg-[#E12828]">Manage Lectures</a>
        <a href="#" data-tab="assessments" class="px-6 py-5 hover:bg-[#E12828]">Manage Assessments</a>
        <a href="#" data-tab="progress" class="px-6 py-5 hover:bg-[#E12828]">Student Performance</a>
</nav>

            </nav>
        </aside>
        
        {{-- MAIN CONTENT --}}
        <main class="flex-1 p-10 space-y-10">

        {{-- DASHBOARD --}} 
        <section id="dashboard" class="space-y-10"> 
          <div class="bg-white rounded-2xl p-8"> <h1 class="text-2xl font-bold mb-4">Welcome back, [Teacher Student Name]</h1> 
          <h2 class="text-xl font-semibold mb-2">Upcoming Assessments</h2> 
          <p class="text-lg">January 4, 2025 – Submitting of Grades</p> <p class="text-lg">February 1, 2025 – Science Lecture</p> 
        </div>
           

            {{-- PERFORMANCE TRACKER --}} {{-- To be change into an adaptive progress bar--}}
            <div class="bg-white rounded-2xl p-8">
                <h2 class="text-2xl font-bold mb-6">Section Grade Tracker</h2>

                {{-- Science --}}
                <div class="mb-5">
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-lg font-semibold">Section A</span>
                        <div class="flex-1 h-6 border border-black rounded-full">
                            <div class="h-full bg-green-400 rounded-full" style="width: 25%;"></div>
                        </div>
                    </div>
                    <span class="ml-28 text-gray-500">25%</span>
                </div>

                {{-- Math --}}
                <div class="mb-5">
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-lg font-semibold">Section B</span>
                        <div class="flex-1 h-6 border border-black rounded-full">
                            <div class="h-full bg-green-400 rounded-full" style="width: 50%;"></div>
                        </div>
                    </div>
                    <span class="ml-28 text-gray-500">50%</span>
                </div>

                {{-- English --}}
                <div class="mb-5">
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-lg font-semibold">Section D</span>
                        <div class="flex-1 h-6 border border-black rounded-full">
                            <div class="h-full bg-green-400 rounded-full" style="width: 10%;"></div>
                        </div>
                    </div>
                    <span class="ml-28 text-gray-500">10%</span>
                </div>

                {{-- Psychology --}}
                <div>
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-lg font-semibold">Section F</span>
                        <div class="flex-1 h-6 border border-black rounded-full">
                            <div class="h-full bg-green-400 rounded-full" style="width: 100%;"></div>
                        </div>
                    </div>
                    <span class="ml-28 text-gray-500">100%</span>
                </div>
            </div>
                 

            </section>
            <script>
                document.querySelectorAll("aside nav a").forEach(link => {
                    link.addEventListener("click", e => {
                        e.preventDefault();

                        document.querySelectorAll("aside nav a").forEach(a => a.classList.remove("bg-[#455AE4]"));

                        link.classList.add("bg-[#455AE4]");

                        document.querySelectorAll("main section").forEach(sec => sec.classList.add("hidden"));

                        const tab = link.getAttribute("data-tab");
                        document.getElementById(tab).classList.remove("hidden");
                    });
                });
            </script>

                       {{-- LECTURES NAV --}}
        <section id="lectures">
        <div class="bg-white rounded-xl shadow-md p-6 flex flex-col h-[400px]">
            <h2 class="text-2xl font-bold mb-6">Lectures</h2>
    
            <div class="flex gap-6 overflow-x-auto pb-4 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
            <div style="width: 350px;" 
                class="bg-white rounded-xl shadow-md overflow-hidden flex-shrink-0">  
                <div class="p-6 flex flex-col h-full space-y-4"> 
                <a href="/lesson/psychology" class="block">
                    <div class="flex items-center space-x-4 bg-white rounded-xl shadow-md p-4 hover:bg-gray-100 transition">
                    <img src="https://via.placeholder.com/48" alt="Professor" class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h3 class="text-xl font-bold">Psychology Lecture</h3>
                        <p class="text-sm text-gray-600">Lesson Description</p>
                        <p class="text-sm text-gray-500">Professor Name</p>
                        <p class="text-sm text-red-600 mt-1">Open until: 11:59 PM</p>
                    </div>
                    </div>
                </a>

          <div class="flex-grow"></div>

         <div class="flex justify-between items-center text-gray-500 mt-4">               
                <button class="hover:text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                </button>
                <button class="hover:text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 12v4m0-4a4 4 0 100-8 4 4 0 000 8z" />
                </svg>
                </button>
                <button class="hover:text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 12h.01M12 12h.01M18 12h.01" />
                </svg>
                </button>
            </div>
        </div>
      </div>

      <!-- ★★★ Second lecture – just duplicate the block above and change content ★★★ -->
      <div style="width: 350px;" 
           class="bg-white rounded-xl shadow-md overflow-hidden flex-shrink-0">
        <div class="p-6 flex flex-col h-full space-y-4">
          <a href="/lesson/sociology" class="block">
            <div class="flex items-center space-x-4 bg-white rounded-xl shadow-md p-4 hover:bg-gray-100 transition">
              <img src="https://via.placeholder.com/48" alt="Professor" class="w-12 h-12 rounded-full object-cover">
              <div>
                <h3 class="text-xl font-bold">Sociology 101</h3>
                <p class="text-sm text-gray-600">Social Behavior & Structures</p>
                <p class="text-sm text-gray-500">Prof. Juan Dela Cruz</p>
                <p class="text-sm text-red-600 mt-1">Open until: 11:59 PM</p>
              </div>
            </div>
          </a>

          <div class="flex-grow"></div>
           <div class="flex justify-between items-center text-gray-500 mt-4">               
                <button class="hover:text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                </button>
                <button class="hover:text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 12v4m0-4a4 4 0 100-8 4 4 0 000 8z" />
                </svg>
                </button>
                <button class="hover:text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 12h.01M12 12h.01M18 12h.01" />
                </svg>
                </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Add more lectures the same way... -->

    </div>
  </div>
</section>
            
        </section>

        </main>

</body>
</html>
 