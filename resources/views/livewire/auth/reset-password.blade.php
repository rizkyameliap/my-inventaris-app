<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Locked]
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function mount(string $token): void
    {
        $this->token = $token;
        $this->email = request()->string('email');
    }

    public function resetPassword(): void
    {
        $this->validate([
            'token' => ['required'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $status = Password::reset(
            $this->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();
                event(new PasswordReset($user));
            }
        );

        if ($status != Password::PasswordReset) {
            $this->addError('email', __($status));
            return;
        }

        Session::flash('status', __($status));
        $this->redirectRoute('login', navigate: true);
    }
}; ?>

<div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
        <div class="card border-0 shadow-lg">
            <div class="card-body p-5">
                <!-- Header -->
                <div class="text-center mb-4">
                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="bi bi-shield-lock-fill text-success fs-4"></i>
                    </div>
                    <h2 class="fw-bold text-dark mb-2">{{ __('Reset Password') }}</h2>
                    <p class="text-muted">{{ __('Enter your new password below') }}</p>
                </div>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success text-center mb-4">{{ session('status') }}</div>
                @endif

                <form wire:submit="resetPassword">
                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('Email Address') }}</label>
                        <input wire:model="email" type="email" 
                               class="form-control form-control-lg @error('email') is-invalid @enderror" required>
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('New Password') }}</label>
                        <input wire:model="password" type="password" 
                               class="form-control form-control-lg @error('password') is-invalid @enderror"
                               placeholder="{{ __('Enter new password') }}" required>
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">{{ __('Confirm New Password') }}</label>
                        <input wire:model="password_confirmation" type="password" 
                               class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                               placeholder="{{ __('Confirm new password') }}" required>
                        @error('password_confirmation') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success btn-lg w-100">
                        {{ __('Reset Password') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>