<x-guest-layout>
    <div class="card" style="margin-top: 2rem; border-top: 4px solid var(--color-accent);">
        <h2 style="text-align: center; margin-bottom: 2rem;">Create an Account</h2>
        
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name">Full Name</label>
                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus>
                <x-input-error :messages="$errors->get('name')" class="mt-2" style="color: var(--color-danger); font-size: 0.85rem;" />
            </div>

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email">Email Address</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required>
                <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: var(--color-danger); font-size: 0.85rem;" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password">Password</label>
                <input id="password" class="form-control" type="password" name="password" required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: var(--color-danger); font-size: 0.85rem;" />
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: var(--color-danger); font-size: 0.85rem;" />
            </div>

            <div style="display: flex; flex-direction: column; gap: 1rem; margin-top: 2rem;">
                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 0.8rem; font-size: 1.1rem;">
                    Create Account
                </button>
                <a href="{{ route('login') }}" style="text-align: center; font-size: 0.9rem; color: var(--color-text-secondary);">
                    Already registered? Log in instead.
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
