<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('indo_currency')) {
    function indo_currency($amount)
    {
        // Definisikan logika konversi mata uang Indonesia di sini
        // Misalnya, menggunakan number_format() dengan format mata uang Rupiah
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }
}
