@extends('students.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                
            </div>
            <div class="pull-right" style="padding-left: 20px;padding-bottom: 10px;">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Create New Student</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered" style="margin-left: 20px;">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Reporting Teacher</th>
            <th width="280px">Action</th>
        </tr>
        @if(!empty($students))
        @foreach ($students as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->age }}</td>
            <td>{{ $student->gender }}</td>
            <td>{{ $student->teacher->name }}</td>
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
   
                   
    
                    <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
            <tr>
                <td colspan="4">No records</td>
            </tr>
        @endif
        
    </table>
  
    {!! $students->links() !!}
      
@endsection