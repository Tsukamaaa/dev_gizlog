@extends ('common.user')
@section ('content')

<h2 class="brand-header">質問投稿</h2>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => 'question.confirm']) !!}
      <div class="form-group @if ($errors->has('tag_category_id')) has-error @endif">
        {!! Form::select('tag_category_id', ['' => 'Select category', 1 => 'front', 2 =>'back', 3 => 'infra', 4 => 'others'], 'Select category', ['class' => 'form-control selectpicker form-size-small', 'id' => 'pref_id']) !!}
        @if ($errors->has('tag_category_id'))
          <span class="help-block" role="alert">
            <strong>{{ $errors->first('tag_category_id') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group @if ($errors->has('title')) has-error @endif">
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'title']) !!}
        @if ($errors->has('title'))
          <span class="help-block" role="alert">
            <strong>{{ $errors->first('title') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group @if ($errors->has('content')) has-error @endif">
        {!! Form::textarea('content', null, ['class' => 'form-control', 'cols' => '50', 'rows' => '10', 'placeholder' => 'Please write down your question here...']) !!}
        @if ($errors->has('content'))
          <span class="help-block" role="alert">
            <strong>{{ $errors->first('content') }}</strong>
          </span>
        @endif
      </div>

      {!! Form::submit('CREATE', ['class' => 'btn btn-success pull-right']) !!}
    {!! Form::close() !!}
  </div>
</div>

@endsection

