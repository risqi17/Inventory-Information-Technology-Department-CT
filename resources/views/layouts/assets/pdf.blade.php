

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<style type="text/css">
			@page { margin:20px 20px 0px 20px; }
			body{
				font-size: 9pt;
			}

			table.table-bordered {
				font-size: 9pt;
				border-left: 0.01em solid #333;
				border-right: 0;
				border-top: 0.01em solid #333;
				border-bottom: 0;
				border-collapse: collapse;
			}
			table.table-bordered td,
			table.table-bordered th {
				border-left: 0;
				border-right: 0.01em solid #333;
				border-top: 0;
				border-bottom: 0.01em solid #333;
				padding:5px 8px;
			}

			.table-bordered thead th,
			.table-bordered thead td {
				border-bottom-width: 1px;
				padding:5px;
			}
			.text-center{
				text-align:center;
			}
			.text-uppercase{
				text-transform:uppercase;
			}
          
		.print_label {
			width: 70mm; /* should be 31.0 */
			height: 40mm;
			position: absolute;
			left: 0px;
			padding-top: 15px;
			padding-left: 15px;
		}
		.desc {
		    font-size: 12px !important;
		}
		.rotate-90 {
            -moz-transform: translateX(-50%) translateY(-50%) rotate(-90deg);
            -webkit-transform: translateX(-50%) translateY(-50%) rotate(-90deg);
            transform:  translateX(-50%) translateY(-50%) rotate(-90deg);
        }
        .rotate-0 {
            -moz-transform: translateX(0%) translateY(0%) rotate(0deg);
            -webkit-transform: translateX(0%) translateY(0%) rotate(0deg);
            transform:  translateX(0%) translateY(0%) rotate(0deg);
        }
		</style>

	</head>
	<body>
        <div class="print_label change-page rotate-0" style="top: 0mm !important;">
			<div style="float:left;margin-right:10px">
                {!! QrCode::size(150)->generate($asset->uuid); !!}
				
			</div>
			<div>
                <img src="{{ asset('assets/images/logo/logo.png') }}" width="30%" alt="">
				<h6>{{ $asset->asset_number }}</h6>
				<span class="desc">{{ $asset->product_name }}</span>
			</div>
		</div>
	</body>

</html>
