<?php

namespace App\Http\Controllers;

use App\Models\Confession;
use Illuminate\Http\Request;
use App\Models\ConfessionCategory;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $total_categories = ConfessionCategory::whereStatus('Active')->count();
        $total_confessions = Confession::whereStatus('Active')->count();
        return view('admin/dashboard', compact('total_categories', 'total_confessions'));
    }
}
