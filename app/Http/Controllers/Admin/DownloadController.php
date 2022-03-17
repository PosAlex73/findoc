<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function download($path, $file)
    {
        return Storage::download($path . '/' . $file);
    }
}
