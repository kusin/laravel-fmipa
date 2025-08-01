<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

if (!function_exists('formatRupiah')) {
    function formatRupiah($angka)
    {
        return 'Rp. ' . number_format($angka, 0, ',', '.');
    }
}
