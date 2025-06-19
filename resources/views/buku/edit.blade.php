<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Tambah Data Buku</h2>
    <form action="/buku/{{ $buku['id']}}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>Judul :</td>
                <td><input type="text" name="judul" value="{{ $buku['judul']}}" required></td>
            </tr>
            <tr>
                <td>Harga :</td>
                <td><input type="number" name="harga" value="{{ $buku['harga']}}" required></td>
            </tr>
            <tr>
                <td>Kategori :</td>
                <td>
                    <select name="kategori" id="">
                        <option value="Self Improvement" {{ $buku['kategori']=='Self Improvement' ? 'selected' : ''}}>Self Improvement</option>
                        <option value="Bacaan" {{ $buku['kategori']=='Bacaan' ? 'selected' : ''}}>Bacaan</option>
                        <option value="Teknologi" {{ $buku['kategori']=='Teknologi' ? 'selected' : ''}} >Teknologi</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit"> Simpan </button> | <button type="reset">Refresh</button>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>