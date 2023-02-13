@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header" style="background-color:#43A6C6;font-family:Bold;font-size:20px;">{{ __('Ticket History') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                    @endif
                    <!-- {{ URL::previous() }} -->
    <a href="/ticket">  <button type="button" class="btn btn-primary" data-bs-toggle="modal" >
   <i class="fa fa-arrow-left">  Return</i>
</button></a>
<br>
 <br>     

<!-- Modal add file -->

<div class="container">

 
  
<table id="datatable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%"> 
        <thead>  
           <tr >
            <th>Action By</th>
            
    <th >Action Taken</th>
    <th >Comment</th>
    <th >Accessible to</th>
    <th >Date Updated</th>
<!--     <th >Date Created</th>
    <th >Last Updated</th> -->
  

  </tr>
</thead>

  @if (is_array($participant) || is_object($participant))

@foreach($participant as $key => $data)
  <tr  >

    <td>{{$data->action_by}}</td>
    <td>{{$data->action_taken}}</td>
    <td>{{$data->comment}}</td>
    <td>{{$data->accessible_to}}</a>
     </td>
     <td>{{ \Carbon\Carbon::parse($data->updated_at)->format('m-d-Y h:i:a')}}</td>

   
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
     $(document).ready(function (){
    var table=$('#datatable').DataTable();

    table.on('click','.edit',function(){

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
      $('#description').val(data[5]);
      $('#created_by').val(data[6]);

      // $('#edit-form').attr('action','/edit-file.update/'+data[0]);
      $('#EditStaticBackdrop').modal('show');

    });
  });
</script>
@endsection
