@extends ('common.user')
@section ('content')

<h1 class="brand-header">質問編集</h1>

<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => ['question.update.confirm', $question->id], 'method' => 'POST']) !!}
      <div class="form-group @if ($errors->has('tag_category_id')) has-error @endif">
      {!! Form::select('tag_category_id', ['' => 'Select category', 1 => 'front', 2 => 'back', 3 => 'infra', 4 => 'others'], $question->tag_category_id, ['class' => 'form-control selectpicker form-size-small', 'id' => 'pref_id']) !!}
        @if ($errors->has('tag_category_id'))
          <span class="help-block" role="alert">
            <strong>{{ $errors->first('tag_category_id') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group @if ($errors->has('title')) has-error @endif">
        {!! Form::text('title', $question->title, ['class' => 'form-control']) !!}
        @if ($errors->has('title'))
          <span class="help-block" role="alert">
            <strong>{{ $errors->first('title')}}</strong>
          </span>
        @endif
      </div>

      <div class="form-group @if ($errors->has('content')) has-error @endif">
        {!! Form::textarea('content', $question->content, ['class' => 'form-control', 'cols' => '50', 'rows' => '10']) !!}
        @if ($errors->has('content'))
          <span class="help-block" role="alert">
            <strong>{{$errors->first('content')}}</strong>
          </span>
        @endif
      </div>

      {!! Form::input('hidden', 'id', $question->id) !!}
      {!! Form::submit('UPDATE', ['class' => 'btn btn-succes pull-right']) !!}
    {!! Form::close() !!}
  </div>
</div>

@endsection
