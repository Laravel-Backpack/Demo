<?php

namespace App\Models;

use Backpack\MenuCRUD\app\Models\MenuItem as OriginalMenuItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuItem extends OriginalMenuItem
{
    use HasFactory;
    use \App\Models\Traits\LogsActivity;

    public static $pageLink = 'page_link';
    public static $externalLink = 'external_link';
    public static $internalLink = 'internal_link';
}
