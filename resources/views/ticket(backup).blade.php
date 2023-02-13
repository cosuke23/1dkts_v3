@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header" style="background-color:#43A6C6;font-family:Bold;font-size:20px;">{{ __('Ticket Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                                          @if (session('file_error'))
    <div class="alert alert-danger">
        <ul>
              {{ session('file_error') }}
        </ul>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- <input type="text" id="myInput" style="width:300px;height:40px;" onkeyup="myFunction()" placeholder="Search for uploaders name.."> -->
<!-- <input id='myInput' onkeyup='searchTable()' type='text'> -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Create Ticket <i class="fa fa-ticket"></i>
</button>
<br>
<br>

<!-- Modal -->
<form action="" method="POST" href="{{(url('add-ticket'))}}" enctype="multipart/form-data">
                @csrf
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#43A6C6;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" >Create Ticket </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label for="staticEmail" class="col-sm-4 col-form-label">Ticket Name <span style="color:red;">*</span></label>
        <input class="form-control form-control-sm" type="text" name="ticket_title" placeholder="Enter Ticket Name" aria-label=".form-control-sm example" required>
        <label for="formFileSm" class="form-label">Assigned to: <span style="color:red;">*</span></label>
  <select name="assign_to" class="form-control" required>
  
@foreach($employees as $key => $datas)
    <option value="{{$datas->company_role}}">{{$datas->company_role}}</option>
@endforeach
  </select>


<label>Choose project <span style="color:red;">*</span></label>
 <select name="cat"  class="form-control form-control-sm" >
@foreach($project_names as $key => $datas)
<option value="{{$datas->project_name}}">{{$datas->project_code}}-{{$datas->project_name}}</option>
@endforeach
 </select>
        <label for="staticEmail" class="col-sm-3 col-form-label">Description<span style="color:red;">*</span></label>
        <textarea name="description" class="form-control form-control-sm" aria-label=".form-control-sm example" required="required"> </textarea>

<input type="text" name="created_by" value="{{ Auth::user()->name }}" hidden>
<input type="text" name="role" value="{{ Auth::user()->role }}" hidden >
<input type="text" name="emp_id" value="{{ Auth::user()->id }}" hidden >
<input type="text" name="establishment" value="{{ Auth::user()->establishment }}" hidden >




        <div class="mb-3">
  <label for="formFileSm" class="form-label">Choose File </label>
  <input class="form-control form-control-sm" name="file" accept="image/*,.doc,.docx,.xlsx,.pdf" accept="image/*" id="formFileSm" onchange="loadFile(event)" type="file" >
  <br>
  <!-- <img id="output" style="width:470px;height:350px;" /> -->
</div>

      </div>
  </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Form   -->





<table id="datatable" class="table table-striped table-bordered table-responsive table-hover" >
        <thead>
           <tr >
    <th>Ticket No.</th>
    <!-- <th>Uploader</th> -->
    <th>Assigned To</th>
    <th>ticket Title</th>
    <th>Project Name</th>
    <th>Description</th>
    <th>Status</th>
    <th>Created By</th>
    <th>Date Created</th>
    <th>Last Updated</th>
    <th>Action</th>
    <th hidden>comment</th>
  </thead>
  </tr>
  @if (is_array($participant) || is_object($participant))

@foreach($participant as $key => $data)
  <tr >
    <td style="width:160px;">{{$data->no}}</td>
    <!-- <td>{{$data->created_by}}</td> -->
    <td>{{$data->user_name}}</td>
    <td>{{$data->ticket_title}}</td>
    <td>{{$data->category}}</td>
    <td>{{$data->concern}}</td>
    <td>{{$data->status}}</td>
    <td>{{$data->created_by}}</td>
    <td>{{ \Carbon\Carbon::parse($data->created_at)->format('m-d-Y h:i:a')}}</td>
    <td>{{ \Carbon\Carbon::parse($data->updated_at)->format('m-d-Y h:i:a')}}</td>
     <td hidden>{{$data->comment}}</td>
    <span>  <td> <center>  <a href="#" class="btn btn-success edit" onclick="ticket('{{$data->no}}')" style="border-radius: 50%;" alt="Edit" title="Edit">
 <i class="fa fa-edit" alt="Edit" ></i>
</a> <br> <a  href="{{ route('downloadTicket', $data->id) }}"  class="btn btn-primary" style="border-radius: 50%;" title="Download">
<!-- <a href="{{ route('downloadfile', $data->no) }}"  class="btn btn-primary"> -->
   <i class="fa fa-download"></i>
</a></center></td></span>
</tr>

<!-- Modal -->

      </div>
    </div>
  </div>
</div>
</td>
  </tr>
 @endforeach
 @endif
</table>


                </div>
            </div>
        </div>
    </div>
</div>

 <form action="/edit-ticket" method="POST" href="" id="edit-ticket" enctype="multipart/form-data">
          {{ csrf_field() }}
<div class="modal fade" id="EditStaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <!-- <div class="modal-dialog modal-xl"> -->
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#43A6C6;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" >Editing of Ticket</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<div class="outerDiv2">
    <div class="leftDiv2">
     <label for="staticEmail" style="font-family:Bold;font-size:20px;" class="col-sm-10   col-form-label" id="nameofproj"></label>
 
 <table id="datatable" class="table table-striped table-bordered table-responsive table-hover" > 
        <thead>  
           <tr >
  
 
    <th style="width:14.28%;">Forward to</th>
    <th style="width:14.28%;">Status</th>
    <th style="width:14.28%;">Comment</th>
    <th style="width:14.28%;">Date Updated</th>
  </thead>
  </tr>
  
 @php
 $user=Auth::user()->name;
$user_role=Auth::user()->role;


       $data_e = DB::select(DB::raw("SELECT * from ticket_audit_trails where accessible_to='$user_role'or action_by='$user'  "));
   @endphp
  @foreach($data_e as $key => $datas_e)
  <tr >

 
    <td>{{$datas_e->accessible_to}}</td>
    <td>{{$datas_e->ticket_status}}</td>
    <td>{{$datas_e->comment}}</td>

  <td>{{ \Carbon\Carbon::parse($datas_e->updated_at)->format('m-d-Y h:i:a')}}</td>

</tr>
@endforeach


</td>
  </tr>

</table>
    </div>
    <div class="rightDiv2">
        <input class="form-control form-control-sm" type="text" name="editor"  id="editor" value="{{ Auth::user()->name }}" aria-label=".form-control-sm example"hidden>
 <label for="staticEmail" class="col-sm-5 col-form-label">Ticket Name</label>
        <input class="form-control form-control-sm" type="text" name="ticketname"  id="ticket_title" aria-label=".form-control-sm example"readonly>

        <label for="staticEmail" class="col-sm-5 col-form-label">Ticket Created By</label>
        <input class="form-control form-control-sm" type="text" name="created_by"  id="created_by" aria-label=".form-control-sm example"readonly>


                <label for="exampleDataList" class="form-label">Company Role</label>
<input class="form-control" list="datalistOptions" id="exampleDataList" value="{{ Auth::user()->role }}"  readonly>

<label for="staticEmail" class="col-sm-5 col-form-label">Project Name</label>
        <input class="form-control form-control-sm" type="text" name="project_name"  id="project_name" aria-label=".form-control-sm example"readonly>
 <label for="staticEmail" class="col-sm-4 col-form-label">Forward to:</label>
         <select name="assign_to" id="assign_to" class="form-control">
    <option disabled> Choose Personnel</option>
@foreach($employee as $key => $datas)
    <option value="{{$datas->name}}">{{$datas->name}} ({{$datas->role}}) </option>
@endforeach
  </select>

<input class="form-control" list="datalistOptions" name="no" id="no"  hidden>
<input class="form-control" list="datalistOptions" name="concern" id="concern"  hidden>
<!-- <input class="form-control" list="datalistOptions" name="pre_status" id="status"  hidden> -->
          <div class="mb-3">
<label for="exampleDataList" class="form-label">Comment</label>
 <textarea name="comment"  id="comment" class="form-control form-control-sm" aria-label=".form-control-sm example" required> </textarea>
  <label for="formFileSm" class="form-label">Status</label>
  <select name="status" id="status" class="form-control">
    <option  disabled>Choose status</option>
    <option value="On Going">On Going</option>
    <option value="Done">Done</option>

  </select>
  





      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Edit</button>
            </form>
<script type="text/javascript">

  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      // URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
<script type="text/javascript">
  $('#iframe_id').load(function () {
    $(this).height($(this).contents().height());
    $(this).width($(this).contents().width());
});
</script>


<script type="text/javascript">

$(document).ready(function () {
  $('#myTable').DataTable();
  $('.dataTables_length').addClass('bs-select');
});</script>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
