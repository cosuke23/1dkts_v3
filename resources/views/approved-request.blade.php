@extends('layouts.app')
@section('content')

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



<!-- Modal -->


      </div>
    </div>
  </div>
</div>

<!-- Edit Form   -->

 

<table id="datatable" class="table table-striped table-bordered table-responsive table-hover" >
        <thead>
           <tr >
    <th>Requested No.</th>
    <th>Requested By</th>
    <th>Requested Date</th>
    <th hidden>File Name</th>
    <th>Description</th>
    <th>Department</th>
    <th hidden>Department Head</th>
    <th hidden>Project manager</th>
    <th hidden>Project one_doc</th>
    <th hidden>dept_head_status</th>
    <th hidden>proj_manager_status</th>
    <th hidden>one_doc_status</th>
    <th hidden>recieved_by</th>
    <th hidden>implemented_by</th>
     <th hidden>notes</th>
    <th hidden>requestor_approval</th>
    <th hidden>co_dept_head</th>
    <th hidden>co_proj_manager</th>
    <th hidden>requestor_approval_status</th>
    <th hidden>co_dept_status</th>
    <th hidden>co_proj_manager_status</th>
     <th hidden>no_hours</th>
      <th hidden>hourly_rate</th>
       <th hidden>cost</th>
           <th hidden>id</th>
               <th>Approval Status</th>
               <th>Acceptance Status</th>
    <th hidden>Date Created</th>
    <th>Last Updated</th>
    <th>Action</th>
  </thead>
  </tr>
  @if (is_array($participant) || is_object($participant))

@foreach($participant as $key => $data)
  <tr >
    <td>{{$data->request_no}}</td>
    <td>{{$data->requestor}}</td>
    <td>{{$data->request_date}}</td>
    <td hidden>{{$data->file_name}}</td>
    <td>{{$data->description}}</td>
    <td>{{$data->dept_requestor}}</td>
    <td hidden>{{$data->dept_head}}</td>
    <td hidden>{{$data->proj_manager}}</td>
    <td hidden>{{$data->one_doc}}</td>
    <td hidden>{{$data->dept_head_status}}</td>
    <td hidden>{{$data->proj_manager_status}}</td>
    <td hidden>{{$data->one_doc_status}}</td>
    <td hidden>{{$data->recieved_by}}</td>
    <td hidden>{{$data->implemented_by}}</td>
     <td hidden>{{$data->notes}}</td>
    <td hidden>{{$data->requestor_approval}}</td>
<td hidden>{{$data->co_dept_head}}</td>
<td hidden>{{$data->co_proj_manager}}</td>
<td hidden>{{$data->requestor_status}}</td>
<td hidden>{{$data->co_dept_status}}</td>
<td hidden>{{$data->co_proj_manager_status}}</td>

<td hidden>{{$data->no_hours}}</td>
<td hidden>{{$data->hourly_rate}}</td>
<td hidden>{{$data->cost}}</td>

<td hidden>{{$data->id}}</td>
  @if($data->dept_head_status=="Approved"&& $data->proj_manager_status=="Approved" && $data->one_doc_status="Approved")
    <td> Approved </td>
    @else
    <td> Pending </td>
    @endif
@if($data->requestor_status && $data->co_dept_status=="Approved" && $data->co_proj_manager_status=="Approved")
<td>Approved</td>
@else
<td>Pending</td>
@endif
    <td hidden>{{ \Carbon\Carbon::parse($data->created_at)->format('m-d-Y ')}}</td>
    <td>{{ \Carbon\Carbon::parse($data->updated_at)->format('m-d-Y ')}}</td>
    <span>  <td>  <a href="#" class="btn btn-success edit" title="Edit">
 <i class="fa fa-edit"> </i>
</a> <br> 
<!-- <a href="system_change/{{ $data->file_name }}" download="{{ $data->file_name }}" class="btn btn-primary" title="Download">
<a href="{{ route('downloadfile', $data->request_no) }}"  class="btn btn-primary"> 
   <i class="fa fa-download"> </i>
</a> -->
<a href="{{ route('SC_download', $data->id) }}" class="btn btn-primary" title="Download"> <i class="fa fa-download"> </i></a>
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



 

<div id="reportPrinting">
    <div class="row pt-50">
        <div class="col-sm-10 col-sm-offset-1">
   
        </div>
    </div>
</div>
<script type="text/javascript">
function hourlyCost() {
 var no_hours =  document.getElementById("no_hours").value;
 var hourly_rate =  document.getElementById("hourly_rate").value;
 var total_cost=no_hours*hourly_rate;
 var cost = document.getElementById("cost").value = total_cost;

}
var currencyInput = document.querySelector('input[type="currency"]')
var currency = 'PHP' // https://www.currency-iso.org/dam/downloads/lists/list_one.xml

 // format inital value
onBlur({target:currencyInput})

// bind event listeners
currencyInput.addEventListener('focus', onFocus)
currencyInput.addEventListener('blur', onBlur)


function localStringToNumber( s ){
  return Number(String(s).replace(/[^0-9.-]+/g,""))
}

function onFocus(e){
  var value = e.target.value;
  e.target.value = value ? localStringToNumber(value) : ''
}

function onBlur(e){
  var value = e.target.value

  var options = {
      maximumFractionDigits : 2,
      currency              : currency,
      style                 : "currency",
      currencyDisplay       : "symbol"
  }
  
  e.target.value = (value || value === 0) 
    ? localStringToNumber(value).toLocaleString(undefined, options)
    : ''
}
</script>
<script type="text/javascript">
    function printReport()
    {
        var prtContent = document.getElementById("reportPrinting");
        var WinPrint = window.open();
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
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


@endsection
  
   
