<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $toko->nama }}</title>
    <style>
        * {
            font-family: Verdana, sans-serif;
            font-size: 10pt;
        }
    </style>
</head>

<body style="margin: 0 3%">
    <div style="margin: 16px 0; text-align:left">
        Report Toko Layanan Lembaga untuk {{ $title }} <br>
        {{ pondok('nama') }} <br>
        {{ pondok('alamat') }} <br>
    </div>
    <div style="margin: 16px 0; text-align:left">
        TOKO : {{ strtoupper($toko->nama) }} <br>
        PEMILIK : {{ strtoupper($toko->pemilik) }}<br>
        PHONE : {{ strtoupper($toko->phone) }}<br>
    </div>
    <hr>
    <table style="width: 100%; border-collapse:collapse;" border="1">
        <thead style="width: 100%; text-align:left; background-color: #eee;">
            <tr tabindex="0">
                <th style="padding: 8px;">#</th>
                <th style="padding: 8px;">Invoice</th>
                <th style="padding: 8px;">Nama</th>
                <th style="padding: 8px;">Code</th>
                <th style="padding: 8px;">Desc</th>
                <th style="padding: 8px;">Nominal</th>
                <th style="padding: 8px;">Kode Toko</th>
                <th style="padding: 8px;">Transaksi</th>
            </tr>
        </thead>
        <tbody style="width: 100%; text-align:left;">
            <?php $i = 1; ?>
            @foreach ($transaksi as $item)
            <tr>
                <td style="padding: 8px; text-align:center;">{{ $i++ }}</td>
                <td style="padding: 8px;">{{ $item->invoice }}</td>
                <td style="padding: 8px;">{{ $item->santri->nama }}</td>
                <td style="padding: 8px;">{{ $item->santri->code }}</td>
                <td style="padding: 8px;">{{ $item->desc }}</td>
                <td style="padding: 8px; text-align:right;">{{ number_format($item->nominal) }}</td>
                <td style="padding: 8px;">{{ $item->toko->hash }}</td>
                <td style="padding: 8px;">{{ $item->created_at }}</td>
            </tr>
            @endForeach
            <tr style="background-color: #f5e5d7;">
                <td style="padding: 8px;" colspan="6"><small>Di cetak pada : {{ date('d M Y') }}</small></td>
                <td style="padding: 8px; text-align:right;"><strong>{{ number_format($transaksi->sum('nominal')) }}</strong></td>
                <td style="padding: 8px; text-align:right;">&copy; itp {{ date('Y') }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
