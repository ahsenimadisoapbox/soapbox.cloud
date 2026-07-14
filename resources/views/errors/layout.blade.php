<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | SoapBox</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        .sb-error-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;

            background:
                radial-gradient(circle at top right,
                    rgba(86, 182, 43, .12),
                    transparent 35%),

                radial-gradient(circle at bottom left,
                    rgba(30, 99, 172, .12),
                    transparent 35%),

                linear-gradient(135deg,
                    #F6F9FC,
                    #EEF3F8,
                    #E6EDF5);
        }

        .error-card {
            background: rgba(255, 255, 255, .85);
            backdrop-filter: blur(15px);
            border-radius: 32px;
            padding: 60px;
            text-align: center;
            max-width: 850px;
            width: 100%;
            margin: auto;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .08);
        }

        .error-logo {
            max-width: 260px;
            margin-bottom: 30px;
        }

        .error-code {
            font-size: 140px;
            font-weight: 900;
            line-height: 1;

            background: linear-gradient(90deg,
                    #1e63ac,
                    #56b62b);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .error-title {
            font-size: 42px;
            font-weight: 800;
            color: #0b1c2c;
        }

        .error-description {
            color: #64748b;
            font-size: 18px;
            max-width: 650px;
            margin: auto;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            background: #dff2ea;
            color: #0f766e;

            padding: 10px 18px;
            border-radius: 999px;
            margin-bottom: 20px;
        }

        .status-badge .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #4ade80;
        }

        @media(max-width:768px) {

            .error-card {
                padding: 35px;
            }

            .error-code {
                font-size: 90px;
            }

            .error-title {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

    <section class="sb-error-page">
        <div class="container">
            <div class="error-card">

                <img src="{{ asset('images/logo.png') }}" class="error-logo" alt="SoapBox">

                <div class="error-code">
                    @yield('code')
                </div>

                <h1 class="error-title">
                    @yield('heading')
                </h1>

                <p class="error-description mb-4">
                    @yield('message')
                </p>

                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="{{ url('/') }}" class="btn btn-success px-4">
                        Go Home
                    </a>

                    <a href="{{ url('/contact') }}" class="btn btn-outline-secondary px-4">
                        Contact Support
                    </a>
                </div>

                <div class="mt-5">
                    <small class="text-muted">
                        SoapBox Cloud Platform • Safety • Compliance • Operations
                    </small>
                </div>

            </div>
        </div>
    </section>

</body>

</html>