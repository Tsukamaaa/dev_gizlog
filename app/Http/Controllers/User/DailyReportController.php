<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DailyReport;
use Auth;
use App\Http\Requests\DailyReportRequest;
use App\Http\Requests\SearchDailyReportRequest;

class DailyReportController extends Controller
{
    private $dailyReport;
    
    public function __construct(DailyReport $dailyReport)
    {
        $this->dailyReport = $dailyReport;
    }
    
    /**
     * 日報機能画面の表示処理
     * 
     * @param  App\Http\Requests\SearchDailyReportRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(SearchDailyReportRequest $request)
    {
        $request->flashOnly('search-month');
        $query = DailyReport::getDailyReport();
        if (!empty($request->get('search-month'))) {
            $query = DailyReport::SearchDailyReportDailyReport($request);
        }

        $dailyReports = $query->latest()->get();
        return view('user.daily_report.index', compact('dailyReports'));
    }

    /**
     * 日報作成画面の表示処理
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.daily_report.create');
    }

    /**
     * 日報作成画面から新規作成を行った時の処理
     * 
     * @param  App\Http\Requests\DailyReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DailyReportRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $this->dailyReport->fill($input)->save();
        return redirect()->route('daily_report.index');
    }

    /**
     * 日報詳細画面の表示処理
     * 選択したものの詳細が表示される
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
     * 日報詳細から日報編集画面への表示処理
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
     * 編集画面からvalidationした後に日報の更新処理
     * validationが発火したら編集画面にリダイレクト
     *
     * @param  App\Http\Requests\DailyReportRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DailyReportRequest $request, $id)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $this->dailyReport->find($id)->fill($input)->save();
        return redirect()->route('daily_report.index');
    }

    /**
     * ソフトデリートの実装
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
