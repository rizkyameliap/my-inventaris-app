<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $password = '';

    public function confirmPassword(): void
    {
        $this->validate(['password' => ['required', 'string']]);

        if (! Auth::guard('web')->validate([
            'email' => Auth::user()->email,
            'password' => $this->password,
        ])) {
            throw ValidationException::withMessages(['password' => __('auth.password')]);
        }

        session(['auth.password_confirmed_at' => time()]);
        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
        <div class="card border-0 shadow-lg">
            <div class="card-body p-5">
                <!-- Header -->
                <div class="text-center mb-4">
                    <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="bi bi-shield-check text-info fs-4"></i>
                    </div>
                    <h2 class="fw-bold text-dark mb-2">{{ __('Confirm Password') }}</h2>
                    <p class="text-muted">
                        {{ __('This is a secure area. Please confirm your password before continuing.') }}
                    </p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-info text-center mb-4">{{ session('status') }}</div>
                @endif

                <form wire:submit="confirmPassword">
                    <!-- Password -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">{{ __('Current Password') }}</label>
                        <input wire:model="password" type="password" 
                               class="form-control form-control-lg @error('password') is-invalid @enderror"
                               placeholder="{{ __('Enter your current password') }}" required autofocus>
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-info btn-lg w-100">
                        <i class="bi bi-check-lg me-2"></i>{{ __('Confirm') }}
                    </button>
                </form>

                <!-- Security Info -->
                <div class="mt-4 p-3 bg-light rounded">
                    <small class="text-muted d-flex align-items-start">
                        <i class="bi bi-shield-lock me-2 mt-1"></i>
                        {{ __('We ask for your password to ensure the security of your account when accessing sensitive areas.') }}
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>