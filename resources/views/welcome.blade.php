<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sahyog | Integrated Recovery Network</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar">
        <a href="/" class="navbar-brand">Sahyog Portal</a>

        <div style="display: flex; gap: 1.5rem; align-items: center;">
            <a href="{{ route('home') }}" style="font-weight: 500;">Home</a>
            <a href="{{ route('about') }}" style="font-weight: 500;">About</a>
            <a href="#contact" style="font-weight: 500;">Contact</a>
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

    <main class="container mt-4"
        style="text-align: center; padding: 4rem 2rem; background: linear-gradient(135deg, #FDF2F8, #F5D0FE); border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); border: 1px solid var(--color-border); margin-top: 2rem;">
        <div
            style="background: rgba(255, 255, 255, 0.5); display: inline-block; padding: 0.5rem 1.5rem; border-radius: 99px; color: var(--color-accent); font-weight: 600; font-size: 0.9rem; margin-bottom: 1.5rem; border: 1px solid rgba(217, 70, 239, 0.2);">
            Ministry of Social Justice & Empowerment
        </div>
        <h1 style="font-size: 3.5rem; margin-bottom: 1.5rem; color: var(--color-text-primary); line-height: 1.1;">
            Sahyog: Integrated Recovery Network</h1>
        <p
            style="font-size: 1.25rem; color: var(--color-text-secondary); max-width: 700px; margin: 0 auto 3rem; line-height: 1.6;">
            A unified, data-driven platform for tracking counselling and de-addiction interventions across state and
            center facilities. Join the network to help us monitor patient recovery securely and effectively.
        </p>

        <div style="display: flex; gap: 1rem; justify-content: center;">
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-primary"
                    style="padding: 1rem 2rem; font-size: 1.1rem; box-shadow: 0 4px 14px rgba(217, 70, 239, 0.4);">Access
                    Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary"
                    style="padding: 1rem 2rem; font-size: 1.1rem; box-shadow: 0 4px 14px rgba(217, 70, 239, 0.4);">Login to
                    Portal</a>
                <a href="{{ route('about') }}" class="btn"
                    style="padding: 1rem 2rem; font-size: 1.1rem; border: 1px solid var(--color-border); background: var(--color-surface); color: var(--color-text-secondary);">Learn
                    More</a>
            @endauth
        </div>
    </main>

    <section id="contact" class="container" style="margin-top: 4rem; padding-bottom: 4rem;">
        <div class="card" style="max-width: 800px; margin: 0 auto; padding: 3rem;">
            <div style="text-align: center; margin-bottom: 2.5rem;">
                <h2 style="font-size: 2.5rem; color: var(--color-text-primary);">Contact Us</h2>
                <p style="color: var(--color-text-secondary);">Have questions? Get in touch with our support team.</p>
            </div>

            @if(session('success'))
                <div
                    style="background: #D1FAE5; color: #065F46; padding: 1rem; border-radius: var(--radius-md); margin-bottom: 2rem; text-align: center; font-weight: 500;">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div
                    style="background: #FEE2E2; color: #991B1B; padding: 1rem; border-radius: var(--radius-md); margin-bottom: 2rem;">
                    <ul style="margin: 0; padding-left: 1.5rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                    <div>
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="John Doe" required>
                    </div>
                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="john@example.com"
                            required>
                    </div>
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control" placeholder="How can we help?"
                        required>
                </div>

                <div style="margin-bottom: 2rem;">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" class="form-control" rows="5"
                        placeholder="Your message here..." required></textarea>
                </div>

                <div style="text-align: center;">
                    <button type="submit" class="btn btn-primary"
                        style="padding: 1rem 3rem; font-size: 1.1rem; border: none; cursor: pointer; display: inline-block;">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </section>

    <footer
        style="text-align: center; padding: 2rem; color: var(--color-text-secondary); border-top: 1px solid var(--color-border);">
        &copy; {{ date('Y') }} Sahyog: Integrated Recovery Network. All rights reserved.
    </footer>
</body>

</html>