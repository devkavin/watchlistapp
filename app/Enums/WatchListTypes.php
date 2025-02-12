<?php

namespace App\Enums;

enum WatchListTypes: string
{
    case Movie = 'Movie';
    case Tv_series = 'Tv_Series';
    case Other = 'Other';
}
