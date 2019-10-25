@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => ['daily_report.update', $daily_report->id], 'method' => 'PUT']) !!}
    <!-- <form> -->
      <!-- <input class="form-control" name="user_id" type="hidden" value="{{ Auth::id() }}"> -->
      <div class="form-group form-size-small">
        {!! Form::input('date', 'reporting_time', date('Y-m-j'), ['required', 'class' => 'form-control']) !!}
        <!-- <input class="form-control" name="reporting_time" type="date"> -->
      <span class="help-block"></span>
      </div>
      <div class="form-group">
        {!! Form::input('text', 'title', $daily_report->title, ['required',  'class' => 'form-control'] )!!}
        <!-- <input class="form-control" placeholder="Title" name="title" type="text"> -->
      <span class="help-block"></span>
      </div>
      <div class="form-group">
        {!! Form::textarea('content', $daily_report->content, ['required', 'class' => 'form-control']) !!}
        <!-- <textarea class="form-control" placeholder="本文" name="contents" cols="50" rows="10">本文</textarea> -->
      <span class="help-block"></span>
      </div>
      {!! Form::submit('Update', ['class' => 'btn btn-success pull-right']) !!}
      <!-- <button type="submit" class="btn btn-success pull-right">Update</button> -->
    <!-- </form> -->
    {!! Form::close() !!}
  </div>
</div>

@endsection

