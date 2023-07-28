<!DOCTYPE html>
<html>

<head>

    <title>Client Summary</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;

            font-size: 10pt;
        }

        h1 {
            font-size: 22pt;
        }

        table {
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #777;
            padding: 2px;
        }
    </style>
</head>
<body>
    <p style="text-align: center; margin-bottom: 18pt; font-size: 20px;">

        <b>Catering Reservation Confirmation <br>
            Aparicio's Fine Fare Catering <br>
            Tel: 09606765143</b>

    </p> <br> <br>

    <h1 style="">Customer Details</h1>
    <h1 style="font-size: 20px;">Name: {{$client->name}}</h1>
    <h1 style="font-size: 20px;">Address: {{$client->address}}</h1>
    <h1 style="font-size: 20px;">Contact: {{$client->contact}}</h1>
    <h1 style="font-size: 20px;">Email: {{$client->email}}</h1>

  <br> <br> <br> <br>

    <h1 style="">Category Details</h1>

    <table style="font-size: 20px">
        <thead>
            <tr>
                <th>Appetizers</th>
                <th>Salads</th>
                <th>Main Courses</th>
                <th>Desserts</th>
                <th>Beverages</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$client->appetizers}}</td>
                <td>{{$client->salads}}</td>
                <td>{{$client->main_courses}}</td>
                <td>{{$client->desserts}}</td>
                <td>{{$client->beverages}}</td>

            </tr>
        </tbody>
    </table>

    {{-- <h1 style="font-size: 20px;">Appetizers: {{$client->appetizers}}</h1>
    <h1 style="font-size: 20px;">Salads: {{$client->salads}}</h1>
    <h1 style="font-size: 20px;">Main Courses: {{$client->main_courses}}</h1>
    <h1 style="font-size: 20px;">Desserts: {{$client->desserts}}</h1>
    <h1 style="font-size: 20px;">Beverages: {{$client->beverages}}</h1> --}}
 <br> <br> <br> <br> <br> <br>



 <h1 style="font-size: 40px;">Total Price: {{$client->price}}</h1>



{{--
    <div style="padding: 50px; background-color: #e9e9e9; font-size: 35px">
        Title: {{$client->title}} <br> <br> <br>
        Author: {{$client->author}} <br> <br> <br>
        Subject: {{$client->subject}} <br> <br>
        <div style="padding: 25px; background-color: #777; color:white; font-size: 25px">
            <b style="font-size: 30px">Description</b> <br> <br>
            {{$client->bio}}
        </div>
    </div> --}}

</body>
</html>
