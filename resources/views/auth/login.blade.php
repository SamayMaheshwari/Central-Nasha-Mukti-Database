<x-guest-layout>
    <div class="card" style="margin-top: 2rem; border-top: 4px solid var(--color-accent);">
        <h2 style="text-align: center; margin-bottom: 2rem;">Log In to Your Account</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" style="color: var(--color-accent); text-align: center; margin-bottom: 1rem;" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-3">
                <label for="email">Email Address</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: var(--color-danger); font-size: 0.85rem;" />
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password">Password</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: var(--color-danger); font-size: 0.85rem;" />
            </div>

            <!-- Remember Me -->
            <div class="mb-3" style="display: flex; align-items: center; gap: 0.5rem; margin-top: 1.5rem;">
                <input id="remember_me" type="checkbox" name="remember" style="accent-color: var(--color-accent); width: 1rem; height: 1rem;">
                <label for="remember_me" style="margin: 0;">Remember me</label>
            </div>

            <div style="display: flex; flex-direction: column; gap: 1rem; margin-top: 2rem;">
                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 0.8rem; font-size: 1.1rem;">
                    Log in
                </button>
                
                <div style="display: flex; justify-content: space-between; margin-top: 0.5rem; font-size: 0.9rem;">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" style="color: var(--color-text-secondary);">
                            Forgot your password?
                        </a>
                    @endif
                    <a href="{{ route('register') }}" style="color: var(--color-accent); font-weight: 500;">
                        Create an account
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>
