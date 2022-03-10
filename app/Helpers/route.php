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
			return "<span class='badge badge-primary'>Masuk</span>";
	} else if ($status == 2) {
		return "<span class='badge badge-warning text-dark'>Keluar</span>";
	} else if ($status == 3) {
		return "<span class='badge badge-info'>Dikembalikan</span>";
	} else if ($status == 4) {
		return "<span class='badge badge-danger'>Dihapus</span>";
	} else {
		return "-";
	}
}