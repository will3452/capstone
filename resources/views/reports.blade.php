<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports : {{request()->from}} - {{request()->to}}</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.1.0/build/pure-min.css" integrity="sha384-yHIFVG6ClnONEA5yB5DJXfW2/KC173DIQrYoZMEtBvGzmf0PKiGyNEqe9N6BNDBH" crossorigin="anonymous">
    <style>
        @media print {
            .pure-button {
                display:none;
            }
        }
    </style>
</head>
<body>
    <h4 style="text-align: center">
        Report : {{request()->from}} - {{request()->to}}
    </h4>
    <div style="margin: 10px 5px;" onclick="window.print()">
        <button class="pure-button ">
            Print
        </button>
    </div>
    <table class="pure-table pure-table-bordered" style="width:100vw;">
        <thead>
            <tr>
                <th>
                    No.
                </th>
                <th>
                    User
                </th>
                <th>
                    Date
                </th>
                <th>
                    Time
                </th>
                <th>
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $key => $item)
                <tr>
                    <td>
                        {{$key + 1}}
                    </td>
                    <td>
                        {{$item->user->name}}
                    </td>
                    <td>
                        {{$item->date->format('M d, Y')}}
                    </td>
                    <td>
                        {{$item->time}}
                    </td>
                    <td>
                        {{$item->status}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
