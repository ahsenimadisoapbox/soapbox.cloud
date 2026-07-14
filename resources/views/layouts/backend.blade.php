<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Juned-hash/rich-editor/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3/dist/style.min.css">

    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <style>
        .datatable-top,
        .datatable-bottom {
            padding: 1rem 0;
        }

        .datatable-input {
            border: 1px solid #dee2e6;
            border-radius: .375rem;
            padding: .375rem .75rem;
        }

        .datatable-selector {
            border: 1px solid #dee2e6;
            border-radius: .375rem;
            padding: .375rem 2rem .375rem .75rem;
        }

        .datatable-pagination a {
            padding: .375rem .75rem;
            border-radius: .375rem;
        }
    </style>
    @stack('styles')
</head>

<body>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <h4 class="text-center py-3">Admin</h4>

        <ul class="nav flex-column">

            {{-- DASHBOARD --}}
            <li class="sidebar-heading">Dashboard</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="bi bi-speedometer2"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            {{-- SEO & MARKETING --}}
            <li class="sidebar-heading mt-3">SEO & Marketing</li>

            <li class="nav-item">
                <a href="{{ route('admin.metas.index') }}" class="nav-link">
                    <i class="bi bi-tags"></i>
                    <span class="nav-text">Meta Tags</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.blogs.index') }}" class="nav-link">
                    <i class="bi bi-pencil-square"></i>
                    <span class="nav-text">Blogs</span>
                </a>
            </li>

            

            {{-- WEBSITE CONTENT --}}
            <li class="sidebar-heading mt-3">Website Content</li>

            <li class="nav-item">
                <a href="{{ route('admin.popups.index') }}" class="nav-link">
                    <i class="fas fa-image"></i>
                    <span class="nav-text">Popups</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.faqs.index') }}" class="nav-link">
                    <i class="bi bi-question-circle"></i>
                    <span class="nav-text">FAQs</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.legal-pages.index') }}" class="nav-link">
                    <i class="bi bi-file-earmark-text"></i>
                    <span class="nav-text">Legal Pages</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.media.index') }}" class="nav-link">
                    <i class="bi bi-images"></i>
                    <span class="nav-text">Media Library</span>
                </a>
            </li>

            {{-- PRODUCT MANAGEMENT --}}
            <li class="sidebar-heading mt-3">Product Management</li>

            <li class="nav-item">
                <a href="{{ route('admin.categories.index') }}" class="nav-link">
                    <i class="bi bi-list"></i>
                    <span class="nav-text">Categories</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.modules.index') }}" class="nav-link">
                    <i class="bi bi-folder"></i>
                    <span class="nav-text">Modules</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('ehs-ai-modules.index') }}" class="nav-link">
                    <i class="bi bi-cpu"></i>
                    <span class="nav-text">EHS AI Modules</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.industries.index') }}" class="nav-link">
                    <i class="bi bi-buildings"></i>
                    <span class="nav-text">Industries</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.services.index') }}" class="nav-link">
                    <i class="bi bi-briefcase"></i>
                    <span class="nav-text">Services</span>
                </a>
            </li>

            

            {{-- LEADS & ANALYTICS --}}
            <li class="sidebar-heading mt-3">Leads & Analytics</li>

            <li class="nav-item">
                <a href="{{ route('admin.ehs_assessments.index') }}" class="nav-link">
                    <i class="bi bi-file-earmark-text"></i>
                    <span class="nav-text">EHS Assessments</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.demo.index') }}" class="nav-link">
                    <i class="bi bi-box-seam"></i>
                    <span class="nav-text">Demo Requests</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.contacts.index') }}" class="nav-link">
                    <i class="bi bi-envelope"></i>
                    <span class="nav-text">Contact Leads</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.visitor-analytics.index') }}" class="nav-link">
                    <i class="bi bi-graph-up-arrow"></i>
                    <span class="nav-text">Visitor Analytics</span>
                </a>
            </li>

            {{-- NAVIGATION --}}
            <li class="sidebar-heading mt-3">Navigation</li>

            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="bi bi-house"></i>
                    <span class="nav-text">Back to Homepage</span>
                </a>
            </li>

        </ul>
    </div>

    <!-- Main Content -->
    <div id="main" class="main-content">

        <!-- Topbar -->
        <div class="topbar">
            <button id="toggleBtn" class="btn btn-light">
                <i class="bi bi-list"></i>
            </button>

            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle"></i> Admin
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    {{-- Option 1: Link to the console dashboard (recommended) --}}
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.console.index') }}">
                            System Console
                        </a>
                    </li>

                    {{-- Option 2: Keep individual links — open the result page via a small inline form --}}
                    <li>
                        <form method="POST" action="{{ route('admin.console.run', 'migrate') }}" style="display:inline;"
                            id="nav-migrate-form">
                            @csrf
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('nav-migrate-form').submit();">
                                Migrate
                            </a>
                        </form>
                    </li>

                    <li>
                        <form method="POST" action="{{ route('admin.console.run', 'clear-cache') }}"
                            style="display:inline;" id="nav-clear-cache-form">
                            @csrf
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('nav-clear-cache-form').submit();">
                                Clear Cache
                            </a>
                        </form>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST" action="/logout">
                            @csrf
                            <button class="dropdown-item text-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Content -->
        <div class="container-fluid p-4">
            @session('success')
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endsession
            @session('danger')
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
            @endsession
            @session('error')
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endsession
            @yield('content')
        </div>

    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const toggleBtn = document.getElementById('toggleBtn');
        const sidebar = document.getElementById('sidebar');
        const main = document.getElementById('main');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            main.classList.toggle('collapsed');
        });

            window.mediaLibrary = {!! json_encode(
        \App\Models\Media::select(
            'image',
            'path',
            'title',
            'alt',
            'redirect_url'
        )->get()
    ) !!};
    </script>

    <script
    src="https://cdn.jsdelivr.net/gh/Juned-hash/rich-editor/main.js">
    </script>
    <script src="{{ asset('admin/js/script.js') }}?v={{ filemtime(public_path('admin/js/script.js')) }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        new simpleDatatables.DataTable(".table", {
            searchable: true,
            sortable: true,
            perPage: 10,
            perPageSelect: [10, 25, 50, 100],
            fixedHeight: false
        });
    });
    </script>
    @stack('scripts')
</body>

</html>