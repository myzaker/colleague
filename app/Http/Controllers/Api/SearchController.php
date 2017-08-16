<?php

namespace App\Http\Controllers\Api;

use App\Group;
use App\Http\Controllers\Controller;
use App\Staff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        return collect([
            'group' => [Group::class, 'name'],
            'staff' => [Staff::class, 'name'],
        ])->map(function ($source) use ($query) {
            return $this->unionSearch(new $source[0], $source[1], $query);
        });
    }

    protected function unionSearch(Model $model, $field, $query)
    {
        return $model
            ->where($field, 'like', "%{$query}%")
            ->orderBy(\DB::raw("REPLACE({$field},'{$query}','')"))
            ->limit(10)
            ->get();
    }
}
