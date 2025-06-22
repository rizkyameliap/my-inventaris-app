<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Inventaris App') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Livewire Styles -->
    @livewireStyles

    <!-- Custom Styles for Modern UI -->
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f8f9fa;
        }
        ::-webkit-scrollbar-thumb {
            background: #dee2e6;
            border-radius: 3px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #adb5bd;
        }

        /* Smooth animations */
        * {
            transition: all 0.2s ease-in-out;
        }

        /* Custom body background */
        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Modern card styles */
        .modern-card {
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            transition: all 0.2s ease-in-out;
        }

        .modern-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        /* Navigation active state */
        .nav-link.active {
            background-color: rgba(13, 110, 253, 0.1);
            border-radius: 0.375rem;
        }

        /* Modern button styles */
        .btn-modern {
            border-radius: 0.5rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border: none;
            background: linear-gradient(135deg, #007bff 0%, #6f42c1 100%);
            color: white;
            transition: all 0.2s ease-in-out;
        }

        .btn-modern:hover {
            transform: translateY(-1px);
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.2);
            color: white;
        }

        /* Custom form controls */
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        /* Page header styles */
        .page-header {
            background: white;
            border-bottom: 1px solid #dee2e6;
            padding: 1rem 0;
        }

        /* Footer styles */
        .footer {
            background: white;
            border-top: 1px solid #dee2e6;
            margin-top: auto;
        }

        /* Loading animation */
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Table hover effects */
        .table-hover tbody tr:hover {
            background-color: rgba(0, 123, 255, 0.05);
        }

        /* Badge styles */
        .badge {
            font-weight: 500;
        }

        /* Dropdown improvements */
        .dropdown-menu {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.175);
            border-radius: 0.5rem;
        }

        .dropdown-item:hover {
            background-color: rgba(0, 123, 255, 0.1);
        }

        /* Progress bar improvements */
        .progress {
            border-radius: 1rem;
            height: 8px;
        }

        .progress-bar {
            border-radius: 1rem;
        }

        /* Alert improvements */
        .alert {
            border: none;
            border-radius: 0.5rem;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- Navigation -->
    <x-layouts.navigation />

    <!-- Page Header -->
    @if (isset($header))
        <div class="page-header">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        {{ $header }}
                    </div>
                    
                    <!-- Header Actions -->
                    <div class="d-flex align-items-center gap-2">
                        <!-- Notification Button -->
                        <button class="btn btn-outline-secondary btn-sm rounded-circle p-2" type="button">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M15 17h5l-5 5v-5z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M4 4h7v7H4z"></path>
                            </svg>
                        </button>
                        
                        <!-- Search Button -->
                        <button class="btn btn-outline-secondary btn-sm rounded-circle p-2" type="button">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main class="flex-fill fade-in">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="footer py-3">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
                <div class="d-flex align-items-center">
                    <p class="mb-0 text-muted small">
                        © {{ date('Y') }} {{ config('app.name', 'Inventaris App') }}. All rights reserved.
                    </p>
                </div>
                
                <div class="d-flex align-items-center gap-3">
                    <a href="#" class="text-muted text-decoration-none small">Privacy</a>
                    <a href="#" class="text-muted text-decoration-none small">Terms</a>
                    <a href="#" class="text-muted text-decoration-none small">Support</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Livewire Scripts -->
    @livewireScripts

    <!-- Custom JavaScript for Modern Interactions -->
    <script>
        // Add smooth scrolling
        document.documentElement.style.scrollBehavior = 'smooth';
        
        // Add loading state management
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            // Add hover effects to cards
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    if (!this.classList.contains('no-hover')) {
                        this.style.transform = 'translateY(-2px)';
                        this.style.boxShadow = '0 0.5rem 1rem rgba(0, 0, 0, 0.15)';
                    }
                });
                
                card.addEventListener('mouseleave', function() {
                    if (!this.classList.contains('no-hover')) {
                        this.style.transform = 'translateY(0)';
                        this.style.boxShadow = '';
                    }
                });
            });

            // Add fade-in animation to main content
            const mainContent = document.querySelector('main');
            if (mainContent) {
                mainContent.classList.add('fade-in');
            }
        });

        // Enhanced table interactions
        function enhanceTableInteractions() {
            const tableRows = document.querySelectorAll('.table tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('click', function() {
                    // Remove active class from all rows
                    tableRows.forEach(r => r.classList.remove('table-active'));
                    // Add active class to clicked row
                    this.classList.add('table-active');
                });
            });
        }

        // Initialize enhanced interactions
        document.addEventListener('DOMContentLoaded', enhanceTableInteractions);

        // Form validation enhancements
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        // Auto-hide alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert:not(.alert-permanent)');
            alerts.forEach(alert => {
                setTimeout(() => {
                    const bsAlert = new bootstrap.Alert(alert);
                    if (bsAlert) {
                        bsAlert.close();
                    }
                }, 5000);
            });
        });
    </script>
</body>
</html>