<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers</title>
    <style>
        .center {
            margin: auto;
            width: 100%;
            /* border: 3px solid green; */
            padding: 10px;
        }

        .text-center {
            text-align: center;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid black;
            padding: 8px;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #FBDA03;
            color: black;
        }
        td.no-border {
            border: none !important;
            position: relative;
            border-bottom-style:double !important;
            border-bottom-color:#000 !important;
            border-bottom-width:4px !important;
        }

    </style>
</head>

<body>
    <br>
    <div class="center">
        <center>
            <img src="{{ asset('images/black-logo.png') }}" style="width:150px">
        </center>
        <table id="customers" width="100%">
            <tr>
                <th>#</th>
                <th >Name</th>
                <th >Email</th>

            </tr>
            @forelse ($records as $index=>$item)
                <tr>
                    <td>{{++$index}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No record found</td>
                </tr>
            @endforelse
        </table>

    </div>
</body>

</html>
