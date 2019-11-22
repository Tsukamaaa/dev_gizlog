@extends ('common.user')
@section ('content')

<h1 class="brand-header">質問詳細</h1>
<div class="main-wrap">
  <div class="panel panel-success">
    <div class="panel-heading">
      <img src="{{ $question->user->avatar }}" class="avatar-img">
      <p>{{ $question->user->name }}&nbsp;さんの質問&nbsp;&nbsp;(&nbsp;{{ $question->tag_category->name }}&nbsp;)</p>
      <p class="question-date">{{ $question->created_at }}</p>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <tbody>
          <tr>
            <th class="table-column">Title</th>
            <td class="td-text">{{ $question->title }}</td>
          </tr>
          <tr>
            <th class="table-column">Question</th>
            <td class='td-text'>{{ $question->content }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
    <div class="comment-list"> <!--コメント数で条件分岐　ないときは消す-->
        <div class="comment-wrap">
          <div class="comment-title">
            <img src="" class="avatar-img">
            <p></p>
            <p class="comment-date"></p>
          </div>
          <div class="comment-body"></div>
        </div>
    </div>
  <div class="comment-box">
    <form>
    {!! Form::open(['route' => 'question.store']) !!} <!--バリデーションエラーの表示処理もする-->
      <!-- <input name="user_id" type="hidden" value=""> -->
      {!! Form::input('hidden', 'user_id', $question->user_id) !!}
      <!-- <input name="question_id" type="hidden" value=""> -->
      {!! Form::input('hidden', 'question_id', $question->id) !!}
      <div class="comment-title">
        <img src="{{ $question->user->avatar }}" class="avatar-img"><p>コメントを投稿する</p>
      </div>
      <div class="comment-body">
        {!! Form::textarea('comment', null, ['class' => 'form-control', 'cols' => '50', 'rows' => '10', 'placeholder' => 'Add your comment...']) !!}
        <!-- <textarea class="form-control" placeholder="Add your comment..." name="comment" cols="50" rows="10"></textarea> -->
        <span class="help-block"></span>
      </div>
      <div class="comment-bottom">
        <button type="submit" class="btn btn-success">
          <i class="fa fa-pencil" aria-hidden="true"></i>
        </button>
      </div>
    {!! Form::close() !!}
    </form>
  </div>
</div>
@endsection