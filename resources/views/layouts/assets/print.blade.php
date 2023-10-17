


<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
	<style>
		.table td{
			padding: .5rem !important;
		}
		body {font-size: 16px !important;}
       
	</style>

<style type="text/css">
    .tg  {border-collapse:collapse;border-spacing:0;}
    .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
      overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
      font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg .tg-baqh{text-align:center;vertical-align:top}
    .tg .tg-0lax{text-align:center;vertical-align:top}
    </style>

</head>

<div class="mB-40">
	<div class="p-30">
		<table class="table border-0">
			<tr>
				<td class="border-0 p-0" style="width:80px" >
					<img src="{{ asset('assets/images/cmi.jpg') }}" alt="Logo"  style="width:70px" >
				</td>
				<td class="border-1" style="text-align: center; border: 1px; width: 600px">
					<strong style="font-size: 25px">PT CITA MINERAL INVESTINDO Tbk</strong><br>
					Panin Bank Building Lantai 2, Jl. Jend Sudirman - Senayan Jakarta Pusat 10270<br>
					Telp. (021) - 7251344 Fax (021) - 72789885<br>
				</td>
			</tr>
        </table>

       <h3 style="text-align: center; text-decoration:underline;">FORM PERJANJIAN PEMINJAMAN</h3>

       Saya yang bertanda tangan dibawah ini, selanjutnya disebut sebagai peminjam :
       <table class="table table-bordered mt-2">
        <tr>
            <td>Nama <br> Nomor Handphone <br> Department <br> Email <br> Kerpeluan <br> Pemakaian dari</td>
            <td>: <br> : <br> : <br> : <br> : <br> :</td>
            <td style="width: 350px">{{ $transaction->user }} <br> {{ $transaction->phone }} <br> {{ $transaction->department }} <br> {{ $transaction->email }} <br> {{ $transaction->needed }} <br> {{ $transaction->tanggal }} &nbsp;&nbsp;&nbsp;Sampai tanggal &nbsp;&nbsp;&nbsp; {{ $transaction->tanggal_kembali }}</td>
            <td>{!! QrCode::size(120)->generate($transaction->uuid); !!}</td>
        </tr>
       
       </table>
       
       Dengan ini menyatakan akan :
       <table class="table table-bordered mt-2">
        <tr style="border-spacing: 0em">
            <td></td>
            <td style="text-align: left; vertical-align: top;">1. </td>
            <td>
                Menjaga dan merawat laptop/desktop/barang yang dipinjam dan mengembalikan pada waktunya 
                (Tidak Menginstall software apapun tanpa otorisasi dari IT Department).
            </td>
        </tr>
        <tr style="border-spacing: 0em">
            <td></td>
            <td style="text-align: left; vertical-align: top;">2. </td>
            <td>
                Menjaga kerahasiaan data-data perusahaan.
            </td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: left; vertical-align: top;">3. </td>
            <td>
                Apabila terjadi kerusakan, kehilangan pada saat waktu peminjaman akan bersedia untuk memperbaiki/mengganti 
                laptop/desktop/barang tersebut.
            </td>
        </tr>
       </table>
       <br>
       Check List Peminjaman :
       <table class="table table-bordered mt-2">
        <tr>
            <td>Barang</td>
            <td style="text-align: left; vertical-align: top;">: </td>
            <td>[ {{ $transaction->product_name }} - {{ $transaction->asset_number }} ] {{ $transaction->specification }}</td>
        </tr>
        <tr>
            <td>Service Tag/SN</td>
            <td style="text-align: left; vertical-align: top;">: </td>
            <td>{{ $transaction->service_tag }}</td>
        </tr>
       </table>

       <table class="tg" style="margin-left: 50px; width: 600px">
        <thead>
          <tr>
            <th class="tg-0lax">Kondisi</th>
            <th class="tg-baqh">Sebelum Pemakaian</th>
            <th class="tg-0lax">Setelah Pemakaian</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($oldCondition as $item)
            <tr>
                <td class="tg-0lax">{{ $item }}</td>
                <td class="tg-0lax"></td>
                <td class="tg-0lax"></td>
              </tr>
            @endforeach
        </tbody>
        </table>
        <table class="table border-0 mt-5">
            <tr>
                <td> *Ketika Barang serahkan </td>
            </tr>
			<tr>
				<td class="border-0" style="width:50%;padding-top:-5px !important;">
					Jakarta,  {{ $transaction->tanggal }}<br>
					<strong>Yang Menyerahkan, </strong><br><br><br><br>
                    ( {{ $transaction->employee }} )
				</td>
                <td style="width: 1000px">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                
				<td class="border-0" style="width:50%; padding: left 1000px;">
					<br><strong>Yang Menerima,</strong><br><br><br><br>
					( {{ $transaction->user }} )<br>
				</td>
			</tr>
            <tr>
                <td> *Ketika Barang dikembalikan </td>
            </tr>
            <tr>
				<td class="border-0" style="width:50%">
					Jakarta,<br>
					<strong>Yang Mengembalikan, </strong><br><br><br><br>
                    ( {{ $transaction->user }} )
				</td>
                <td style="width: 1000px">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                
				<td class="border-0" style="width:50%; padding: left 1000px;">
					<br><strong>Yang Menerima,</strong><br><br><br><br>
					( {{ $transaction->employee }} )<br>
				</td>
			</tr>
        </table>

	</div>
</div>

</body>

</html>
