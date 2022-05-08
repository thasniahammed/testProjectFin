@extends('studentmark.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                
            </div>
            <div class="pull-right" style="padding-left: 20px;padding-bottom: 10px;">
                <a class="btn btn-success" href="{{ route('studentmark.create') }}"> Add Mark</a>
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
            <th>Maths</th>
            <th>Science</th>
            <th>History</th>
            <th>Term</th>
            <th>Total Marks</th>
            <th>Created On</th>
            <th width="280px">Action</th>
        </tr>
        @if(!empty($marks))
        @foreach ($marks as $mark)
        <tr>
            <td>{{ ++$i }}</td>
            <td> {{ $mark->students == "" ?  "--": $mark->students->name }}</td>
            <td>{{ $mark->maths }}</td>
            <td>{{ $mark->science }}</td>
            <td>{{ $mark->history }}</td>
            <td>{{ $mark->term->term }}</td>
            <td>{{ $mark->total_marks }}</td>
            <td>{{ date('M d Y H:i:s',strtotime($mark->created_at)) }}</td>
            <td>
                <form action="{{ route('studentmark.destroy',$mark->id) }}" method="POST">
   
                   
    
                    <a class="btn btn-primary" href="{{ route('studentmark.edit',$mark->id) }}">Edit</a>
   
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
  
    {!! $marks->links() !!}
      
@endsection