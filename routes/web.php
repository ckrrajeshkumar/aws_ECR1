<?php

use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view('intro');
});

Route::get("/get-payment-token", function () {
    return view('payment-form');
});
