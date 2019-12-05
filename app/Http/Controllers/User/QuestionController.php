<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\User\QuestionsRequest;
use App\Http\Requests\User\CommentRequest;


class QuestionController extends Controller
{
    private $question;
    private $comment;

    public function __construct(Question $question, Comment $comment)
    {
        $this->question = $question;
        $this->comment = $comment;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with(['user', 'tag_category', 'comment'])
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('user.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.question.create');
    }

    /**
     *  投稿する内容の確認
     */

    public function confirm(QuestionsRequest $request)
    {
        $question = new Question($request->all());
        $question['user_id'] = Auth::id();
        return view('user.question.confirm', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function questionStore(Request $request)
    {
        $input = $request->all();
        $this->question->fill($input)->save();

        return redirect()->route('question.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function commentStore(CommentRequest $request)
    {
        $input = $request->all();
        $this->comment->fill($input)->save();

        return redirect()->route('question.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::with(['comment', 'comment.user'])
        ->find($id);

        return view('user.question.show', compact('question'));
    }

    public function mypage($user_id)
    {
        $questions = Question::with(['user', 'tag_category', 'comment'])
        ->where('user_id', $user_id)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('user.question.mypage', compact('questions'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
