

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<style type="text/css">
			@page { margin:20px 20px 0px 20px; }
			body{
				font-size: 9pt;
			}
			table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
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
		<table>
			<tr height="40px">
				<td width="80px">
					<div style="margin-left:10px">
						{!! QrCode::size(60)->generate($asset->uuid); !!}
					</div>
					
				</td>
				<td width="150px" style="text-align: left; vertical-align:top;">
					<p style="margin-top:10px; margin-left: 10px">{{ $asset->product_name }} <br>
					{{ $asset->asset_number }} <br><br>
					<img src="{{ asset('assets/images/logo/logo.png') }}" alt="" srcset="" width="50%">
					</p>

				</td>
			</tr>
		</table>
        
	</body>

</html>
