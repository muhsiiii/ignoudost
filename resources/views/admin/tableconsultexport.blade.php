<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        .lead-heading{
            display: table;
            margin-left: auto;
            margin-right: auto;
            
        }
    </style>
</head>

<body>

    <h2 class="lead-heading">Ignou Leads</h2>

    <table>
        <tr>
            <th scope="col">Sl.No</th>
            <th scope="col">Name</th>
            <th scope="col">Qualification</th>
            <th scope="col">Course Selected</th>
            <th scope="col">Reason</th>
            <th scope="col">Phone Number</th>
        </tr>
        @foreach ($Consultaions as $Consultaion)
            <tr>

                <td>{{ $loop->iteration }}</td>
                <td>{{ $Consultaion->name }}</td>
                <td>{{ $Consultaion->qualification }}</td>
                <td>{{ $Consultaion->course }}</td>
                <td>{{ $Consultaion->reason }}</td>
                <td>{{ $Consultaion->mobile }}</td>
            </tr>
        @endforeach

    </table>

</body>

</html>
