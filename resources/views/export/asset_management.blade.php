<table width="100%" style="border:1px solid #000">
    <thead>
        <tr>
            <th width="5" style="font-weight:bold">NO</th>
            <th width="25" style="font-weight:bold">NAMA BARANG</th>
            <th width="25" style="font-weight:bold">NOMOR ASET</th>
            <th width="25" style="font-weight:bold">SERVICE TAG</th>
            <th width="25" style="font-weight:bold">QUANTITY</th>
            <th width="25" style="font-weight:bold">SPESIFIKASI</th>
            <th width="15" style="font-weight:bold">KATEGORI</th>
            <th width="40" style="font-weight:bold">TANGGAL ORDER</th>
            <th width="15" style="font-weight:bold">GARANSI</th>
            <th width="15" style="font-weight:bold">STATUS</th>
            <th width="15" style="font-weight:bold">DIBUAT</th>
            <th width="25" style="font-weight:bold">CREATED AT</th>
        </tr>
    </thead>
    <tbody>
    @php 
        $no = 1;
        // dd($assets);
    @endphp

    @foreach($assets as $item)
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->asset_number }}</td>
                <td>{{ $item->service_tag }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->specification }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->purchase_date }}</td>
                <td>{{ $item->warranty }} Bulan</td>
                <td>
                    @if ($item->status == 1)
                        Ready to deploy
                    @elseif($item->status == 2)
                        Pending
                    @elseif($item->status == 3)
                        Broken
                    @elseif($item->status == 4)
                        In Used
                    @else
                        -
                    @endif
                </td>
                <td>{{ $item->employee }}</td>
                <td>{{ $item->created_at }}</td>
            </tr>
            @php
                $no++;
            @endphp
    @endforeach
    </tbody>
</table>

