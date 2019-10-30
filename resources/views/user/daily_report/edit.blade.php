@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => ['daily_report.update', $dailyReport->id], 'method' => 'PUT']) !!}
      <div class="form-group form-size-small {{ $errors->has('reporting_time') ? 'has-error' : '' }}">
        {!! Form::input('date', 'reporting_time', $dailyReport->reporting_time->format('Y-m-d'), ['class' => "form-control {{ $errors->has('reporting_time') ? ' is-invalid' : '' }}" ]) !!}
        @if ($errors->has('reporting_time'))
          <span class="help-block" role="alert">
            <strong>{{ $errors->first('reporting_time') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        {!! Form::text('title', $dailyReport->title, ['class' => "form-control {{ $errors->has('title') ? 'in-valid' : '' }}", 'placeholder' =>'Title']) !!}
        @if ($errors->has('title'))
          <span class="help-block" role="alert">
            <strong>{{ $errors->first('title') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
        {!! Form::textarea('content', $dailyReport->content, ['class' => "form-control {{ $errors->has('content') ? 'in-valid' : '' }}", 'placeholder' => 'Content']) !!}
        @if ($errors->has('content'))
          <span class="help-block" role="alert">
            <strong>{{ $errors->first('content') }}</strong>
          </span>
        @endif
      </div>

      {!! Form::submit('Update', ['class' => 'btn btn-success pull-right']) !!}
    {!! Form::close() !!}
  </div>
</div>

@endsection

