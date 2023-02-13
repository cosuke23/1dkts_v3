@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header" style="background-color:#43A6C6;font-family:Bold;font-size:20px;">{{ __('File Audit Trail Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



<!-- <input type="text" id="myInput" style="width:300px;height:40px;" onkeyup="myFunction()" placeholder="Search for uploaders name.."> -->
<!-- <input id='myInput' onkeyup='searchTable()' type='text'> -->
<!-- Button trigger modal -->

<br>
<br>  

<!-- Modal -->
   <span style="float:right;font-family:Bold;">
<input type="text" name="" id="myInputTextField"  class="form-control form-control-sm" placeholder="Search">
  </span>
<table id="datatable" class="table table-striped table-bordered table-responsive table-hover" > 
        <thead>  
           <tr >
  
    <th style="width:14.28%;">Uploader</th>
    <th style="width:14.28%;">Assigned To</th>
    <th style="width:14.28%;">File Name</th>
    <th style="width:14.28%;">Description</th>
    <th style="width:14.28%;">Action Taken</th>
    <th style="width:14.28%;">Date Updated</th>
  </thead>
  </tr>
  @if (is_array($participant) || is_object($participant))

@foreach($participant as $key => $data)
  <tr >

    <td>{{$data->action_by}}</td>
    <td>{{$data->accessible_to}}</td>
    <td>{{$data->project_name}}</td>
    <td>{{$data->description}}</td>
    <td>{{$data->action_taken}}</td>

    <td>{{ \Carbon\Carbon::parse($data->updated_at)->format('m-d-Y h:i:a')}}</td>

</tr>

<!-- Modal -->

</td>
  </tr>
 @endforeach
 @endif
</table>
     
    </div>
  </div>
</div>

<!-- Edit Form   -->

  





                </div>
            </div>
        </div>
    </div>
</div>

 
<!-- <script type="text/javascript">

  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      // URL.revokeObjectURL(output.src) // free memory
    }
  };
</script> -->
<script type="text/javascript">
  $('#iframe_id').load(function () {
    $(this).height($(this).contents().height());
    $(this).width($(this).contents().width());
});
</script>
<script type="text/javascript">
  $(document).ready(function (){
    var table=$('datatable').DataTable();

    table.on('click','.edit',function(){
      $tr=$(this).closest('tr');
      if($($tr).hasClass('child')){
        $tr=$tr.prev('.parent');
      }
      var data=table.row($tr).data();
      console.log(data);

      $('#concer').val(data[1]);

      $('#editform').attr('action','/edit-link'+data[0]);
      $('#viewtickettModal').modal('show');

    });
  });
</script>
<script type="text/javascript">
    oTable = $('#datatable').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
$('#myInputTextField').keyup(function(){
      oTable.search($(this).val()).draw() ;
})
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

      $('#no').val(data[0]);
      $('#created_by').val(data[1]);
      $('#user_name').val(data[2]);
      $('#ticket_name').val(data[3]);
      $('#concern').val(data[4]);
      $('#status').val(data[5]);
      $('#created_at').val(data[6]);

      // $('#edit-form').attr('action','/edit-file.update/'+data[0]);
      $('#EditStaticBackdrop').modal('show');

    });
  });
</script>
@endsection