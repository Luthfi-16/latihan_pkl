
<?php
    $nama = "Kupik"
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @php
        $umur = 17;
    @endphp

    <p>Halo Nama Saya <?php echo $nama; ?> <br>
        Umur Saya {{ $umur }}
    </p>

</body>
</html>