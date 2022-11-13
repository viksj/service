<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seller Registration Form</title>
</head>
<body>

    @if ($errors->any())
        Error: {{implode('',$errors->all(':message'))}}
    @endif
    <form id="vendorFrom" action="{{ url('/vendor/register') }}" method="post">
        @csrf
        <input type="hidden" name="status" value="1"/>
        <div>
            <label>Enter your First Name</label>
            <input type="text" name="fname" id="fname">
            @if (Session::has('error_message'))
        <strong>Error: </strong>{{ Session::get('error_message')}}
    @endif
        </div>
        <div>
            <label>Enter your Last Name</label>
            <input type="text" name="lname" id="lname">
            @if (Session::has('error_message'))
        <strong>Error: </strong>{{ Session::get('error_message')}}
    @endif
        </div>
        <div>
            <label>Enter your Email</label>
            <input type="email" name="email" id="email">
            @if (Session::has('error_message'))
        <strong>Error: </strong>{{ Session::get('error_message')}}
    @endif
        </div>
        <div>
            <label>Enter your Mobile</label>
            <input type="tel" name="mobile" id="mobile">
            @if (Session::has('error_message'))
        <strong>Error: </strong>{{ Session::get('error_message')}}
    @endif
        </div>
        <div>
            <label>Enter your Password</label>
            <input type="password" name="password" id="password">
        </div>
        <input type="submit" value="submit">
    </form>
</body>
</html>
