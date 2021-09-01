<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $tabungan->invoice }}</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 30px;
        }
        .invoice h3 {
            margin-left: 25px;
            text-align: center;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
            padding: 0 15px;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
		.isi{
			padding: 8px;
		}
        .gray{
            background: #f1f1f1;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <h3>Pondok Pesantren {{ pondok('nama') ?? env('APP_NAME') }}</h3>
                <p>{{ pondok('alamat') ?? 'Alamat Pesantren' }}</p>
            </td>
            <td align="right" style="width: 40%;">
                <h2>{{ $tabungan->santri->nama }}</h2>
                <p>{{ $tabungan->santri->code }}</p>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="invoice">
    <p align="center">INVOICE / KWITANSI No. {{ $tabungan->invoice }}</p>
    <table width="100%" >
        <tbody>
            <tr>
                <td class="isi" align="left">Status</td>
                <td class="isi" align="left">
                    @if($tabungan->toko_id == null)
                    {{ strtoupper(($tabungan->status == 1 ) ? 'Setor Tunai' : 'Tarik Tunai') }}
                    @else
                    PEMBELIAN / LAYANAN JASA KE {{ $tabungan->toko->nama }}
                    @endif
                </td>
            </tr>
			<tr>
				<td class="isi gray" align="left">Deskripsi</td>
				<td class="isi gray" align="left">{{ ucwords($tabungan->desc) }}</td>
			</tr>
			<tr>
				<td class="isi" align="left">Nominal</td>
				<td class="isi" align="left">Rp. {{ number_format($tabungan->nominal) }}</td>
			</tr>
			<tr>
				<td class="isi gray" align="left">Tanggal</td>
				<td class="isi gray" align="left">{{ $tabungan->created_at }}</td>
			<tr>
				<td class="isi" align="left">Sisa Saldo</td>
				<td class="isi" align="left">Rp. <strong>{{ number_format($plus - $minus) }}</strong></td>
			</tr>
        </tbody>
    </table>
	<table width="100%">
        <tr>
            <td align="right" style="width: 40%;">
				<p>Admin</p>
                <br>
                <p>{{ strtoupper(auth()->user()->name) }}</p>
            </td>
        </tr>
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                {{ _SLOGAN }}
            </td>
        </tr>
    </table>
</div>
</body>
</html>