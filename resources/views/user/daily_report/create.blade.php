@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報作成</h2>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => 'daily_report.store']) !!}
      <div class="form-group form-size-small  @if ($errors->has('reporting_time')) {{ 'has-error' }} @endif ">
        {!! Form::input('date','reporting_time', date('Y-m-d'), ['class' => "form-control {{ $errors->has('reporting_time') ? ' is-invalid' : '' }}" ]) !!}
        @if ($errors->has('reporting_time'))
          <span class="help-block" role="alert">
            <strong>{{ $errors->first('reporting_time') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group @if ($errors->has('title')) {{ 'has-error' }} @endif">
        {!! Form::text('title', null, ['class' => "form-control {{ $errors->has('title') ? 'in-valid' : '' }}", 'placeholder' =>'Title']) !!}
        @if ($errors->has('title'))
          <span class="help-block" role="alert">
            <strong>{{ $errors->first('title') }}</strong>
          </span>
        @endif
      </div>

      <div class="form-group @if ($errors->has('content')) {{ 'has-error' }} @endif">
        {!! Form::textarea('content', null, ['class' => "form-control {{ $errors->has('content') ? 'in-valid' : '' }}", 'placeholder' => 'Content']) !!}
        @if ($errors->has('content'))
          <span class="help-block" role="alert">
            <strong>{{ $errors->first('content') }}</strong>
          </span>
        @endif
      </div>

      {!! Form::submit('Add', ['class' => 'btn btn-success pull-right']) !!}
    {!! Form::close() !!}
  </div>
</div>

@endsection

