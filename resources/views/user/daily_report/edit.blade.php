@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => ['daily_report.update', $daily_report->id], 'method' => 'PUT']) !!}

      @if ($errors->has('reporting_time'))
        <div class="form-group form-size-small has-error">
      @else
        <div class="form-group form-size-small">
      @endif

          {!! Form::input('date', 'reporting_time', date('Y-m-j'), ['class' => "form-control {{ $errors->has('reporting_time') ? ' is-invalid' : '' }}" ]) !!}
        
          @if ($errors->has('reporting_time'))
            <span class="help-block" role="alert">
              <strong>{{ $errors->first('reporting_time') }}</strong>
            </span>
          @endif
        </div>

      @if ($errors->has('title'))
        <div class="form-group has-error">
      @else
        <div class="form-group">
      @endif

          {!! Form::input('text', 'title', $daily_report->title, ['class' => "form-control {{ $errors->has('title') ? 'in-valid' : '' }}", 'placeholder' =>'Title']) !!}

          @if ($errors->has('title'))
            <span class="help-block" role="alert">
              <strong>{{ $errors->first('title') }}</strong>
            </span>
          @endif
        </div>

      @if ($errors->has('content'))
        <div class="form-group has-error">
      @else
        <div class="form-group">
      @endif

          {!! Form::textarea('content', $daily_report->content, ['class' => "form-control {{ $errors->has('content') ? 'in-valid' : '' }}", 'placeholder' => 'Content']) !!}
        
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

