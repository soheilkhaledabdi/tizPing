<?php
const ONE_KB = 1024;
const ONE_MB = ONE_KB * 1024;
const ONE_GB = ONE_MB * 1024;
const ONE_TB = ONE_GB * 1024;
const ONE_PB = ONE_TB * 1024;

function sizeFormat($size) {
    if ($size < 0) {
        return "0 B";
    } else if ($size < ONE_KB) {
        return $size . " B";
    } else if ($size < ONE_MB) {
        return number_format($size / ONE_KB, 2) . " کیلوبایت";
    } else if ($size < ONE_GB) {
        return number_format($size / ONE_MB, 2) . " مگابایت";
    } else if ($size < ONE_TB) {
        return number_format($size / ONE_GB, 2) . " گیگابایت";
    } else if ($size < ONE_PB) {
        return number_format($size / ONE_TB, 2) . " ترابایت";
    } else {
        return number_format($size / ONE_PB, 2) . " پتابایت";
    }
}
