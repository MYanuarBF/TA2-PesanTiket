<!DOCTYPE html>
<html>
<head>
    <title>Nota Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 20px;
        }
        .content table {
            width: 100%;
            border-collapse: collapse;
        }
        .content table, .content th, .content td {
            border: 1px solid black;
        }
        .content th, .content td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nota Transaksi</h1>
        </div>
        <div class="content">
            <table>
                <tr>
                    <th>Nama Lengkap</th>
                    <td>{{ $transaction->nama_lengkap }}</td>
                </tr>
                <tr>
                    <th>Nomor Telepon</th>
                    <td>{{ $transaction->nomor_telepon }}</td>
                </tr>
                <tr>
                    <th>Jumlah Orang</th>
                    <td>{{ $transaction->jumlah_orang }}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{ $transaction->tanggal }}</td>
                </tr>
                <tr>
                    <th>Total Harga</th>
                    <td>{{ $transaction->total_harga }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $transaction->status }}</td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p>Terima kasih telah melakukan transaksi.</p>
        </div>
    </div>
</body>
</html>
