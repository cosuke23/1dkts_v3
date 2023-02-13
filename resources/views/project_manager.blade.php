@extends('layouts.app')
@section('content')
@include('sweetalert::alert')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header" style="background-color:#43A6C6;font-family:Bold;font-size:20px;">{{ __('Department Head Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                    @endif
                    <br>
<button type="button" class="custom-btn btn-12" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <span>Click!</span><span><i class="fas fa-user-plus"> Department Head </i></span>
  
</button>

<br>
<br>

<!-- Modal -->
<form action="{{ route('adddept_head') }}" method="POST" href="" enctype="multipart/form-data">
                @csrf
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#43A6C6;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" >Add Department Head</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <div class="modal-body">
<div class="form-floating mt-2">
  <input class="form-control form-control-sm" name="full_name" id="full_name" placeholder="x" type="text" required>
  <label for="formFileSm" class="form-label">Full Name</label>
</div>
<div class="form-floating mt-2">
  <input class="form-control form-control-sm" name="dept_name" id="dept_name" placeholder="x" type type="text" required>
  <label for="formFileSm" class="form-label">Department</label>
</div>

<input type="text" name="created_by" value="{{ Auth::user()->name }}" hidden>
<input type="text" name="emp_id" value="{{ Auth::user()->id }}" hidden>
<input type="text" name="role" value="{{ Auth::user()->role }}" hidden >


<!-- <p id="demo">here</p> -->



      </div>
  </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Submit</button>

      </div>
    </div>
  </div>
</div>
<div class="container">


   <span style="float:right;font-family:Bold;">
<input type="text" name="" id="myInputTextField"  class="form-control form-control-sm" placeholder="Search">
  </span>
<table id="datatable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
<thead>
           <tr >
    <th >id</th>
    <th >Department Head</th>
    <th >Department</th>
     <th >Status</th>

  </tr>
</thead>
  @if (is_array($project_manager) || is_object($project_manager))

@foreach($project_manager as $key => $data)
  <tr >
    <td >{{$data->id}}</td>
    <td >{{$data->full_name}}</td>
     <td >{{$data->department}}</td>
     <td >{{$data->status}}</td>

   
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
</div>

  <!-- Edit file -->


        <form action="/edit-dept" method="POST" href="" enctype="multipart/form-data">
          {{ csrf_field() }}
<div class="modal fade" id="EditStaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#43A6C6;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" >Update Department Head</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  <input class="form-control" list="datalistOptions" id="id" name="id" hidden>
  <div class="form-floating mt-2">
        <input class="form-control form-control-sm" type="text" name="dept_head" id="dept_head" placeholder="x"  aria-label=".form-control-sm example" required>
        <label for="staticEmail" class="col-sm-3 col-form-label">Department Head Name</label>
  </div>
  <div class="mb-3">
  <div class="form-floating mt-2">
     
<input class="form-control" list="datalistOptions" id="department" name="department" placeholder="x" required>
                <label for="exampleDataList" class="form-label">Department</label>
  </div>
</div>
 <div class="mb-3">
<div class="form-floating mt-2">

  <select name="status" id="status" placeholder="x" class="form-select" id="floatingSelect">
    <option value="Active">Active</option>
    <option value="Outmoded">Outmoded</option>
    <option value="In-Active">In-Active</option>
  </select>
  <label for="floatingSelect" class="form-label"> Status</label>
</div>
</div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Info</button>
            </form>

      </div>
    </div>
  </div>
</div>
    </script>
<script type="text/javascript">
    oTable = $('#datatable').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
$('#myInputTextField').keyup(function(){
      oTable.search($(this).val()).draw() ;
})
</script>
<script type="text/javascript">
    $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>



<script type="text/javascript">
function searchTable() {
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                found = true;
            }
        }
        if (found) {
            tr[i].style.display = "";
            found = false;
        } else {
            tr[i].style.display = "none";
        }
    }
}
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
<script type="text/javascript">
$(function(){
$("table tr").dblclick(function(){
 var table=$('#datatable').DataTable();


      $tr=$(this).closest('tr');

      if($($tr).hasClass('child')){
        $tr=$tr.prev('.parent');
      }

      var data=table.row($tr).data();
      console.log(data);

      $('#id').val(data[0]);
      $('#dept_head').val(data[1]);
      $('#department').val(data[2]);
      $('#status').val(data[3]);

      // $('#edit-form').attr('action','/edit-file.update/'+data[0]);
      $('#EditStaticBackdrop').modal('show');
});
  });
</script>
@endsection
