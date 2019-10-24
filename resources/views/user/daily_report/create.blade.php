@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報作成</h2>
<div class="main-wrap">
{!! Form::open(['route' => 'daily_report.store']) !!}
  <div class="container">
      <!-- {!! Form::input('hidden', 'user_id', 2, ['class' => 'form-control']) !!} Auth実装時にAuth::idをぶっこむ-->
      <!-- <input class="form-control" name="user_id" type="hidden"> -->
      <div class="form-group form-size-small">
    {!! Form::input('date', 'reporting_time', date('Y-m-j'), ['required', 'class' => 'form-control']) !!}
    <!-- <input class="form-control" name="reporting_time" type="date" value="{{ date('Y-m-j') }}"> -->
    <span class="help-block"></span>
    </div>
    <div class="form-group">
      {!! Form::input('text', 'title', null, ['required', 'class' => 'form-control', 'placeholder' =>'Title']) !!}
      <!-- <input class="form-control" placeholder="Title" name="title" type="text"> -->
      <span class="help-block"></span>
    </div>
    <div class="form-group">
      {!! Form::textarea('content', null, ['required', 'class' => 'form-control', 'placeholder' => 'Content']) !!}
      <!-- <textarea class="form-control" placeholder="Content" name="contents" cols="50" rows="10"></textarea> -->
      <span class="help-block"></span>
    </div>
    <button type="submit" class="btn btn-success pull-right">Add</button>
  </div>
  {!! Form::close() !!}
</div>

@endsection

