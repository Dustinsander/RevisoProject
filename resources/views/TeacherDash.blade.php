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
                <a href="#" class="bg-[#E12828] px-6 py-5">Dashboard</a>
                <a href="#" class="px-6 py-5 hover:bg-[#E12828]">Manage Lectures</a>
                <a href="#" class="px-6 py-5 hover:bg-[#E12828]">Manage Assessments</a>
                <a href="#" class="px-6 py-5 hover:bg-[#E12828]">Student Performance</a>
            </nav>
        </aside>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 p-10 space-y-10">

            {{-- WELCOME / UPCOMING --}}  {{-- To be changed and updated--}}
            <section class="bg-white rounded-2xl p-8">
                <h1 class="text-2xl font-bold mb-4">
                    Welcome back, [Teacher Name]
                </h1>

                <h2 class="text-xl font-semibold mb-2">Upcoming Assessments</h2>

                <p class="text-lg">January 4, 2025 – Theory of Personalities</p>
                <p class="text-lg">February 1, 2025 – Abnormal Psychology</p>
            </section>

            {{-- PERFORMANCE TRACKER --}} {{-- To be change into an adaptive progress bar--}}
            <section class="bg-white rounded-2xl p-8">
                <h2 class="text-2xl font-bold mb-6">Performance Tracker</h2>

                {{-- Science --}}
                <div class="mb-5">
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-lg font-semibold">Science</span>
                        <div class="flex-1 h-6 border border-black rounded-full">
                            <div class="h-full bg-green-400 rounded-full" style="width: 25%;"></div>
                        </div>
                    </div>
                    <span class="ml-28 text-gray-500">25%</span>
                </div>

                {{-- Math --}}
                <div class="mb-5">
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-lg font-semibold">Math</span>
                        <div class="flex-1 h-6 border border-black rounded-full">
                            <div class="h-full bg-green-400 rounded-full" style="width: 50%;"></div>
                        </div>
                    </div>
                    <span class="ml-28 text-gray-500">50%</span>
                </div>

                {{-- English --}}
                <div class="mb-5">
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-lg font-semibold">English</span>
                        <div class="flex-1 h-6 border border-black rounded-full">
                            <div class="h-full bg-green-400 rounded-full" style="width: 10%;"></div>
                        </div>
                    </div>
                    <span class="ml-28 text-gray-500">10%</span>
                </div>

                {{-- Psychology --}}
                <div>
                    <div class="flex items-center gap-4">
                        <span class="w-24 text-lg font-semibold">Psych</span>
                        <div class="flex-1 h-6 border border-black rounded-full">
                            <div class="h-full bg-green-400 rounded-full" style="width: 100%;"></div>
                        </div>
                    </div>
                    <span class="ml-28 text-gray-500">100%</span>
                </div>

            </section>

        </main>
    </div>

</body>
</html>
