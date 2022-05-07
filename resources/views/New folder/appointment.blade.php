<x-layout>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.6.0/jqc-1.12.4/dt-1.11.2/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/jqc-1.12.4/dt-1.11.2/datatables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <div class="card">
        <div class="card-header">
            My Appointment
        </div>
        <div class="card-body">
            <table id="myTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            Date
                        </th>
                        <th>
                            Time
                        </th>
                        <th>
                            Purpose
                        </th>
                        <td>
                            Status
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $item)
                        <tr>
                            <td>
                                {{ $item->date->format('M d, Y') }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->time)->format('h:i A') }}
                            </td>
                            <td>
                                {{ $item->purpose }}
                            </td>
                            <td>
                                {{ $item->status }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
       $('#myTable').DataTable()
    </script>
</x-layout>