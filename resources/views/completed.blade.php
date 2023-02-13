@extends('layouts.app')
@section('content')
@include('sweetalert::alert')
<div class="container" >
    <div class="row justify-content-center" >
        <div class="col-md-40" >
            <div class="card">

                            <div class="card-header" style="background-color:#3C9ACD;font-family:Bold;font-size:20px;">{{ __('CLOSED TICKETS') }}</div>

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

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- <input type="text" id="myInput" style="width:300px;height:40px;" onkeyup="myFunction()" placeholder="Search for uploaders name.."> -->
<!-- <input id='myInput' onkeyup='searchTable()' type='text'> -->
<!-- Button trigger modal -->

<form>
<div class="modal" tabindex="-1" role="dialog" id="Ticket_modal">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#3C9ACD;">
        <h5 class="modal-title"style="color:white;font-family:Bold;">View Ticket File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span onclick="myFunction_close()"
      class="w3-button w3-display-topright">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="outerDiv2">
          <div class="rightDiv2">
      <div class="leftDiv3">
           <div class="form-floating">
            <input class="form-control form-control-sm" type="text" style="font-size:15px;" name="frame_no"  id="frame_no" aria-label=".form-control-sm example" placeholder="Ticket Name" readonly>
            <label for="no" class="col-sm-8 col-form-label" style="font-family:Bold;">Ticket No.</label>
        </div>
        </div>
         <div class="rightDiv3">
           <div class="form-floating mb-2   ">
            <input class="form-control form-control-sm" type="text" name="frame_ticket_title" style="font-size:15px;" id="frame_ticket_title" aria-label=".form-control-sm example" placeholder="Ticket Name" readonly>
            <label for="frame_ticket_title" class="col-sm-8 col-form-label" style="font-family:Bold;">Ticket Name</label>
        </div>
        </div>
        <div class="centerdiv">
            <div class="form-floating mt-2">
 <textarea name="frame_comment"  id="frame_comment" class="form-control form-control-sm" placeholder="Comment" style="height:100px;font-size:15px;" aria-label=".form-control-sm example" readonly> </textarea>
                  <label for="frame_comment" style="font-family:Bold;">Comment:</label>
</div>
</div>
        </div>
      <div class="leftDiv2">
             <iframe src="{{ url('public/images/') }}" id="iframe" style="width: 100%; height: 500px;" ></iframe>
             <!-- <iframe src="{{ url('public/images/test.jpg') }}"  style="width: 100%; height: 500px;" ></iframe> -->
             <!-- <iframe src="https://docs.google.com/viewer?url={{ url('storage/images/landscape.docx') }}&embedded=true" frameborder='0'></iframe> -->

             <!-- <img src="{{ url('storage/images/') }}" style="width: 100%; height: 500px;" > -->
            </div>
        </div>
      </div>
      <div class="modal-footer" style="background-color:#3C9ACD;">
    <p style="color:white;">© One Document Corporation</p>
      </div>
    </div>
  </div>
</div>
</form>
<!-- Modal -->


 <!-- dependent dropdown -->
 <span style="float:right;font-family:Bold;">
<input type="text" name="" id="myInputTextField"  class="form-control form-control-sm" placeholder="Search">
  </span> 


<table id="datatable" class="table table-striped table-bordered table-responsive table-hover" >

        <thead>
           <tr >
    <th>Ticket No.</th>
    <!-- <th>Uploader</th> -->
    <th>Assigned To</th>
    <th>Ticket Title</th>
    <th>Project Name</th>
    <th>Description</th>
    <th>Status</th>
    <th>Created By</th>
    <th>Date Created</th>
    <th>Last Updated</th>
    <th hidden>comment</th>
  </thead>
  </tr>
  @if (is_array($participant) || is_object($participant))

@foreach($participant as $key => $data)
  <tr >
    <td style="width:160px;">{{$data->no}}</td>
    <!-- <td>{{$data->created_by}}</td> -->
    <td>{{$data->user_name}}</td>
    <td>{{$data->ticket_title}}</td>
    <td>{{$data->category}}</td>
    <td>{{$data->concern}}</td>
    <td>{{$data->status}}</td>
    <td>{{$data->created_by}}</td>
    <td>{{ \Carbon\Carbon::parse($data->created_at)->format('m-d-Y h:i:a')}}</td>
    <td>{{ \Carbon\Carbon::parse($data->updated_at)->format('m-d-Y h:i:a')}}</td>
     <td hidden>{{$data->comment}}</td>
    


</center>

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

 <form action="/edit-ticket" method="POST" href="" id="edit-ticket" enctype="multipart/form-data">
          {{ csrf_field() }}
<div class="modal fade" id="EditStaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#43A6C6;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" style="font-family:Bold;font-size:25px;">Ticket Information and History</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
          <div class="outerDiv2">
            <div class="leftDiv2">
           <center><h1 style="background-color:DeepSkyBlue;font-family:Bold;font-size:25px;" >Ticket History</h1></center>
        <div class="leftDiv3">
           <div class="form-floating">
            <input class="form-control form-control-sm" type="text" style="font-family:Bold;font-size:25px;" name="no"  id="no" aria-label=".form-control-sm example" placeholder="Ticket Name" readonly>
            <label for="no" class="col-sm-8 col-form-label">Ticket No</label>
        </div>
        </div>
         <div class="rightDiv3">
           <div class="form-floating mb-2   ">
            <input class="form-control form-control-sm" type="text" name="ticket_title" style="font-family:Bold;font-size:20px;" id="ticket_title" aria-label=".form-control-sm example" placeholder="Ticket Name" readonly>
            <label for="ticket_title" class="col-sm-8 col-form-label">Ticket Name</label>
        </div>
        </div>
        <div class="ex3">
                <table id="exampleids" class="table table-striped table-bordered table-responsive table-hover" >

        <thead>
           <tr >
      <th style="font-family:Bold;font-size:15px;text-align: center;">Action By</th>
            
    <th style="font-family:Bold;font-size:15px;text-align: center;">Action Taken</th>
    <th style="font-family:Bold;font-size:15px;text-align: center;width:50%;" >Comment</th>
    <th style="font-family:Bold;font-size:15px;text-align: center;">Accessible to</th>
    <th style="font-family:Bold;font-size:15px;text-align: center;">Date Updated</th>
    <th style="font-family:Bold;font-size:15px;text-align: center;">File</th>
  </thead>
  </tr>

<tbody id="exampleid">
  <!--   <tr>
        <td>1</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
    </tr>
       <tr>
        <td> USER 2nd </td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
    </tr> -->
                        </tbody>

<!-- Modal -->

      </div>
    </div>
  </div>
</div>
</td>
  </tr>
</table>
</div>
            </div>
    <div class="rightDiv2">
         <center><h1 style="background-color:DeepSkyBlue;font-family:Bold;font-size:25px;">Ticket Information</h1></center>

        <input class="form-control form-control-sm" type="text" name="editor"  id="editor" value="{{ Auth::user()->name }}" aria-label=".form-control-sm example"hidden>
        

        <div class="form-floating mt-2">
        <input class="form-control form-control-sm" type="text" placeholder="a" name="created_by"  id="created_by" aria-label=".form-control-sm example"readonly>
                <label for="staticEmail" class="col-sm-8 col-form-label">Ticket Created By</label>
        </div>
    <div class="rightDiv2">
        <div class="form-floating mt-2">
<input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="b" value="{{ Auth::user()->role }}"  readonly>
<label for="exampleDataList" class="form-label">Company Role</label>        
        </div>
    </div>
    <div class="leftDiv2">
        <div class="form-floating mt-2">
        <input class="form-control form-control-sm" type="text" name="project_name"  id="project_name" aria-label=".form-control-sm example"readonly>
<label for="staticEmail" >Project Name</label>
        </div>
    </div>
    <div class="centerdiv">
                <div class="form-floating mt-2">
         <input type="text" name="assign_to" id="assign_to" placeholder="Forward to:" class="form-control form-control-sm" id="floatingSelect" aria-label="Floating label select example" readonly>
 
 <label for="floatingSelect" class="col-sm-8 col-form-label">Forward to:</label>
 </div>  
 </div>

<!-- <input class="form-control" list="datalistOptions" name="pre_status" id="status"  hidden> -->
      <div class="centerdiv">
            <div class="form-floating mt-2">
                <textarea name="description"  id="description" class="form-control form-control-sm" aria-label=".form-control-sm example" placeholder="Description" readonly> </textarea>
                <label for="exampleDataList" class="form-label">Description</label>
            </div>
     </div>

<div class="centerdiv">
            <div class="form-floating mt-2">
 <textarea name="comment"  id="comment" class="form-control form-control-sm" placeholder="Comment" aria-label=".form-control-sm example" readonly> </textarea>
                  <label for="exampleDataList" >Comment</label>
</div>
</div>
<div class="centerdiv">


              <div class="form-floating mt-2">
  <input type="text" placeholder="Choose status" name="status" id="status" class="form-select" id="floatingSelect" aria-label="Floating label select example" readonly>
    
  <label for="floatingSelect" class="form-label">Ticket Status</label>
  </div>  
</div>
</div>
</div>


      <div class="modal-footer">
            </form>
            </div>



</div>

  <!-- /.modal -->


            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script> 
<script type="text/javascript">
    oTable = $('#datatable').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
$('#myInputTextField').keyup(function(){
      oTable.search($(this).val()).draw() ;
})
</script>
<script>
function myFunction_close() {
  var frame1=document.getElementById("iframe").value;
  var frame2=document.getElementById("frame_ticket_title").value;
    // alert(frame);
  document.getElementById('Ticket_modal').style.display='none';
    window.history.go(-1);
  setTimeout(() => {
    location.reload();
  }, 0);
}
</script>
<!-- <script>
    $('#aly').click(function() {
        alert('hi');
    $('#modalTicket').modal('hide');
});
</script> -->
<script type="text/javascript">

    var select = document.getElementById('tkt_title');
select.onchange = function myFunction(){
    this.form.submit();
};
</script>
<script type="text/javascript">
    var select = document.getElementById('category');
select.onchange = function myFunction2(){
    this.form.submit();
};
</script>

<script type="text/javascript">
var oldSel;
$('input[type="file"]').on('change', function() {
    if ($(this).val()) oldSel = $(this).clone();
    else $(this).replaceWith(oldSel);
});

</script>
<script >
    function myFunction1() {
  var x = document.getElementById("formFileSm").files[0].name;

// alert(x);

$.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    }),
        $.ajax({
            url: "/check_ticket",
            method: "GET",
            data:{"file":x,},
            success: function (response) {
         // swal("Succes!", "Url Valid!", "success"); 
         if(response.key==1){

  swal("File Exist", "This file is already saved", "error");  
document.getElementById("Save").disabled = true;
document.getElementById("Save").style.backgroundColor = "gray";
            // alert("FIle Exist");
         }else{

  document.getElementById("Save").disabled = false;
  document.getElementById("Save").style.backgroundColor = "Blue";
         }
            },
        });

}

</script>

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

      $('#no').val(data[0]);
      $('#assign_to').val(data[1]);
      $('#ticket_title').val(data[2]);
      $('#project_name').val(data[3]);
      $('#description').val(data[4]);
      $('#status').val(data[5]);
      $('#created_by').val(data[6]);
      $('#created_at').val(data[7]);
      $('#comment').val(data[9]);
      $('#ticket_no').text((data[0]));
      // $('#edit-form').attr('action','/edit-file.update/'+data[0]);
      $('#EditStaticBackdrop').modal('show');
      // $name=document.getElementById("project_name");

  var ticket= document.getElementById('no').value;
     
     var x=1;
   
     // document.getElementById('nameofproj').value=$name;
 
 // alert($ticket);
      $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    }),
        $.ajax({
            url: "/get_ticket",
            method: "GET",
            data:{"file":ticket,},
            success: function (response) {
  html = "";
            html += '<tr>';
            $.each(response.data, function( index, value ) {
                // alert(value.re_upload);
               
$('#exampleid').append("<tr ondblclick='myFunction_test("+value.id+")'>\
                                        <td class='action_by' style='text-align: justify;'>"+value.action_by +"</td>\
                                        <td style='text-align: justify;'>"+value.action_taken +"</td>\
                                        <td style='text-align: justify;'>"+value.comment+"</td>\
                                        <td style='text-align: justify;'> "+value.accessible_to+"</td>\
                                        <td style='text-align: justify;'>"+value.updated_at+"</td> \
                                        <td style='text-align: justify;'>"+value.re_file+"</td> \
                                        </tr>");

           
            });
          html += '</tr>';
            $('#speakerResponse').empty('').append(html);
            console.log(html);
   
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
        
            },
        });
    

    // alert(this.rowIndex);
});
});
$('#EditStaticBackdrop').on('hidden.bs.modal', function () {
$("#exampleid").empty();
})
 </script>
 <script type="text/javascript">
        function myFunction_test($fetch){
    // var table = $('#exampleids').DataTable();
    // alert($fetch);

       $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    }),
        $.ajax({
            url: "/get_form",
            method: "GET",
            data:{"file":$fetch,},
            success: function (response) {

            console.log(response.data);
            $('#frame_no').val(response.data[0]['ticket_no']);
            $('#frame_ticket_title').val(response.data[0]['ticket_name']);
            $('#frame_comment').val(response.data[0]['comment']);
            let ticket_src = $('#iframe').attr('src');
            ticket_src = ticket_src+('/'+response.data[0]['re_file']+'#toolbar=0');
            // ticket_src=ticket_src.append('?'+response.data[0]['re_file']);
            $('#iframe').attr('src', ticket_src);
            $('#EditStaticBackdrop').modal('hide');
        $('#EditStaticBackdrop').on('hidden.bs.modal', function () {
 
            $('#Ticket_modal').show();
        })
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log(xhr.status);
            console.log(thrownError);
        
            },
        });
       
    

}
   $('#Ticket_modal').on('hidden.bs.modal', function () {

$("#iframe").empty();
})
</script>
@endsection
