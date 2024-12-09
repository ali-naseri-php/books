<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('css/all-book.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body >
<div class="container">
    <h2>sales controll<small> for admin</small></h2>
    <ul class="responsive-table">
        <li class="table-header">
            <div class="col col-1"> Id </div>
            <div class="col col-2"> book</div>
            <div class="col col-3">user</div>

            <div class="col col-5">del</div>
        </li>
        @foreach( $sales as $sale)
            <li class="table-row">
                {{$sale->name}}
                <div class="col col-1" data-label="Job Id">{{ $sale->id }}  </div>
                <div class="col col-2" data-label="Customer Name">{{ $sale->book}}  </div>
                <div class="col col-3" data-label="Amount">{{ $sale->user}}  </div>

                <div class="col col-5" data-label="Payment Status">
                    <form action="{{ route('admin.sale', ['sale' => $sale->id]) }}" method="get">
                        @csrf
                        <button type="submit">del</button>
                    </form>
                </div>
            </li>
        @endforeach

    </ul>
</div>

</body>
</html>
