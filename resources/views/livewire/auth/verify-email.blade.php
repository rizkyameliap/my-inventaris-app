<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public function sendVerification(): void
    {
        if (Auth::user()->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
            return;
        }

        Auth::user()->sendEmailVerificationNotification();
        Session::flash('status', 'verification-link-sent');
    }

    public function logout(Logout $logout): void
    {
        $logout();
        $this->redirect('/', navigate: true);
    }
}; ?>

<div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
        <div class="card border-0 shadow-lg">
            <div class="card-body p-5">
                <!-- Header -->
                <div class="text-center mb-4">
                    <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-envelope-check-fill text-warning fs-1"></i>
                    </div>
                    <h2 class="fw-bold text-dark mb-2">{{ __('Verify Your Email') }}</h2>
                    <p class="text-muted">
                        {{ __('We\'ve sent a verification link to your email address. Please check your inbox and click the link to verify your account.') }}
                    </p>
                </div>

                <!-- Status Messages -->
                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success text-center mb-4">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ __('A new verification link has been sent to your email address.') }}
                    </div>
                @endif

                <!-- Actions -->
                <div class="d-grid gap-3">
                    <button wire:click="sendVerification" class="btn btn-primary btn-lg">
                        <i class="bi bi-arrow-clockwise me-2"></i>{{ __('Resend Verification Email') }}
                    </button>
                    
                    <button wire:click="logout" class="btn btn-outline-secondary">
                        <i class="bi bi-box-arrow-right me-2"></i>{{ __('Sign Out') }}
                    </button>
                </div>

                <!-- Info -->
                <div class="text-center mt-4">
                    <small class="text-muted">
                        <i class="bi bi-info-circle me-1"></i>
                        {{ __('Didn\'t receive the email? Check your spam folder or try resending.') }}
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>