@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                    @endif
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Create Link <i class="fa fa-link"> </i>
</button>
<br>
<br>

<!-- Modal -->

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#43A6C6;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" >Uploading of Link</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <div class="modal-body">
  <label for="formFileSm" class="form-label">Insert Link</label>
  <input class="form-control form-control-sm" name="link" id="myLink" onchange="myFunction()"  type="link">

        <label for="staticEmail" class="col-sm-3 col-form-label">Domain Name</label>
        <input class="form-control form-control-sm" type="text" name="linkname" id="demo"   >

        <label for="staticEmail" class="col-sm-3 col-form-label">Link Type</label>
        <input class="form-control form-control-sm" type="text" name="linktype" id="type_demo"   >

        <label for="staticEmail" class="col-sm-3 col-form-label">Description</label>
        <textarea name="description" id="desc" class="form-control form-control-sm" aria-label=".form-control-sm example"> </textarea>
<input type="text" name="created_by" value="{{ Auth::user()->name }}" hidden>
<input type="text" name="emp_id" value="{{ Auth::user()->id }}" hidden>
<input type="text" name="role" value="{{ Auth::user()->role }}" hidden >


<!-- <p id="demo">here</p> -->



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="submit" id="buttonsubmit" class="btn btn-primary">Submit</button>

      </div>
    </div>
  </div>
</div>
<div class="container">



<table id="datatable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
<thead>
           <tr >
    <th >id</th>
    <th >Uploader</th>
    <th >Link Status</th>
    <th >File Name</th>
    <th >Description</th>
    <th >Date Created</th>
    <th >Action</th>

  </tr>
</thead>
  @if (is_array($participant) || is_object($participant))

@foreach($participant as $key => $data)
  <tr >
    <td >{{$data->id}}</td>
    <td >{{$data->created_by}}</td>
     <td >{{$data->link_status}}</td>
    <td>{{$data->link_name}}</td>
     <td >{{$data->description}}</td>

    <td>{{ \Carbon\Carbon::parse($data->created_at)->format('m-d-Y ')}}</td>
    <span>  <td>  <a href="#" class="btn btn-success edit">
 <i class="fa fa-edit"></i>
</a> <a href="{{$data->link}}" rel="noopener noreferrer" target="popup" onclick="window.open('{{$data->link}}','name','width=1500,height=1000')" class="btn btn-success"> <i class="fa fa-eye"></i></a> </td></span>
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


        <form action="/edit-link" method="POST" href="" enctype="multipart/form-data">
          {{ csrf_field() }}
<div class="modal fade" id="EditStaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#43A6C6;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" >Update Link</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  <input class="form-control" list="datalistOptions" id="link_id" name="id" hidden>
        <label for="staticEmail" class="col-sm-3 col-form-label">Fullname</label>
        <input class="form-control form-control-sm" type="text"  value="{{ Auth::user()->name }}" aria-label=".form-control-sm example"readonly>

                <label for="exampleDataList" class="form-label">Company Role</label>
<input class="form-control" list="datalistOptions" id="exampleDataList" value="{{ Auth::user()->role }}" readonly>
<input class="form-control" list="datalistOptions" id="exampleDataList" name="created_by" value="{{ Auth::user()->name }}" hidden>
        <div class="mb-3">
  <label for="formFileSm" class="form-label">Link Name</label>
  <input class="form-control form-control-sm" name="link" id="link_name" type="text" >
</div>

 <label for="exampleDataList" class="form-label">File Description</label>
<input class="form-control" list="datalistOptions" name="description" id="description"  >
          <div class="mb-3">
  <label for="formFileSm" class="form-label">Link Status</label>
  <select name="link_status" class="form-control">
    <option value="Active">Active</option>
    <option value="Outmoded">Outmoded</option>
    <option value="Expired">Expired</option>
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


<script type="text/javascript">
function myFunction() {
  var x = document.getElementById("myLink").value;
  const myArray = x.split("/");
   var split =document.getElementById("demo").innerHTML = myArray[2];
   var split_type =document.getElementById("type_demo").innerHTML = myArray[3];

  document.getElementById("demo").value=split;
  document.getElementById("type_demo").value=split_type;

}

$('#buttonsubmit').click(function(){

 $link = document.getElementById("myLink").value;
 $linkname = document.getElementById("demo").value;
 $linktype = document.getElementById("type_demo").value;
 $desc = document.getElementById("desc").value;
 $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    }),
        $.ajax({
            url: "/controllerhere",
            method: "GET",
                 });


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
     $(document).ready(function (){
    var table=$('#datatable').DataTable();

    table.on('click','.edit',function(){

      $tr=$(this).closest('tr');

      if($($tr).hasClass('child')){
        $tr=$tr.prev('.parent');
      }

      var data=table.row($tr).data();
      console.log(data);

      $('#link_id').val(data[0]);
      $('#uploader').val(data[1]);
      $('#status').val(data[2]);
      $('#link_name').val(data[3]);
      $('#description').val(data[4]);

      // $('#edit-form').attr('action','/edit-file.update/'+data[0]);
      $('#EditStaticBackdrop').modal('show');

    });
  });
</script>
@endsection
