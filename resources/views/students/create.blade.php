@extends('students.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left" style="padding-left: 18px;">
            <h4>Add New Student</h4>
        </div>
        <div class="pull-right" style="float: right;">
            <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
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
   
<form action="{{ route('students.store') }}" method="POST" width="50%">
    @csrf
  
     <div class="row" style="padding-left: 20px;">
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder=" Student Name" required>
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Age:</strong>
                <input type="number" id="age" name="age" class="form-control" value="" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Gender:</strong>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="customRadio1" name="gender" value="male">
                <label for="customRadio1" class="custom-control-label">Male</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="customRadio2" name="gender" value="female" checked>
                <label for="customRadio2" class="custom-control-label">Female</label>
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
              
                <select id="teacher_id" name="teacher_id" class="form-control custom-select" required>
                    <option selected disabled>Select Reporting Teacher</option>
                    @foreach ($teachers as $teacher)
                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                    @endforeach
                  </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success" style="float: left;">Submit</button>
        </div>
    </div>
   
</form>
@endsection