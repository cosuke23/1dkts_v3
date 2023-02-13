@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header" style="background-color:#43A6C6;font-family:Bold;font-size:20px;">{{ __('User List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                    @endif


<!-- Modal -->
<form action="{{ route('add_role') }}" method="POST" href="" enctype="multipart/form-data">
                @csrf
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#43A6C6;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" >Add Company</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <div class="modal-body">
  <label for="formFileSm" class="form-label">Company Code</label>
  <input class="form-control form-control-sm" name="company_code" id="company_code"  type="text" required>
  <label for="formFileSm" class="form-label">Company Role</label>
  <input class="form-control form-control-sm" name="company_role" id="company_role"  type="text" required>



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
    <th >Fullname</th>
    <th >Role</th>
    <th >Email</th>
     <th >Date Verified</th>
     <th >Date Created</th>
    <!-- <th >Action</th> -->

  </tr>
</thead>
  @if (is_array($company_users) || is_object($company_users))

@foreach($company_users as $key => $data)
  <tr >
    <td >{{$data->id}}</td>
    <td >{{$data->name}}</td>
    <td >{{$data->role}}</td>
     <td >{{$data->email}}</td>
     @if($data->email_verified_at!='')
     <td style="color:green;">{{ \Carbon\Carbon::parse($data->email_verified_at)->format('m-d-Y h:i:a')}}</td>
     @else
      <td style="color:red;" >Not Yet Verified </td>
      @endif
<td >{{ \Carbon\Carbon::parse($data->created_at)->format('m-d-Y h:i:a')}}</td>
<!--     <span>  <td style="text-align: center;width:10px;">  <a href="#" class="btn btn-success edit" title="Edit" style="border-radius: 50%;">
 <i class="fa fa-edit"></i>
</a> 


</td></span> -->
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


        <form action="/edit-role" method="POST" href="" enctype="multipart/form-data">
          {{ csrf_field() }}
<div class="modal fade" id="EditStaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#43A6C6;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" >Update Role</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  <input class="form-control" list="datalistOptions" id="id" name="id" hidden>
        <label for="staticEmail" class="col-sm-5 col-form-label">Company Code</label>
        <input class="form-control form-control-sm" type="text" name="company_code" id="comp_code"  aria-label=".form-control-sm example"required>
     <div class="mb-3">
                <label for="exampleDataList" class="form-label">Company Role</label>
<input class="form-control" list="datalistOptions" id="comp_role" name="company_role"  required>
</div>
 <div class="mb-3">
  <label for="formFileSm" class="form-label"> Status</label>
  <select name="status" id="status" class="form-control">
    <option value="Active">Active</option>
    <option value="In-Active">In-Active</option>
  </select>
</div>


      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Edit</button>
            </form>

      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>

</div>
<script type="text/javascript">
    oTable = $('#datatable').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
$('#myInputTextField').keyup(function(){
      oTable.search($(this).val()).draw() ;
})
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
     $(document).ready(function (){
    var table=$('#datatable').DataTable();

    table.on('click','.edit',function(){

      $tr=$(this).closest('tr');

      if($($tr).hasClass('child')){
        $tr=$tr.prev('.parent');
      }

      var data=table.row($tr).data();
      console.log(data);

      $('#id').val(data[0]);
      $('#comp_code').val(data[1]);
      $('#comp_role').val(data[2]);
      $('#status').val(data[3]);

      // $('#edit-form').attr('action','/edit-file.update/'+data[0]);
      $('#EditStaticBackdrop').modal('show');

    });
  });
</script>
@endsection
