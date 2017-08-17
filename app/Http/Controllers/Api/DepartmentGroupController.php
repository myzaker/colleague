<?php

namespace App\Http\Controllers\Api;

use App\Department;
use App\Group;
use App\Http\Controllers\Controller;
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
        $this->validate($request, [
            'department_id' => 'required',
            'name'          => 'required',
        ]);

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
        $groups     = $department->groups;

        /** @var Group $group */
        $group = $department->groups()->findOrFail($groupId);
        $group = collect($group)->merge(['staff' => $group->staff]);

        return collect($department)->merge(compact('groups', 'group'));
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
        $this->validate($request, [
            'name' => 'required',
        ]);
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
