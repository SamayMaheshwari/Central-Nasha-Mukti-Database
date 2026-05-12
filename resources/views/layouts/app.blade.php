<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sahyog | Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div style="display: flex; min-height: 100vh;">
        <!-- Sidebar -->
        <aside style="width: 250px; background-color: var(--color-surface); border-right: 1px solid var(--color-border); padding: 2rem 1rem; display: flex; flex-direction: column; gap: 1rem;">
            <a href="{{ route('home') }}" class="navbar-brand" style="margin-bottom: 2rem; padding-left: 1rem;">Sahyog</a>
            
            <a href="{{ route('dashboard') }}" class="btn" style="justify-content: flex-start; background: {{ request()->routeIs('dashboard') ? 'var(--color-bg)' : 'transparent' }}; color: {{ request()->routeIs('dashboard') ? 'var(--color-accent)' : 'var(--color-text-secondary)' }}; text-align: left; padding: 0.8rem 1rem;">Dashboard</a>
            
            <a href="{{ route('states.index') }}" class="btn" style="justify-content: flex-start; background: {{ request()->routeIs('states.*') ? 'var(--color-bg)' : 'transparent' }}; color: {{ request()->routeIs('states.*') ? 'var(--color-accent)' : 'var(--color-text-secondary)' }}; text-align: left; padding: 0.8rem 1rem;">States</a>
            
            <a href="{{ route('centers.index') }}" class="btn" style="justify-content: flex-start; background: {{ request()->routeIs('centers.*') ? 'var(--color-bg)' : 'transparent' }}; color: {{ request()->routeIs('centers.*') ? 'var(--color-accent)' : 'var(--color-text-secondary)' }}; text-align: left; padding: 0.8rem 1rem;">Centers</a>
            
            <a href="{{ route('beneficiaries.index') }}" class="btn" style="justify-content: flex-start; background: {{ request()->routeIs('beneficiaries.*') ? 'var(--color-bg)' : 'transparent' }}; color: {{ request()->routeIs('beneficiaries.*') ? 'var(--color-accent)' : 'var(--color-text-secondary)' }}; text-align: left; padding: 0.8rem 1rem;">Beneficiaries</a>

            <hr style="border: 0; height: 1px; background: var(--color-border); margin: 0.5rem 0;">

            <a href="{{ route('counselling_sessions.index') }}" class="btn" style="justify-content: flex-start; background: {{ request()->routeIs('counselling_sessions.*') ? 'var(--color-bg)' : 'transparent' }}; color: {{ request()->routeIs('counselling_sessions.*') ? 'var(--color-accent)' : 'var(--color-text-secondary)' }}; text-align: left; padding: 0.8rem 1rem;">Counselling</a>
            <a href="{{ route('treatments.index') }}" class="btn" style="justify-content: flex-start; background: {{ request()->routeIs('treatments.*') ? 'var(--color-bg)' : 'transparent' }}; color: {{ request()->routeIs('treatments.*') ? 'var(--color-accent)' : 'var(--color-text-secondary)' }}; text-align: left; padding: 0.8rem 1rem;">Treatments</a>
            <a href="{{ route('follow_ups.index') }}" class="btn" style="justify-content: flex-start; background: {{ request()->routeIs('follow_ups.*') ? 'var(--color-bg)' : 'transparent' }}; color: {{ request()->routeIs('follow_ups.*') ? 'var(--color-accent)' : 'var(--color-text-secondary)' }}; text-align: left; padding: 0.8rem 1rem;">Follow-ups</a>
        </aside>

        <!-- Main Content Area -->
        <div style="flex: 1; display: flex; flex-direction: column;">
            <!-- Top Navbar -->
            <nav class="navbar" style="border-bottom: 1px solid var(--color-border); padding: 1rem 2rem; display: flex; justify-content: flex-end; background: var(--color-surface);">
                <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn" style="border: 1px solid var(--color-border); color: var(--color-text-secondary);">Logout</button>
                </form>
            </nav>

            <!-- Page Content -->
            <main class="container mt-4" style="flex: 1; overflow-y: auto; padding: 2rem;">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
