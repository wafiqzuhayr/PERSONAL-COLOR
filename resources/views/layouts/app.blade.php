<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Wardah Color Expert')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Arial', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Common Variables */
        :root {
            --primary-color: #8B4F5C;
            --secondary-color: #9B5F6C;
            --background-gradient: linear-gradient(135deg, #FFB6C1 0%, #FFE4E1 50%, #87CEEB 100%);
            --text-dark: #6B3947;
            --text-medium: #8B4F5C;
            --text-light: white;
            --border-radius: 20px;
            --transition: all 0.3s ease;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    @yield('content')
    
    <!-- Scripts -->
    <script>
        // Setup CSRF token for all AJAX requests
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        
        window.fetch = new Proxy(window.fetch, {
            apply(fetch, that, args) {
                const [resource, config] = args;
                
                if (config && config.method && config.method !== 'GET') {
                    config.headers = config.headers || {};
                    config.headers['X-CSRF-TOKEN'] = csrfToken;
                }
                
                return fetch.apply(that, args);
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>