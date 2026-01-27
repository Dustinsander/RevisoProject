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
<header class="bg-white h-16 flex items-center justify-between px-6 shadow sticky top-0 z-50">

            
        <div class="flex items-center gap-1">
            <button id="menu-toggle"class=" p-1 text-black rounded">
         ☰
          </button>
            <img src="{{ asset('images/RevisoLogo.png') }}" alt="Reviso Logo" class="max-w-sm max-h-32">

        </div>

      
        
    </header>

    <div class="flex">

        
<!-- Sidebar -->
<div id="sidebar" 
     class="fixed top-15 left-0 h-full w-64 bg-[#455AE4] text-white transform -translate-x-48 transition-transform duration-300 ease-in-out z-40 flex flex-col">

  <!-- Sidebar Header with Button -->
  <div class="flex items-center justify-between bg-white h-16 px-4">
    <h2 class="text-2xl font-semibold text-black text-semibold">Settings</h2>
      <div class="w-10 h-10 rounded-full bg-gray-500 flex items-center justify-center text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5.121 17.804A9 9 0 1119.78 6.22M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>
  </div>

  <!-- Sidebar Content -->
  <div class="flex-1 p-4 space-y-4 text-white text-2xl font-semibold">
    <a href="#" data-tab="dashboard" class="block hover:bg-gray-200 p-6 rounded">Dashboard</a>
    <a href="#" data-tab="lectures" class="block hover:bg-gray-200 p-6 rounded">Lectures</a>
    <a href="#" ata-tab="assessments" class="block hover:bg-gray-200 p-6 rounded">Assessment</a>
    <a href="#" ata-tab="progress" class="block hover:bg-gray-200 p-6 rounded">Progress Tracker</a>

      
  </div>
</div>




        {{-- MAIN CONTENT --}}
       <main class="flex-1 p-10 space-y-10 ml-10">

    {{-- WELCOME / UPCOMING --}}
   <section id="dashboard" class="flex flex-row space-x-6 p-10 justify-center">
 
  
<!-- Left: Profile Card -->
<div class="flex flex-col space-y-6">
  <div class="bg-white rounded-2xl shadow-lg w-96 h-96 flex flex-col items-center justify-start p-4 space-y-4">
    <img src="{{ asset('images/RevisoLogo.png') }}" alt="Reviso Logo" class="max-w-sm max-h-32">
    <p class="text-lg font-bold">Hello, [User]</p>
    <p class="text-sm text-gray-500">Student</p>
  </div>

  <section id="progress" class="bg-white rounded-2xl shadow-lg w-96 h-96 flex flex-col items-center justify-start p-4 space-y-4">
    <h2 class="text-2xl font-bold">Performance Tracker</h2>
    <div class="w-full h-full">
      <canvas id="performanceChart" class="w-full h-full"></canvas>
    </div>
  </section>
</div>


<!-- Left: Vision & Mission -->
  <div class="bg-white rounded-2xl p-8 w-full max-w-4xl space-y-1 shadow-lg flex flex-col items-center">
    <h2 class="text-2xl font-bold text-center">About</h2>
     <p class="text-gray-700 text-justify leading-relaxed">
      PASIG CATHOLIC COLLEGE, as part of the Immaculate Conception Parish, envisions itself as an evangelized and evangelizing community whose commitment to quality Catholic education promotes a culture of excellence and the task of social transformation.

    </p>

    <h2 class="text-2xl font-bold text-center">Vision</h2>
    <p class="text-gray-700 text-justify leading-relaxed">
      
      PASIG CATHOLIC COLLEGE, as part of the Immaculate Conception Parish, envisions itself as an evangelized and evangelizing community whose commitment to quality Catholic education promotes a culture of excellence and the task of social transformation.
    </p>

    <h2 class="text-2xl font-bold text-center">Mission</h2>
    <ul class="list-decimal list-inside text-gray-700 space-y-2 leading-relaxed">
      
      <li>We are role models in the practice of our Christian faith.</li>
      <li>We discern and develop what is distinctly Catholic in our educational system.</li>
      <li>We promote the value of excellence at all levels of the institution’s operation.</li>
      <li>As a community, we adhere to social transformation through immersion and advocacy, community outreach and parish involvement.</li>
      <li>We empower our work force by professionalizing all operations and setting up more effective systems of coordination, communication and networking among units of the institution.</li>
    </ul>
  </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('performanceChart').getContext('2d');
  const performanceChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Mathematics', 'English', 'Science', 'History'],
      datasets: [{
        label: 'Scores (%)',
        data: [80, 75, 90, 65],
        backgroundColor: ['#455AE4','#455AE4','#455AE4','#455AE4'],
        borderRadius: 8
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false, // allows the chart to fill the div height
      plugins: {
        legend: { display: false }
      },
      scales: {
        y: {
          beginAtZero: true,
          max: 100
        }
      }
    }
  });
</script>


   
</main>

    </div>

</body>

<script>

const sidebar = document.getElementById('sidebar');
const toggleBtn = document.getElementById('menu-toggle');

toggleBtn.addEventListener('click', () => {
  if (sidebar.classList.contains('-translate-x-48')) {
    sidebar.classList.remove('-translate-x-48');
    sidebar.classList.add('translate-x-0');
  } else {
    sidebar.classList.remove('translate-x-0');
    sidebar.classList.add('-translate-x-48');
  }
});

</script>
</html>


