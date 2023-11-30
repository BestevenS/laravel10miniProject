<!DOCTYPE html>
<html>

<head>
    <title>Σελίδα Αντικειμένων</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .resizable {
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
        @foreach ($items->sortBy('position') as $item)
            <div id="item-{{ $item->id }}" class="resizable"
                style="width: {{ $item->width }}px; height: {{ $item->height }}px;">{{ $item->name }}</div>
        @endforeach
    </div>

    <!-- Κουμπί για την αποθήκευση των αλλαγών -->
    <button onclick="saveChanges()">Αποθήκευση Αλλαγών</button>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".resizable").resizable();
            $("#sortable").sortable();
        });

        // Η συνάρτηση saveChanges που καλείται όταν πατηθεί το κουμπί
        function saveChanges() {
            var itemsData = [];

            $('#sortable .resizable').each(function() {
                var item = {
                    id: $(this).attr('id').split('-')[1], // Αναμένεται ότι το id θα έχει μορφή 'item-{id}'
                    name: $(this).text().trim(), // Χρησιμοποιήστε την .trim() για να αφαιρέσετε περιττά κενά
                    width: $(this).width(),
                    height: $(this).height(),
                    position: $(this).index()
                };
                itemsData.push(item);
            });

            $.ajax({
                url: '/items/store',
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}", // Προσθήκη του CSRF token
                    items: itemsData
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }
    </script>

</body>

</html>
