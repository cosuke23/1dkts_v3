@extends('layouts.app')
@section('content')
@include('sweetalert::alert')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header" style="background-color:#43A6C6;font-family:Bold;font-size:20px;">{{ __('Establishment Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                    @endif
                                                           <br>
<button type="button" class="custom-btn btn-12" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <span>Click!</span><span>   <i class="far fa-building "> Establishment</i></span>
  
</button>

<br>
<br>

<!-- Modal -->
<form action="{{ route('add_establishment') }}" method="POST" href="" enctype="multipart/form-data">
                @csrf
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#43A6C6;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" >Add Establishment</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <div class="modal-body">
                <div class="form-floating mt-2">
  <input class="form-control form-control-sm" name="establishment" placeholder="x" type="text" required>
  <label for="formFileSm" class="form-label">Establishment Name</label>
  </div>
   <div class="form-floating mt-2">
  <input class="form-control form-control-sm" name="address" placeholder="x"  type="text" required>
  <label for="formFileSm" class="form-label">Address</label>
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
    <th >Establishment</th>
    <th >Address</th>
    <th >Status</th>

  </tr>
</thead>
  @if (is_array($establishment) || is_object($establishment))

@foreach($establishment as $key => $data)
  <tr >
    <td >{{$data->id}}</td>
    <td >{{$data->establishment_name}}</td>
    <td >{{$data->address}}</td>
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


        <form action="/edit-establishment" method="POST" href="" enctype="multipart/form-data">
          {{ csrf_field() }}
<div class="modal fade" id="EditStaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#43A6C6;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" >Update Establsihment</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  <input class="form-control" list="datalistOptions" id="id" name="id" hidden>
  <div class="form-floating mt-2">
        <input class="form-control form-control-sm" type="text" name="establishment" id="establishment"  aria-label=".form-control-sm example"required>
        <label for="staticEmail" class="col-sm-5 col-form-label">Establishment Name</label>
        </div>
     <div class="mb-3">

    <div class="form-floating mt-2">
<input class="form-control" list="datalistOptions" id="address" name="address"  required>
                <label for="exampleDataList" class="form-label">Establishment Address</label>
</div>
</div>
 <div class="mb-3">
    <div class="form-floating mt-2">
  <select name="status" id="status" class="form-select" aria-label="Floating label select example">
    <option value="Active">Active</option>
    <option value="In-Active">In-Active</option>
  </select>
  <label for="formFileSm" class="form-label"> Status</label>
</div>
</div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Establishment</button>
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
      $('#establishment').val(data[1]);
      $('#address').val(data[2]);
      $('#status').val(data[3]);

      // $('#edit-form').attr('action','/edit-file.update/'+data[0]);
      $('#EditStaticBackdrop').modal('show');

    });
  });
</script>
@endsection
