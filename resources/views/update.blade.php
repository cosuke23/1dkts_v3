@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                @if (is_array($participant) || is_object($participant))

@foreach($participant as $key => $data)
                <div class="card-header" style="background-color:#43A6C6;font-family:Bold;font-size:20px;">{{$data->B_file}}</div>

@endforeach
@endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                    @endif
    <a href="/home">  <button type="button" class="btn btn-primary" data-bs-toggle="modal" >
   <i class="fa fa-arrow-left">  Return</i>
</button></a>
<br>
 <br>     

<!-- Modal add file -->
<form action="{{ route('addfile') }}" method="POST" href="" enctype="multipart/form-data">
              @csrf
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header" style="background-color:43A6C6;">

        <h1 class="modal-title fs-5" id="staticBackdropLabel" >Uploading of File</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <label for="staticEmail" class="col-sm-3 col-form-label">Project Name</label>
        <select name="project" class="form-control" required>
    <option value="">Select Project</option>
@foreach($establishment as $key => $datas)
    <option value="{{$datas->project_name}}">{{$datas->project_name}}</option>
@endforeach
  </select>
        <label for="staticEmail" class="col-sm-3 col-form-label">Accessible to:</label><br>

                     
<select class="form-control form-control-sm"  list="datalistOptions" id="exampleDataList" name="access" required>

  <option disabled>Choose Accessible to </option>
  <option value="All">All</option>
  <option value="Super Admin">Super Admin</option>
  <option value="Admin">Admin</option>
  <option value="Business Analyst">Business Analyst</option>
  <option value="BA/SA">Business/System Analyst</option>
  <option value="Developer">Developer</option>
    <option value="Support">Support</option>
         <option value="Quality Assurance">Quality Assurance </option>
         <option value="Hospital Staff">Hospital Staff</option>
</select>
                         
        <br>
        <label for="staticEmail" class="col-sm-3 col-form-label">Description</label>
        <textarea name="description" class="form-control form-control-sm" aria-label=".form-control-sm example" required> </textarea>
<input type="text" name="emp_id" value="{{ Auth::user()->id }}" hidden>
<input type="text" name="created_by" value="{{ Auth::user()->name }}" hidden>


                <!-- <label for="exampleDataList" class="form-label">Company Role</label>
<input class="form-control" list="datalistOptions" name="role" id="exampleDataList" placeholder="Type to search...">
<datalist id="datalistOptions">
  <option value="Super Admin">
  <option value="Admin">
  <option value="Business Analyst">
  <option value="BA/SA">
  <option value="Developers">
</datalist>-->
<label for="staticEmail" class="col-sm-3 col-form-label" >Upload File</label>
<input type="file" name="file" accept="image/*,.doc,.docx,.xlsx,.pdf" class="form-control" required>
   </form>




      </div>

  



      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Submit</button>
          
      </div>
    </div>
  </div>
</div>
<div class="container">

 
  
<table id="datatable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%"> 
        <thead>  
           <tr >
            <th>Child ID</th>
            
    <th >Parent Description</th>
    <th >Accessible to</th>
    <th >File Name</th>
    <th >Child Description</th>
<!--     <th >Date Created</th>
    <th >Last Updated</th> -->
    <th  >Action</th>

  </tr>
</thead>

  @if (is_array($participant) || is_object($participant))

@foreach($participant as $key => $data)
  <tr  >

    <td>{{$data->id}}</td>
    <td>{{$data->description}}</td>
    <td>{{$data->access_to}}</td>
    <td>{{$data->filename}}</a>
     </td>
     <td>{{$data->a_desc}}</td>

  <span>  <td>  
   <!--  <a href="#" class="btn btn-success edit" title="Edit">
 <i class="fa fa-edit"></i>
</a>   -->

<a href="{{ route('downloadfiles', $data->id) }}" style="border-radius: 50%;" class="btn btn-primary" title="Download">
   <i class="fa fa-download"></i>
</a></td></span>    
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

  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header" style="background-color:#43A6C6;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" >File Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<input type="text" name="file_id" id="file_id" value="{{ Auth::user()->id }}" hidden>
<div class="form-floating mt-2">
 <input class="form-control form-control-sm" type="text" name="parent" id="parent" aria-label=".form-control-sm example" readonly>
        <label for="staticEmail" class="col-sm-3 col-form-label">Parent Name</label>
</div>      
<div class="form-floating mt-2">
       <input  class="form-control form-control-sm" type="text" name="project_name"  id="project_name" aria-label=".form-control-sm example" readonly>  
                <label for="filename" >File Name</label>
</div>
     <div class="form-floating mt-2">
<textarea name="description" id="description" class="form-control form-control-sm" aria-label=".form-control-sm example" readonly> </textarea>
        <label for="staticEmail"  class="col-sm-3 col-form-label">Description</label>
        
</div>
        

<input type="text" name="created_by" value="{{ Auth::user()->name }}" hidden>
<br>

  
  


      </div>
  

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
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
        Dropzone.options.imageUpload = {
            maxFilesize         :       1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.docx,.xslx"
        };

</script>
 <script type="text/javascript">
        Dropzone.options.dropzone =
        {
            maxFilesize: 12,
            resizeQuality: 1.0,
            acceptedFiles: ".jpeg,.jpg,.png,.docx",
            addRemoveLinks: true,
            timeout: 60000,
            removedfile: function(file) 
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{ url("files/destroy") }}',
                    data: {filename: name},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            success: function (file, response) {
                console.log(response);
            },
            error: function (file, response) {
                return false;
            }
        };
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
<script>
        var dropzone = new Dropzone('#file-upload', {
            previewTemplate: document.querySelector('#preview-template').innerHTML,
            parallelUploads: 3,
            thumbnailHeight: 150,
            thumbnailWidth: 150,
            maxFilesize: 5,
            filesizeBase: 1500,
            thumbnail: function (file, dataUrl) {
                if (file.previewElement) {
                    file.previewElement.classList.remove("dz-file-preview");
                    var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                    for (var i = 0; i < images.length; i++) {
                        var thumbnailElement = images[i];
                        thumbnailElement.alt = file.name;
                        thumbnailElement.src = dataUrl;
                    }
                    setTimeout(function () {
                        file.previewElement.classList.add("dz-image-preview");
                    }, 1);
                }
            }
        });
        
        var minSteps = 6,
            maxSteps = 60,
            timeBetweenSteps = 100,
            bytesPerStep = 100000;
        dropzone.uploadFiles = function (files) {
            var self = this;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));
                for (var step = 0; step < totalSteps; step++) {
                    var duration = timeBetweenSteps * (step + 1);
                    setTimeout(function (file, totalSteps, step) {
                        return function () {
                            file.upload = {
                                progress: 100 * (step + 1) / totalSteps,
                                total: file.size,
                                bytesSent: (step + 1) * file.size / totalSteps
                            };
                            self.emit('uploadprogress', file, file.upload.progress, file.upload
                                .bytesSent);
                            if (file.upload.progress == 100) {
                                file.status = Dropzone.SUCCESS;
                                self.emit("success", file, 'success', null);
                                self.emit("complete", file);
                                self.processQueue();
                            }
                        };
                    }(file, totalSteps, step), duration);
                }
            }
            dropzone.on("complete", function(file) {
  dropzone.removeFile(file);
});
        }
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

      $('#file_id').val(data[0]);
      $('#parent').val(data[1]);
      $('#access_to').val(data[2]);
      $('#project_name').val(data[3]);
      $('#description').val(data[4]);
      $('#created_by').val(data[6]);

      // $('#edit-form').attr('action','/edit-file.update/'+data[0]);
      $('#EditStaticBackdrop').modal('show');

    });
  });
</script>
@endsection
