<?php

// Fungsi untuk menampilkan tanggal dalam format tertentu
if (!function_exists('format_date')) {
    function format_date($date)
    {
        return date('d-m-Y', strtotime($date)); // Format tanggal menjadi dd-mm-yyyy
    }
}

// Fungsi untuk membuat slug dari string
if (!function_exists('create_slug')) {
    function create_slug($string)
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    }
}
