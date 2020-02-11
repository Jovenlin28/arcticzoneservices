<?php

namespace App\Http\Controllers\Admin\Maintenance;

use App\Models\RepairIssue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RepairIssueController extends Controller
{
    private $repairIssue;

    public function __construct(RepairIssue $repairIssue)
    {
        $this->repairIssue = $repairIssue;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repair_issues = RepairIssue::all();

        return view('admin.maintenance.repair-issues')->with('repair_issues', $repair_issues);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.maintenance.repair-issues');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:repair_issues,name,'
        ]);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
        } else {
            try {
                $repair = RepairIssue::create(['name' => $request['name']]);

                return [
                    'type' => 'success',
                    'title' => 'Success',
                    'message' => "Repair Issue information updated successfully",
                    'repair' => $repair
                ];
            } catch (\Exception $e) {
                return ['type' => 'error', 'title' => 'Error','message' => $e->getMessage()];
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->repairIssue->get_repair_issues($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repair_issues = RepairIssue::find($id);

        return view('admin.maintenance.repair-issues')->with('repair_issues', $repair_issues);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'issue_name' => 'required|string|unique:repair_issues,name,'.$id.',id'
        ]);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
        } else {
            try {
                RepairIssue::find($id)->update([
                    'name' => $request['issue_name']
                ]);

                return ['type' => 'success', 'title' => 'Success message','message' => "Repair Issue information updated successfully"];
            } catch (\Exception $e) {
                return ['type' => 'error', 'title' => 'Error message','message' => $e->getMessage()];
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RepairIssue::findOrFail($id)->delete();

        return response()->json(['message' => 'Deleted!']);
    }
}
