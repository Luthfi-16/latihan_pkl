<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($barang && $promo)
    Promo untuk barang <strong>{{ $barang }}</strong> <br>
    Dengan kode promo <strong>{{ $promo }}</strong>
    @elseif($barang)
    Promo untuk barang <strong>{{ $barang }}</strong>   
    @else
    Menampilkan semua promo barang    
    @endif
</body>
</html>