<?php

if(! function_exists('prefixActive')){
	function prefixActive($prefixName)
	{ 
		return	request()->route()->getPrefix() == $prefixName ? 'active' : '';
	}
}

if(! function_exists('prefixBlock')){
	function prefixBlock($prefixName)
	{ 
		return	request()->route()->getPrefix() == $prefixName ? 'block' : 'none';
	}
}

if(! function_exists('routeActive')){
	function routeActive($routeName)
	{ 
		return	request()->route($routeName) ? 'active' : '';
	}
}

function getStatusInventory($status) {
	if ($status == 1) {
			return "<span class='badge badge-primary'>Ready to deploy</span>";
	} else if ($status == 2) {
		return "<span class='badge badge-warning text-dark'>Pending</span>";
	} else if ($status == 3) {
		return "<span class='badge badge-info'>Broken</span>";
	} else if ($status == 4) {
		return "<span class='badge badge-danger'>In Used</span>";
	} else {
		return "-";
	}
}

if ( ! function_exists('dateTextMySQL2ID'))
{
    function dateTextMySQL2ID($date){
        $th=substr($date,0,4);
        $bulan=substr($date,5,2);
        $tgl=substr($date,8,2);

        $tglDepan=substr($tgl,0,1);
        $tgldiambil=substr($tgl,1,1);

        if($tglDepan=="0"){
           $tglID=$tgldiambil;
        }else{
           $tglID=$tgl;
        }

        if($bulan=="01")
        {
         $dateID ="$tglID Januari $th";
         return $dateID;
        }
        elseif($bulan=="02")
        {
         $dateID ="$tglID Februari $th";
         return $dateID;
        }
        elseif($bulan=="03")
        {
         $dateID ="$tglID Maret $th";
         return $dateID;
        }
        elseif($bulan=="04")
        {
         $dateID ="$tglID April $th";
         return $dateID;
        }
        elseif($bulan=="05")
        {
         $dateID ="$tglID Mei $th";
         return $dateID;
        }
        elseif($bulan=="06")
        {
         $dateID ="$tglID Juni $th";
         return $dateID;
        }
        elseif($bulan=="07")
        {
         $dateID ="$tglID Juli $th";
         return $dateID;
        }
        elseif($bulan=="08")
        {
         $dateID ="$tglID Agustus $th";
         return $dateID;
        }
        if($bulan=="09")
        {
         $dateID ="$tglID September $th";
         return $dateID;
        }
        elseif($bulan=="10")
        {
         $dateID ="$tglID Oktober $th";
         return $dateID;
        }
        elseif($bulan=="11")
        {
         $dateID ="$tglID November $th";
         return $dateID;
        }
        elseif($bulan=="12")
        {
         $dateID ="$tglID Desember $th";
         return $dateID;
        }
    }
}//end function