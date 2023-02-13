@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header" style="background-color:#43A6C6;font-family:Bold;font-size:20px;">{{ __('Link Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                    @endif
                    <br>
<button type="button" class="custom-btn btn-12" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <span>Click!</span><span> Bookmark a Link <i class="fa fa-link"> </i></span>
  
</button>

<br>
<br>

<!-- Modal -->
<form action="" method="POST" href="" id="form" enctype="multipart/form-data">
                @csrf
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#43A6C6;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" >Bookmark a Link</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <div class="modal-body">
<div class="form-floating mt-2">
  <input class="form-control form-control-sm" placeholder="x" name="link" placeholder="ex:www.google.com/" id="myLink"  onchange="myFunction()"
  pattern="https://.*" type="link">
    <label for="myLink" class="form-label">Insert Link <span style="color:red;">*</span></label>
</div>
<div class="form-floating mt-2">
        <input class="form-control form-control-sm" type="text" name="linkname" id="demo"  placeholder="x" readonly>
        <label for="staticEmail" class="col-sm-5 col-form-label">Domain Name</label>
 </div> 
<div class="form-floating mt-2">         
        <select name="project[]" class="form-control selectpicker" multiple required>
    <option disabled>Select Project</option>
@foreach($establishment as $key => $datas)
    <option value="{{$datas->project_name}}">{{$datas->project_code}}-{{$datas->project_name}}</option>
@endforeach
  </select>
             <label for="staticEmail" class="col-sm-5 col-form-label">Choose Project <span style="color:red;">*</span></label>
</div>
<div class="form-floating mt-2">            
 <select class="form-control form-control-sm selectpicker" multiple  list="datalistOptions" id="exampleDataList" name="access[]" required>

  <option disabled>Choose Accessible to </option>
  @foreach($company_roles as $key => $datas)
  <option value="{{$datas->company_role}}">{{$datas->company_role}}</option>
@endforeach
</select>
    <label for="staticEmail" class="col-sm-4 col-form-label">Accessible to: <span style="color:red;">*</span></label>
</div>
<!-- 
        <label for="staticEmail" class="col-sm-3 col-form-label">Link Type</label>
        <input class="form-control form-control-sm" type="text" name="linktype" id="type_demo"   > -->

  <div class="form-floating mt-2">       
        <textarea name="description" class="form-control form-control-sm" aria-label=".form-control-sm example" required> </textarea>
        <label for="staticEmail" class="col-sm-3 col-form-label">Description <span style="color:red;">*</span></label>
  </div>          
<input type="text" name="created_by" value="{{ Auth::user()->name }}" hidden>
<input type="text" name="emp_id" value="{{ Auth::user()->id }}" hidden>
<input type="text" name="role" value="{{ Auth::user()->role }}" hidden >


<!-- <p id="demo">here</p> -->



      </div>
  </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="submit" id="Save" class="btn btn-primary">Submit</button>

      </div>
    </div>
  </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">


   <span style="float:right;font-family:Bold;">
<input type="text" name="" id="myInputTextField"  class="form-control form-control-sm" placeholder="Search">
  </span>
<table id="datatable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
<thead>
           <tr >
    <th >id</th>
    <th >Uploader</th>
    <th >Link Status</th>
    <th >Domain Name</th>
    <th >Link Description</th>
    <th >Accesible to</th>
    <th >Project</th>
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
     <td>{{$data->access_to}}</td>
     <td>{{$data->project_name}}</td>

    <td>{{ \Carbon\Carbon::parse($data->created_at)->format('m-d-Y  h:i:a')}}</td>
    <span>  <td style="text-align: center;"> 

<a href="{{$data->link}}" rel="noopener noreferrer" target="popup" onclick="window.open('{{$data->link}}','name','width=1500,height=1000')" class="btn btn-success" title="View" style="border-radius: 50%;"> <i class="fa fa-eye"></i></a> 

</td></span>
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
        <h1 class="modal-title fs-5" id="staticBackdropLabel" >Update Bookmark</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  <input class="form-control" list="datalistOptions" id="link_id" name="id" hidden>
    <div class="form-floating mt-2">    
        <input class="form-control form-control-sm" type="text"  value="{{ Auth::user()->name }}" aria-label=".form-control-sm example"readonly>
        <label for="staticEmail" class="col-sm-3 col-form-label">Fullname</label>
</div>
  <div class="form-floating mt-2">              
<input class="form-control" list="datalistOptions" id="exampleDataList" value="{{ Auth::user()->role }}" readonly>
<input class="form-control" list="datalistOptions" id="exampleDataList" name="created_by" value="{{ Auth::user()->name }}" hidden>
<label for="exampleDataList" class="form-label">Company Role</label>
  </div>
<div class="form-floating mt-2">      
<select class="form-control form-control-sm selectpicker" multiple  list="datalistOptions" id="access_to" name="access[]" required>

  <option disabled>Choose Accessible to </option>
  @foreach($company_roles as $key => $datas)
  <option value="{{$datas->company_role}}">{{$datas->company_role}}</option>
@endforeach
</select>
<label for="staticEmail" class="col-sm-5 col-form-label">Accessible To.</label>
</div> 
 <div class="form-floating mt-2">        
        <select name="project[]" id="project" class="form-control selectpicker" multiple required>
    <option disabled>Select Project</option>
@foreach($establishment as $key => $datas)
    <option value="{{$datas->project_name}}">{{$datas->project_code}}-{{$datas->project_name}}</option>
@endforeach
  </select>
  <label for="staticEmail" class="col-sm-5 col-form-label">Choose Project</label>
</div>

<div class="form-floating mt-2">
<input class="form-control" list="datalistOptions" name="description" id="description"  >
 <label for="exampleDataList" class="form-label">File Description</label>
</div>
          <div class="mb-3">
<div class="form-floating mt-2">
  <select name="link_status" class="form-control">
    <option value="Active">Active</option>
    <option value="Outmoded">Outmoded</option>
    <option value="Expired">Expired</option>
  </select>
    <label for="formFileSm" class="form-label">Link Status</label>
</div>
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
<script>
// var form = document.getElementById('form');
// var field = document.getElementById('myLink');
// var fieldstatus = document.getElementById('fieldstatus');
// var regExPattern = new RegExp('^https?://(www\.)?linkedin\.com', 'i');
// var messages="";
// // validation on form submit
// form.addEventListener('submit', function(ev) {
//   if (!regExPattern.test(field.value)) {
//     ev.preventDefault();
//     alert('The input value does not match the pattern! ex:(www.google.com)!');
//   }
// });

// // validation on input
// field.addEventListener('input', function() {
//   if (!regExPattern.test(field.value)) {
//     fieldstatus.innerHTML = 'invalid';
//   } else {
//     fieldstatus.innerHTML = 'valid';
//   }
// });



    </script>
<script type="text/javascript">
    $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>
<script type="text/javascript">
    oTable = $('#datatable').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
$('#myInputTextField').keyup(function(){
      oTable.search($(this).val()).draw() ;
})
</script>
<script type="text/javascript">
function myFunction() {
  var x = document.getElementById("myLink").value;
  var y = document.getElementById("demo").value;
 const myArray = x.split("/");
   var split =document.getElementById("demo").innerHTML = myArray[2];
   var http="https://";
   document.getElementById("myLink").value;
  var check=document.getElementById("demo").value=split;
  var und="undefined";
  if(y=="undefined"){
    swal("Invalid Format!", "Make Sure you have www. or https:// and .com on your url!", "error");  
document.getElementById("Save").disabled = true;
  // 
  }else{
document.getElementById("Save").disabled = false; 
  }

}
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>  
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
    var table=$('#datatable').DataTable();
  $('#myTable').DataTable();
  $('.dataTables_length').addClass('bs-select');
});</script>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
$(function(){
$("table tr").dblclick(function(){
 var table=$('#datatable').DataTable();
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
      $('#access_to').val(data[5]);
      $('#project').val(data[6]);

      // $('#edit-form').attr('action','/edit-file.update/'+data[0]);
      $('#EditStaticBackdrop').modal('show');

    // alert(this.rowIndex);
});
});
 </script>
@endsection
