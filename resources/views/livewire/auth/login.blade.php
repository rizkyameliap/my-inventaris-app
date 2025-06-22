<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    public function login(): void
    {
        $this->validate();
        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());
            throw ValidationException::withMessages(['email' => __('auth.failed')]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();
        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) return;

        event(new Lockout(request()));
        $seconds = RateLimiter::availableIn($this->throttleKey());
        throw ValidationException::withMessages([
            'email' => __('auth.throttle', ['seconds' => $seconds, 'minutes' => ceil($seconds / 60)])
        ]);
    }

    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}; ?>

<div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
        <div class="card border-0 shadow-lg">
            <div class="card-body p-5">
                <!-- Header -->
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-dark mb-2">{{ __('Welcome Back') }}</h2>
                    <p class="text-muted">{{ __('Sign in to your account') }}</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success text-center mb-4">{{ session('status') }}</div>
                @endif

                <form wire:submit="login">
                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('Email Address') }}</label>
                        <input wire:model="email" type="email" 
                               class="form-control form-control-lg @error('email') is-invalid @enderror"
                               placeholder="email@example.com" required autofocus>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label fw-semibold">{{ __('Password') }}</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" wire:navigate 
                                   class="text-decoration-none small">{{ __('Forgot Password?') }}</a>
                            @endif
                        </div>
                        <input wire:model="password" type="password" 
                               class="form-control form-control-lg @error('password') is-invalid @enderror"
                               placeholder="{{ __('Enter your password') }}" required>
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-4">
                        <div class="form-check">
                            <input wire:model="remember" type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">{{ __('Remember me') }}</label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                        {{ __('Sign In') }}
                    </button>
                </form>

                @if (Route::has('register'))
                    <div class="text-center">
                        <span class="text-muted">{{ __("Don't have an account?") }}</span>
                        <a href="{{ route('register') }}" wire:navigate class="text-decoration-none fw-semibold">
                            {{ __('Sign Up') }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>