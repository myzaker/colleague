<?php

namespace App\Http\Controllers;

use App\Department;
use App\Group;
use Illuminate\Http\Request;

class DepartmentGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($department)
    {
        return Department::find($department)->groups;
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
     * @return Group|\Illuminate\Database\Eloquent\Model
     */
    public function store(Request $request)
    {
        $this->authorize('create-resource');

        return Group::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $departmentId
     * @param      $groupId
     * @return \Illuminate\Http\Response
     */
    public function show($departmentId, $groupId)
    {
        /** @var Department $department */
        $department = Department::findOrFail($departmentId);

        /** @var Group $group */
        $group = $department->groups()->findOrFail($groupId);
        $staff = $group->staff;

        return compact('department', 'group', 'staff');
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
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
