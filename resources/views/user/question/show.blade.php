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

  @if ($question->comment->count() > 0)
    <div class="comment-list">
      @foreach ($question->comment as $comment)
        <div class="comment-wrap">
          <div class="comment-title">
            <img src="{{ $comment->user->avatar }}" class="avatar-img">
            <p>{{ ($comment->user->name) }}</p>
            <p class="comment-date">{{ $comment->created_at }}</p>
          </div>
          <div class="comment-body">{{ $comment->comment }}</div>
        </div>
      @endforeach
    </div>
  @endif

  <div class="comment-box">
    {!! Form::open(['route' => 'question.commentStore']) !!}
      {!! Form::input('hidden', 'user_id', $question->user_id) !!}
      {!! Form::input('hidden', 'question_id', $question->id) !!}
      <div class="comment-title">
        <img src="{{ $question->user->avatar }}" class="avatar-img"><p>コメントを投稿する</p>
      </div>

      <div class="comment-body @if ($errors->has('comment')) has-error @endif">
        {!! Form::textarea('comment', null, ['class' => 'form-control', 'cols' => '50', 'rows' => '10', 'placeholder' => 'Add your comment...']) !!}
        @if ($errors->has('comment'))
          <span class="help-block" roler="alert">
            <strong>{{ $errors->first('comment') }}</strong>
          </span>
        @endif
      </div>

      <div class="comment-bottom">
        <button type="submit" class="btn btn-success">
          <i class="fa fa-pencil" aria-hidden="true"></i>
        </button>
      </div>
    {!! Form::close() !!}

  </div>
</div>
@endsection
