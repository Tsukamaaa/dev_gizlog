<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DailyReport;
use Auth;
use Validator;

class DailyReportController extends Controller
{
    private $dailyReport;
    private $rules = [
        'reporting_time' => 'required|date',
        'title'          => 'required|string|max:30',
        'content'        => 'required|string|max:1000'
    ];
    
    public function __construct(DailyReport $dailyReport)
    {
        $this->dailyReport = $dailyReport;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $getRequest = $request->all(); 

        if (!empty($getRequest['search-month'])) {
            $dailyReports = $this->dailyReport->getByYearAndMonth($getRequest['search-month']);
        } else {
            $dailyReports = $this->dailyReport->getByUserId(Auth::id());
        }
        return view('user.daily_report.index', compact('dailyReports'));

        $dailyReports = $this->dailyReport->getByUserId(Auth::id());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $rules = $this->rules;
        $request->validate($rules);

        $input = $request->all();
        $input['user_id'] = Auth::id();
        $this->dailyReport->fill($input)->save();
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
        $dailyReport = $this->dailyReport->find($id);
        return view('user.daily_report.show', compact('dailyReport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dailyReport = $this->dailyReport->find($id);
        return view('user.daily_report.edit', compact('dailyReport'));
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
        $rules = $this->rules;
        $request->validate($rules);

        $input = $request->all();
        $input['user_id'] = Auth::id();
        $this->dailyReport->find($id)->fill($input)->save();
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
        $this->dailyReport->find($id)->delete();
        return redirect()->route('daily_report.index');
    }
}
