@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header" style="background-color:#43A6C6;font-family:Bold;font-size:20px;">{{ __('File Dashboard') }}</div>

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
<br>
<button type="button" class="custom-btn btn-12" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <span>Click!</span><span>Create File  <i class="fa fa-file"></i></span>
  
</button>
 
<br>
 <br>     
<!-- Modal add file -->
<form action="{{ route('addfile') }}" method="POST" href="" enctype="multipart/form-data">
              @csrf
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header" style="background-color:#43A6C6">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" >Uploading of File</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mt-2" >
        <select name="project[]" class="form-control selectpicker" placeholder="x" multiple required>
             
    <option disabled>Select Project <span style="color:red;">*</span></option>
@foreach($establishment as $key => $datas)
    <option value="{{$datas->project_name}}">{{$datas->project_code}}-{{$datas->project_name}}</option>
@endforeach
  </select>
  <label for="staticEmail" class="col-sm-5 col-form-label">Choose Project <span style="color:red;">*</span></label>
  </div>

        

       <div class="form-floating mt-2" >                
            <select class="form-control form-control-sm selectpicker" multiple placeholder="x" list="datalistOptions" id="exampleDataList" name="access[]" required>
              <option disabled>Choose Accessible to </option>
              @foreach($company_roles as $key => $datas)
              <option value="{{$datas->company_role}}">{{$datas->company_role}}</option>
              @endforeach
            </select>
            <label for="staticEmail" class="col-sm-4 col-form-label">Accessible to:<span style="color:red;">*</span></label>
        </div>
      
        
    <div class="form-floating mt-2" > 
         <textarea name="description" id="description" placeholder="b" class="form-control form-control-sm " aria-label=".form-control-sm example" required> </textarea>
        <label for="description"  >Description<span style="color:red;">*</span></label>
    </div>

<input type="text" name="emp_id" value="{{ Auth::user()->id }}" hidden>
<input type="text" name="created_by" value="{{ Auth::user()->name }}" hidden>

    <div class="form-floating mt-2" >
<input type="file" name="file" id="fileinsert" placeholder="x" onchange="myFunction()" accept="image/*,.doc,.docx,.xlsx,.pdf" class="form-control" required>

    </div>



      </div>

  



      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="submit" id="Save" class="btn btn-primary">Submit</button>
           </form>
      </div>
    </div>
  </div>
</div>
<div class="container">

 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   <span style="float:right;font-family:Bold;">
<input type="text" name="" id="myInputTextField"  class="form-control form-control-sm" placeholder="Search">
  </span>
<table id="datatable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%"> 
        <thead>  
           <tr >
            <th>File ID</th>
    <th >Uploaded By</th>
    <th >Accessible to</th>
    <th >Project Name</th>
    <th >File Name</th>
    <th >File Description</th>
    <th >Date Created</th>
    <th >Last Updated</th>
 <th >Action</th>

  </tr>
</thead>
  @if (is_array($participant) || is_object($participant))

@foreach($participant as $key => $data)
  <tr  >

    <td style="text-align: center;">{{$data->file_id}}</td>
    <td>{{$data->created_by}}</td>
    <td>{{$data->access_to}}</td>
    <td>{{$data->project_name}}</td>
    <td>{{$data->filename}}</a>
     </td>
     <td>{{$data->description}}</td>
    <td>{{ \Carbon\Carbon::parse($data->date_created)->format('m-d-Y H:i:A')}} </td>
    <td>{{ \Carbon\Carbon::parse($data->updated_at)->format('m-d-Y H:i:A ')}} </td>

  <span>  <td >  <center>
 
<a href="{{ route('downloadfile', $data->file_id) }}"  class="btn btn-primary" title="Download" style="border-radius: 50%;">
   <i class="fa fa-download"></i>
</a>
@if($data->child_id==1)
<a href="{{ url('update/'.$data->file_id) }}" class="btn btn-primary" title="Updated Files" style="border-radius: 50%;"> <i class="fa fa-list" ></i></a></center></td></span>    @endif
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


<form action="/edit-file" method="POST"  id="edit-form" enctype="multipart/form-data">
             {{ csrf_field() }}
            <!--  {{ method_field('PUT')}} -->

<div class="modal fade" id="EditStaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header" style="background-color:#43A6C6;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" >Update File</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="outerDiv2">
    <div class="leftDiv2">
     
<center><h3><label for="staticEmail"  class="col-sm-5 col-form-label">Parent File</label></h3></center>
<input type="text" name="file_id" id="file_id" value="{{ Auth::user()->id }}" hidden>
        
    <div class="form-floating mt-2">
        <input class="form-control form-control-sm" type="text" placeholder="x" name="project_name" id="project_name" aria-label=".form-control-sm example" readonly>
        <label for="project_name" class="col-sm-5 col-form-label">Project Name</label>
    </div>
    <div class="form-floating mt-2">
       <input  class="form-control form-control-sm" type="text" name="filename" placeholder="x" id="filename" aria-label=".form-control-sm example" readonly>  
       <label for="filename" class="col-sm-5 col-form-label">File Name</label>
     </div>
           <label for="access_to"  class="col-sm-3 col-form-label">Access To:</label>             
        <select class="form-control selectpicker" placeholder="x" id="access_to" name="access_to[]"  multiple required>
        <option disabled>Choose Accessible to </option>                    
        @foreach($company_roles as $key => $datas)
    <option value="{{$datas->company_role}}">{{$datas->company_role}}</option>
        @endforeach
        </select>
   
  
     <div class="form-floating mt-2"> 
        <textarea name="description" id="file_description" placeholder="x" class="form-control form-control-sm" aria-label=".form-control-sm example" required> </textarea>
        <label for="file_description"  class="col-sm-3 col-form-label">Description</label>
    </div> 
    <div class="form-floating mt-2"> 
<input type="text" name="created_by" placeholder="x" value="{{ Auth::user()->name }}" hidden>
    </div>


</div>
<div class="rightDiv2">
<center><h3><label for="staticEmail"  class="col-sm-7 col-form-label">Child File</label></h3></center>
     
    <div class="form-floating mt-2">
        <input  id="file" name="file" type="file" class="form-control form-control-sm" placeholder="upload new file" >
        <label >Update File</label>
    </div>

    <div class="form-floating mt-2"> 
        <textarea name="child_description" id="child_description" placeholder="x" class="form-control form-control-sm"  required> </textarea>
        <label for="child_description" >Child File Description</label>
    </div>
</div>



                <!-- <label for="exampleDataList" class="form-label">Company Role</label>
<input class="form-control" list="datalistOptions" name="role" id="exampleDataList" placeholder="Type to search...">
<datalist id="datalistOptions">
  <option value="Super Admin">
  <option value="Admin">
  <option value="Business Analyst">
  <option value="BA/SA">
  <option value="Developers">
</datalist>-->
  
  


      </div>
  

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="submit" id="Save" class="btn btn-primary" >Save Changes</button>
       </form>    
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>  

<script>
function myFunction() {
  var x = document.getElementById("fileinsert").files[0].name;


$.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    }),
        $.ajax({
            url: "/check",
            method: "GET",
            data:{"file":x,},
            success: function (response) {
         // swal("Succes!", "Url Valid!", "success"); 
         if(response.key==1){

  swal("File Exist", "This file is already saved", "error");  
document.getElementById("Save").disabled = true;
document.getElementById("Save").style.backgroundColor = "#A1CDE6";
            // alert("FIle Exist");
         }else{

  document.getElementById("Save").disabled = false;
  document.getElementById("Save").style.backgroundColor = "#0080BD";
         }
            },
        });

}



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
var oldSel;
$('input[type="file"]').on('change', function() {
    if ($(this).val()) oldSel = $(this).clone();
    else $(this).replaceWith(oldSel);
});

</script>
 
<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>
<script type="text/javascript">
  Dropzone.autoDiscover = false;
$(".dropzone").dropzone({
 addRemoveLinks: true,
 removedfile: function(file) {
   var name = file.name; 
   
   $.ajax({
     type: 'POST',
     url: 'home.blade.php',
     data: {name: name,request: 2},
     sucess: function(data){
        console.log('success: ' + data);
     }
   });
   var _ref;
    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
 }
});
</script>

<script type="text/javascript">
myDropzone.on("complete", function(file) {
  myDropzone.removeFile(file);
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

      $('#file_id').val(data[0]);
      $('#emp_name').val(data[1]);
      $('#access_to').val(data[2]);
      $('#project_name').val(data[3]);
      $('#filename').val(data[4]);
      $('#file_description').val(data[5]);

      // $('#edit-form').attr('action','/edit-file.update/'+data[0]);
      $('#EditStaticBackdrop').modal('show');

    // alert(this.rowIndex);
});
});
 </script>
@endsection
