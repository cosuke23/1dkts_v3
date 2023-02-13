@extends('layouts.app')
@section('content')
<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header" style="background-color:#43A6C6;">{{ __('SYSTEM CHANGE / MODIFICATION  REQUEST FORM') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



<!-- <input type="text" id="myInput" style="width:300px;height:40px;" onkeyup="myFunction()" placeholder="Search for uploaders name.."> -->
<!-- <input id='myInput' onkeyup='searchTable()' type='text'> -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  upload CSV <i class="fa fa-ticket"></i>
</button>
<br>
<br>

<!-- Modal -->
<form action="" method="POST" href="" enctype="multipart/form-data">
                @csrf
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#43A6C6;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" >upload CSV</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="mb-3">
  <label for="formFileSm" class="form-label">Attachment</label>
  <input class="form-control form-control-sm" name="file"   id="formFileSm" onchange="loadFile(event)" type="file">

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
    <th>Project Name.</th>
    <th>Company Role</th>
    <th>Action</th>
  </thead>
  </tr>
  @if (is_array($participant) || is_object($participant))

@foreach($participant as $key => $data)
  <tr >
    <td>{{$data->company_code}}</td>
    <td>{{$data->company_role}}</td>
    <span>  <td>  <a href="#" class="btn btn-success edit">
 <i class="fa fa-edit"> Edit</i>
</a>
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
{{-- FUNCTION FOR DATES RESPONSIVENESS --}}
<script>
      $(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;
    $('#endDate').attr('max', maxDate);
    $('#startDate').attr('max', maxDate);
});

$("#startDate").click(function(){
    var dtToday = new Date();

var month = dtToday.getMonth() + 1;
var day = dtToday.getDate();
var year = dtToday.getFullYear();
if(month < 10)
    month = '0' + month.toString();
if(day < 10)
    day = '0' + day.toString();

var maxDate = year + '-' + month + '-' + day;

$('#endDate').attr('max', maxDate);
$('#startDate').attr('max', maxDate);
    });

    $("#endDate").click(function(){
    var dtToday = new Date();

var month = dtToday.getMonth() + 1;
var day = dtToday.getDate();
var year = dtToday.getFullYear();
if(month < 10)
    month = '0' + month.toString();
if(day < 10)
    day = '0' + day.toString();
    var x = document.getElementById("startDate").value;
var maxDate = year + '-' + month + '-' + day;
$('#endDate').attr('min',x );
$('#endDate').attr('max', maxDate);
$('#startDate').attr('max', maxDate);

    });

</script>
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
