<?php

if (! function_exists('format_date_fr')) {
    function format_date_fr($date)
    {
        return \Carbon\Carbon::parse($date)->locale('fr')->isoFormat('LL');
    }
}
