<x-layout>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.6.0/jqc-1.12.4/dt-1.11.2/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/jqc-1.12.4/dt-1.11.2/datatables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <div class="card">
        <div class="card-header">
            Diagnoses
        </div>
        <div class="card-body" >
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Symptomps
                        </th>
                        <th>
                            Medicines
                        </th>
                        <th>
                            Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $item)
                        <tr>
                            <td>
                                {{ $item->diagnosis->name }}
                            </td>
                            <td>
                                <ul>
                                    @foreach ($item->diagnosis->symptoms as $s)
                                        <li>
                                            {{ $s->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    @foreach ($item->diagnosis->medicines as $m)
                                        <li>
                                            {{ $m->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                {{ $item->created_at->format('M d, Y h:i a') }}
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