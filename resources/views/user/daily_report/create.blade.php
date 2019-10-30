@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報作成</h2>
<div class="main-wrap">
  <div class="container">
    {!! Form::open(['route' => 'daily_report.store']) !!}

      @if ($errors->has('reporting_time'))
        <div class="form-group form-size-small has-error">
      @else
        <div class="form-group form-size-small">
      @endif

          {!! Form::input('date','reporting_time', date('Y-m-d'), ['class' => "form-control {{ $errors->has('reporting_time') ? ' is-invalid' : '' }}" ]) !!}

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

          {!! Form::input('text', 'title', null, ['class' => "form-control {{ $errors->has('title') ? 'in-valid' : '' }}", 'placeholder' =>'Title']) !!}

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

