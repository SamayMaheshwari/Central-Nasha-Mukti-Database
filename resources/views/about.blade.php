<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Sahyog Portal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar">
        <a href="/" class="navbar-brand">Sahyog Portal</a>

        <div style="display: flex; gap: 1.5rem; align-items: center;">
            <a href="{{ route('home') }}" style="font-weight: 500;">Home</a>
            <a href="{{ route('about') }}" style="font-weight: 500;">About</a>
            <a href="{{ route('home') }}#contact" style="font-weight: 500;">Contact</a>
        </div>

        <div style="display: flex; gap: 1rem;">
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">Go to Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn" style="border: 1px solid var(--color-border);">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            @endauth
        </div>
    </nav>

    <main class="container mt-4" style="padding: 2rem;">
        <h1 style="font-size: 2.5rem; margin-bottom: 2rem; color: var(--color-text-primary); text-align: center;">About This Initiative</h1>
        
        <div class="card" style="max-width: 800px; margin: 0 auto; padding: 3rem;">
            <h3 style="margin-bottom: 1rem;">The Problem</h3>
            <p style="color: var(--color-text-secondary); margin-bottom: 2rem; line-height: 1.8;">
                Details of counselling and De-Addiction interventions provided to the beneficiaries at facilities supported by MoSJE are often scattered and not available on a single platform. This fragmentation prevents effective analysis of patient-wise, center-wise, or State-wise details of the services provided and the actual beneficiaries reached.
            </p>

            <h3 style="margin-bottom: 1rem;">Our Solution</h3>
            <p style="color: var(--color-text-secondary); margin-bottom: 2rem; line-height: 1.8;">
                Sahyog is designed to solve this by providing a single, unified platform. It tracks:
            </p>
            <ul style="color: var(--color-text-secondary); margin-bottom: 2rem; margin-left: 1.5rem; line-height: 1.8;">
                <li><strong>State and Center-wise Distribution:</strong> Analytics that help administrators understand resource allocation.</li>
                <li><strong>Patient-wise Records:</strong> Detailed profiles tracking Counselling Sessions, Treatments, and Follow-ups for every individual.</li>
                <li><strong>Intervention Tracking:</strong> Aggregated metrics of treatments and outcomes.</li>
            </ul>

            <div style="text-align: center; margin-top: 3rem;">
                <a href="{{ route('register') }}" class="btn btn-primary" style="padding: 1rem 2rem;">Join the Network</a>
            </div>
        </div>
    </main>
</body>
</html>
