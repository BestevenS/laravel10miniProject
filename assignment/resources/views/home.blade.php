    <style>
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            outline: none;
            color: #fff;
            background-color: #614caf;
            border: none;
            border-radius: 15px;
            box-shadow: 0 9px #999;
        }

        .button:hover {
            background-color: #614caf
        }

        .button:active {
            background-color: #614caf;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }
    </style>
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h1>Καλωσήρθατε στην Αρχική Σελίδα</h1>

    <a href="/chart" class="button">Σελίδα Διαγράμματος</a>
    <a href="/items" class="button">Σελίδα Αντικειμένων</a>
@endsection
