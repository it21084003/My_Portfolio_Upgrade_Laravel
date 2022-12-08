@extends('admin_panel.master')
@section('title','projwct index')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-title">Student Count</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session('successMsg'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey! </strong> {{Session('successMsg')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                    @if($studentCount->count() < 1)
                    <form action="{{url('admin/student_counts/store')}}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="number" name="count" class="form-control @error('count') is-invalid
                            @enderror " style="border-radius: 4px 0px 0px 4px;">

                            <button class="btn btn-primary" style="border-radius: 0px 4px 4px 0px;">Create</button>
                        </div>
                            @error('count')
                                <div class="text-danger">{{$message}}</div>
                            @enderror

                    </form>
                    @endif
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>count</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($student)
                            <tr>
                                <td>{{$student->count}}</td>
                                <td>
                                    <button class="btn btn-info btn-sm" id="addBtn"><i class="fa-sharp fa-solid fa-plus-circle"></i> Add More Student</a>
                                    </button>
                                    <form action="{{url('admin/student_counts/'.$student->id.'/update')}}" method="POST" class="col-md-6 " id="addForm" style="display: none">
                                        @csrf
                                        <div class="input-group">
                                            <input type="number" name="count" class="form-control @error('count')
                                                is-invalid
                                            @enderror" required placeholder="Enter Student Count" style="border-radius: 4px 0px 0px 4px;">
                                            <button type="submit" class="btn btn-primary" style="border-radius: 0px 4px 4px 0px;"><i class="fa-sharp fa-solid fa-plus-circle"></i> Add</button>
                                        </div>
                                        @error('count')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </form>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-fotter">
                    {{-- {{$projects->links()}} --}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
    <script>
         $(document).ready(function(){
            $('#addBtn').click(function(){
                $('#addForm').css('display','block');
                $(this).css('display','none');
            });
         })
    </script>
@endsection
