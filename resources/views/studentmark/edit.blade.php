@extends('studentmark.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left" style="padding-left: 18px;">
                <h4>Edit Student Mark</h4>
            </div>
            <div class="pull-right" style="float: right;">
                <a class="btn btn-primary" href="{{ route('studentmark.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('studentmark.update',$studentmark->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row" style="padding-left: 20px;">
         <div class="col-xs-8 col-sm-8 col-md-8">
    <div class="form-group">
    <strong>Students:</strong>
        <select id="student_id" name="student_id" class="form-control custom-select" required>
            <option value="" >Select Students</option>
            @foreach ($students as $student)
            <option value="{{$student->id}}" @if($student->id == $studentmark->student_id) selected @endif>{{$student->name}}</option>
            @endforeach
            </select>
    </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
    <div class="form-group">
    <strong>Term:</strong>
        <select id="term_id" name="term_id" class="form-control custom-select" required>
            <option  value="" selected >Select Term</option>
            @foreach ($terms as $term)
            <option value="{{$term->id}}" @if($term->id == $studentmark->term_id) selected @endif>{{$term->term}}</option>
            @endforeach
            </select>
    </div>
        </div>
           
        
        <div class="col-xs-8 col-sm-8 col-md-8">
            <h3>Subjects</h3>
            <div class="form-group">
                <strong>History:</strong>
                <input type="number" value="{{ $studentmark->history }}" name="history" id="history" class="form-control" placeholder=" History" required>
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
                <strong>Maths:</strong>
                <input type="number" value="{{ $studentmark->maths }}" name="maths" id="maths" class="form-control" placeholder=" Maths" required>
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
                <strong>Science:</strong>
                <input type="number" value="{{ $studentmark->science }}" name="science" id="science" class="form-control" placeholder=" Science" required>
            </div>
        </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-success" style="float: left;">Submit</button>
            </div>
        </div>
   
    </form>
@endsection