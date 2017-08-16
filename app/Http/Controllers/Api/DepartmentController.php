<?php

namespace App\Http\Controllers\Api;

use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Department[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Department::all()->map(function (Department $department) {
            $department['stat'] = $department->staff()->count();

            return $department;
        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return Department|\Illuminate\Database\Eloquent\Model
     */
    public function store(Request $request)
    {
        $this->authorize('create-resource');
        $this->validate($request, [
            'name' => 'required',
        ]);

        return Department::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return array
     */
    public function show($id)
    {
        $department = Department::find($id);
        $groups = $department->groups;
        $staff = $department->staff;

        return collect($department)->merge(compact('groups', 'staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return bool
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update-resource');

        Department::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
