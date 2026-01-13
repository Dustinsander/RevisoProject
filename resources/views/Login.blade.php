<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PCC Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen w-screen relative bg-cover bg-center" style="background-image: url('{{ asset('images/pcc-building.png') }}');">

  
    <div class="absolute inset-0 bg-red-900/70 opacity-100"></div>

    <div class="relative flex items-center justify-center h-full">

      
        <div id="intro" class="bg-white rounded-3xl p-10 text-center transform scale-95 opacity-100 transition-all duration-500">
            <img src="{{ asset('images/revisoLogo.png') }}" alt="RevisoLogo" class="max-w-xs mx-auto mb-8">

            <button id="startLogin" class="bg-red-800 text-white px-8 py-3 rounded-xl font-semibold hover:bg-red-700 transition">
                Log In
            </button>
        </div>

       
        <div id="loginForm" class="absolute bg-white rounded-3xl p-10 text-center transform scale-95 opacity-0 pointer-events-none transition-all duration-500 w-96">
            <h2 class="text-2xl font-bold mb-8">LOG IN</h2>

        
            <form method="POST" action="/login-check">
                @csrf
                <div class="mb-4 text-left">
                    <label class="block font-semibold mb-1">ID No:</label>
                    <input type="text" name="idNumber" id="idNumber" placeholder="Enter your ID number" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-700">
                </div>

                <div class="mb-4 text-left">
                    <label class="block font-semibold mb-1">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-700">
                </div>

                <a href="#" class="block text-sm text-blue-700 mb-6 hover:underline">Forgot Password?</a>

                <button type="submit" class="w-full bg-red-800 text-white py-3 rounded-xl font-semibold hover:bg-red-700 transition">
                    Log In
                </button>
            </form>
        </div>

    </div>

 <script>
    //ui login logic
    const startBtn = document.getElementById('startLogin');
    const intro = document.getElementById('intro');
    const loginForm = document.getElementById('loginForm');

    startBtn.addEventListener('click', () => {
        intro.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
        intro.classList.remove('opacity-100');
        
        loginForm.classList.remove('opacity-0', 'pointer-events-none', 'scale-95');
        loginForm.classList.add('opacity-100', 'scale-100');
    });

   //login logic
    const loginBtn = document.querySelector('#loginForm button');

    loginBtn.addEventListener('click', async () => {
        const idNumber = document.getElementById('idNumber').value;
        const password = document.getElementById('password').value;

        const response = await fetch('/login-check', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ idNumber, password })
        });

        const result = await response.json();

        if (result.success) {
            alert('Login successful!'); // temporary until you have a dashboard
        } else {
            alert('Invalid credentials');
        }
    });
</script>

</body>
</html>
