<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        event(new Registered(($user = User::create($validated))));
        Auth::login($user);
        $this->redirectIntended(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
        <div class="card border-0 shadow-lg">
            <div class="card-body p-5">
                <!-- Header -->
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-dark mb-2">{{ __('Create Account') }}</h2>
                    <p class="text-muted">{{ __('Join us today') }}</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success text-center mb-4">{{ session('status') }}</div>
                @endif

                <form wire:submit="register">
                    <!-- Name -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('Full Name') }}</label>
                        <input wire:model="name" type="text" 
                               class="form-control form-control-lg @error('name') is-invalid @enderror"
                               placeholder="{{ __('Enter your full name') }}" required autofocus>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('Email Address') }}</label>
                        <input wire:model="email" type="email" 
                               class="form-control form-control-lg @error('email') is-invalid @enderror"
                               placeholder="email@example.com" required>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('Password') }}</label>
                        <input wire:model="password" type="password" 
                               class="form-control form-control-lg @error('password') is-invalid @enderror"
                               placeholder="{{ __('Create a password') }}" required>
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">{{ __('Confirm Password') }}</label>
                        <input wire:model="password_confirmation" type="password" 
                               class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                               placeholder="{{ __('Confirm your password') }}" required>
                        @error('password_confirmation') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                        {{ __('Create Account') }}
                    </button>
                </form>

                <div class="text-center">
                    <span class="text-muted">{{ __('Already have an account?') }}</span>
                    <a href="{{ route('login') }}" wire:navigate class="text-decoration-none fw-semibold">
                        {{ __('Sign In') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>