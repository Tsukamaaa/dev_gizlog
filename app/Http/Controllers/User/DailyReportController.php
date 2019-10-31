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
     * 日報機能画面の表示処理
     * if文と::queryを用いて日付検索の処理
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = DailyReport::query()->where('user_id', Auth::id());
        if (!empty($request->get('search-month'))) {
            $query->where('reporting_time', 'LIKE', $request->get('search-month').'%');
        }

        $dailyReports = $query->get();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);

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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->rules);

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
