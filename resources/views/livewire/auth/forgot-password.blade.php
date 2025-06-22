<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $email = '';

    public function sendPasswordResetLink(): void
    {
        $this->validate(['email' => ['required', 'string', 'email']]);
        Password::sendResetLink($this->only('email'));
        session()->flash('status', __('A reset link will be sent if the account exists.'));
    }
}; ?>

<div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
        <div class="card border-0 shadow-lg">
            <div class="card-body p-5">
                <!-- Header -->
                <div class="text-center mb-4">
                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="bi bi-key-fill text-primary fs-4"></i>
                    </div>
                    <h2 class="fw-bold text-dark mb-2">{{ __('Forgot Password?') }}</h2>
                    <p class="text-muted">{{ __('No worries, we\'ll send you reset instructions') }}</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success text-center mb-4">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('status') }}
                    </div>
                @endif

                <form wire:submit="sendPasswordResetLink">
                    <!-- Email -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">{{ __('Email Address') }}</label>
                        <input wire:model="email" type="email" 
                               class="form-control form-control-lg @error('email') is-invalid @enderror"
                               placeholder="email@example.com" required autofocus>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                        {{ __('Send Reset Link') }}
                    </button>
                </form>

                <div class="text-center">
                    <a href="{{ route('login') }}" wire:navigate 
                       class="text-decoration-none d-inline-flex align-items-center">
                        <i class="bi bi-arrow-left me-2"></i>{{ __('Back to Sign In') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>