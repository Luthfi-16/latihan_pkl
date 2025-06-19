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
    <form action="/buku" method="POST">
        @csrf
        <table>
            <tr>
                <td>Judul :</td>
                <td><input type="text" name="judul" placeholder="Tambahkan Judul Buku" required></td>
            </tr>
            <tr>
                <td>Harga :</td>
                <td><input type="number" name="harga" required></td>
            </tr>
            <tr>
                <td>Kategori :</td>
                <td><select name="kategori" id="">
                    <option value="Self Improvement">Self Improvement</option>
                    <option value="Bacaan">Bacaan</option>
                    <option value="Teknologi">Teknologi</option>
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