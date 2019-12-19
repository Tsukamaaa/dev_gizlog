<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Comment;
use App\Models\TagCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\User\QuestionsRequest;
use App\Http\Requests\User\CommentRequest;

class QuestionController extends Controller
{
    private $question;
    private $comment;
    private $tag_category;

    public function __construct(Question $question, Comment $comment, TagCategory $tag_category)
    {
        $this->question = $question;
        $this->comment = $comment;
        $this->tag_category = $tag_category;
    }

    /**
     * 質問一覧表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $questions = $this->question
                    ->with(['user', 'tag_category', 'comment'])
                    ->getTagCategory($request)
                    ->searchWord($request)
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);

        $tag_categories = $this->tag_category
                        ->with('question')
                        ->get();

        $request['tag_category_id'] = (int)$request->input('tag_category_id');
        $request->flashOnly('tag_category_id', 'search_word');

        return view('user.question.index', compact('questions', 'tag_categories', 'request'));
    }

    /**
     * 新規作成画面表示
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.question.create');
    }

    /**
     *  投稿する内容の確認
     * @param  \Illuminate\Http\QuestionsReques  $request
     * @return \Illuminate\Http\Response
     */
    public function confirm(QuestionsRequest $request)
    {
        $question = new Question($request->all());
        $question['user_id'] = Auth::id();

        return view('user.question.confirm', compact('question'));
    }

    /**
     * 質問の投稿
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
     * コメントの投稿
     *
     * @param  \Illuminate\Http\CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function commentStore(CommentRequest $request)
    {
        $input = $request->all();
        $this->comment->fill($input)->save();

        return redirect()->route('question.index');
    }

    /**
     * 質問詳細表示
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

    /**
     * Mypageの表示
     *
     * @param  int $user_id
     * @return \Illuminate\Http\Response
     */
    public function showMypage($user_id)
    {
        $questions = Question::with(['user', 'tag_category', 'comment'])
                    ->where('user_id', $user_id)
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('user.question.mypage', compact('questions'));
    }
    /**
     * 質問更新画面の表示
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = $this->question->find($id);
        return view('user.question.edit', compact('question'));
    }

    /**
     * 質問の更新
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->all();
        $id = $input['id'];
        $this->question->find($id)->fill($input)->save();

        return redirect()->route('question.index');
    }

    /**
     * 質問とコメントのsoftDelete
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->question->find($id)->delete();
        $this->comment->where('question_id', $id)->delete();
        return redirect()->route('question.index');
    }
}
