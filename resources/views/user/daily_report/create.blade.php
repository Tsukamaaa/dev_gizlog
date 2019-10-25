@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報作成</h2>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => 'daily_report.store']) !!}
      <div class="form-group form-size-small">
        {!! Form::input('date', 'reporting_time', date('Y-m-j'), ['required', 'class' => 'form-control']) !!}
        <span class="help-block"></span>
      </div>
      <div class="form-group">
        {!! Form::input('text', 'title', null, ['required', 'class' => 'form-control', 'placeholder' =>'Title']) !!}
        <span class="help-block"></span>
      </div>
      <div class="form-group">
        {!! Form::textarea('content', null, ['required', 'class' => 'form-control', 'placeholder' => 'Content']) !!}
        <span class="help-block"></span>
      </div>
      {!! Form::submit('Add', ['class' => 'btn btn-success pull-right']) !!}
    {!! Form::close() !!}
  </div>
</div>

@endsection

