<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DailyReport;
use Auth;
use Illuminate\Support\Facades\Validator;

class DailyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $daily_report;

    public function __construct(DailyReport $instanceClass)
    {
        $this->daily_report = $instanceClass;
    }

    public function index(Request $request)
    {
        //
        if (!empty($request['search-month'])) {
           $daily_reports = $this->daily_report->getByYearAndMonth($request['search-month']);
        } else {
            $daily_reports = $this->daily_report->getByUserId(Auth::id());
        }
        return view('user.daily_report.index', compact('daily_reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.daily_report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $this->daily_report->fill($input)->save();
        return redirect()->route('daily_report.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $daily_report = $this->daily_report->find($id);
        return view('user.daily_report.show', compact('daily_report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $daily_report = $this->daily_report->find($id);
        return view('user.daily_report.edit', compact('daily_report'));
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
        //
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $this->daily_report->find($id)->fill($input)->save();
        return redirect()->route('daily_report.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->daily_report->find($id)->delete();
        return redirect()->route('daily_report.index');
    }

    // public function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'reporting_time' => 'required',
    //         'title'          => 'required'|'max:30',
    //         'content'        => 'required'|'max:1000'
    //     ]);
    // }

}
