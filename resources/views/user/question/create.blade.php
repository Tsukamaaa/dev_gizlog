@extends ('common.user')
@section ('content')

<h2 class="brand-header">質問投稿</h2>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => 'question.store']) !!}
      <div class="form-group">
        {!! Form::select('tag_category_id', ['Select category', 'front', 'back', 'infra', 'others'], 'Select category', ['class' => 'form-control selectpicker form-size-small', 'id' => 'pref_id']) !!}
        <!-- <select name='tag_category_id' class = "form-control selectpicker form-size-small" id="pref_id">
          <option value="">Select category</option>
            <option value= "1">front</option>
            <option value= "2">back</option>
            <option value= "3">infra</option>
            <option value= "4">others</option>
        </select> -->
        <span class="help-block"></span>  <!--ここはバリデーションエラー-->
      </div>

      <div class="form-group">
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'title']) !!}
        <!-- <input class="form-control" placeholder="title" name="title" type="text"> -->
        <span class="help-block"></span>  <!--ここはバリデーションエラー-->
      </div>

      <div class="form-group">
        {!! Form::textarea('content', null, ['class' => 'form-control', 'cols' => '50', 'rows' => '10', 'placeholder' => 'Please write down your question here...']) !!}
        <!-- <textarea class="form-control" placeholder="Please write down your question here..." name="content" cols="50" rows="10"></textarea> -->
        <span class="help-block"></span>  <!--ここはバリデーションエラー-->
      </div>
      {!! Form::submit('CREATE', ['class' => 'btn btn-success pull-right']) !!}
      <!-- <input name="confirm" class="btn btn-success pull-right" type="submit" value="create"> -->
    {!! Form::close() !!}
  </div>
</div>

@endsection

