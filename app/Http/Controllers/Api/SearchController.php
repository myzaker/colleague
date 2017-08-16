<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Staff;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        return [
            'staff' => Staff
                ::where('name', 'like', "%{$query}%")
                ->orderBy(\DB::raw("REPLACE(name,'{$query}','')"))
                ->get(),
        ];
    }
}
