<!DOCTYPE html>
<html>

<head>
    <title>Σελίδα Αντικειμένων</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <style>
        .resizable {
            width: 200px;
            height: 100px;
            padding: 0.5em;
            margin: 10px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }

        #sortable {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 60%;
        }

        #sortable div {
            margin: 3px 3px 3px 0;
            padding: 1px;
            float: left;
            font-size: 4em;
            text-align: center;
        }
    </style>

</head>

<body>
    <div id="sortable">
        @foreach ($items as $item)
            <div id="{{ $item['id'] }}" class="resizable">{{ $item['name'] }}</div>
        @endforeach
    </div>

    <script>
        $(document).ready(function() {
            $(".resizable").resizable();
            $("#sortable").sortable();
        });
    </script>

</body>

</html>