@extends('layouts.app')
@section('content')
@include('sweetalert::alert')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
        <div class="card-header" style="background-color:#43A6C6;font-family:Bold;font-size:20px;"><center>{{ __('SYSTEM CHANGE / MODIFICATION  REQUEST FORM') }}</center></div>

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
<button type="button" class="custom-btn btn-12" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <span>Click!</span><span> Create Request <i class="fa fa-ticket"></i></span>
  
</button>
<br>
<br>  
<!-- Modal -->

<form action="" method="POST" href="" enctype="multipart/form-data">
                @csrf

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#43A6C6;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" >Create Request</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="outerDiv2">
    <div class="leftDiv2">
<center><h1 style="background-color:DeepSkyBlue;font-family:Bold;font-size:25px;">REQUEST INFORMATION</h1></center>
      <div class="leftDiv3">
      <div class="form-floating mt-2">
        <input class="form-control form-control-sm" placeholder="x" type="date" id="startDate" name="request_date"  aria-label=".form-control-sm example"required>
        <label for="startDate"  >Request date <span style="color:red;">*</span></label>
      </div>
    </div>
       <div class="rightDiv3">
      <div class="form-floating mt-2">
        <input class="form-control" type="text" placeholder="x" name="requested_by"  aria-label=".form-control-sm example" value="{{ Auth::user()->name }}" readonly>
        <label for="staticEmail" class="form-label">Requested By: </label>
      </div>
      </div>
      <div class="leftDiv3">
      <div class="form-floating mt-2">
        <input class="form-control form-control-sm" type="text" placeholder="b" name="dept_requestor" value="{{ Auth::user()->establishment }}" readonly>
        <label for="dept_requestor" class="form-label">Requestor Department:</label>
      </div>
      </div>

      <div class="rightDiv3">
       <div class="form-floating mt-2">
          <input class="form-control form-control-sm" placeholder="x" name="attach_file" accept="image/*,.doc,.docx,.xlsx,.pdf" accept="image/*"  id="formFileSm" onchange="loadFile(event)" type="file" required>
          <label for="formFileSm" class="form-label">Attachment <span style="color:red;">*</span></label>
        </div> 
      </div>
<div class="centerdiv">
 <div class="form-floating mt-2">
  <textarea class="form-control" placeholder="Leave a comment here" name="description" id="floatingTextarea2" style="height: 80px"></textarea>
  <label for="floatingTextarea2">Description:</label>
  </div>     
</div>

<input type="text" name="created_by" value="{{ Auth::user()->name }}" hidden>
<input type="text" name="role" value="{{ Auth::user()->role }}" hidden >
<input type="text" name="emp_id" value="{{ Auth::user()->id }}" hidden >
<input type="text" name="establishment" value="{{ Auth::user()->establishment }}" hidden >

<div class="centerdiv mt-2">        
<center><h2 style="background-color:DeepSkyBlue;font-family:Bold;font-size:25px;">CHANGE ORDER ACCEPTANCE:</h2></center>
</div>
<div>
<div id="outerDiv">
  <div class="leftDiv" > 
    <div class="form-floating mt-2">
       @foreach($employees as $key => $datas)
       <input type="text" name="requestor_approval" placeholder="x" class="form-control" value="{{$datas->name}}" readonly> 
       @endforeach
       <label style="font-family:Bold;" class="form-label">Requestor Approval<span style="color:red;">*</span></label>
    </div>

</div>
<div class="rightDiv">
    <div class="form-floating mt-2">
      <input type="text" name="requestor_status" class="form-control" placeholder="x" value="Pending" readonly>
      <label style="font-family:Bold;" class="form-label">Status:</label>
    </div>
</div>

  <div class="leftDiv" >
    <div class="form-floating mt-2">    
    <select name="co_dept_head" placeholder="x" class="form-select" id="floatingSelect" aria-label="Floating label select example" required>
  <option >----</option>
@foreach($department_approvals as $key => $datas)
    <option value="{{$datas->full_name}}">{{$datas->full_name}}</option>
@endforeach
  </select>
<label style="font-family:Bold;" class="form-label">Department Head <span style="color:red;">*</span></label>
    </div>
</div>
  <div class="rightDiv">
    <div class="form-floating mt-2">
  <input type="text" name="co_dept_status" class="form-select" id="floatingSelect" aria-label="Floating label select example" value="Pending" placeholder="x" readonly>
  <label style="font-family:Bold;" class="form-label">Status:</label>
    </div>
</div>


  <div class="leftDiv"> 
      <div class="form-floating mt-2">  
  <select name="co_proj_manager" class="form-select" id="floatingSelect" aria-label="Floating label select example" required>
  <option>----</option>
@foreach($project_managers as $key => $datas)
    <option value="{{$datas->full_name}}">{{$datas->full_name}}</option>
@endforeach
  </select>
 <label style="font-family:Bold;" class="form-label">Project Manager:<span style="color:red;">*</span></label>
</div>
</div>
<div class="rightDiv">
        <div class="form-floating mt-2">
  <input type="text" name="co_proj_manager_status" placeholder="x" class="form-control" value="Pending" readonly>
  <label  style="font-family:Bold;" class="form-label">Status:</label>
</div>
</div>
</div>
</div>
</br>
</div>

<div class="rightDiv2">
<center>
<h1 style="background-color:DeepSkyBlue;font-family:Bold;font-size:25px;">APPROVALS</h1></center>
<div id="outerDiv">

  <div class="leftDiv" >
    <div class="form-floating ">
      <select name="dept_head" class="form-select" id="dhfloatingSelect" aria-label="Floating label select example" required>
  <option >----</option>
@foreach($department_approvals as $key => $datas)
    <option  value="{{$datas->full_name}}">{{$datas->full_name}}</option>
@endforeach
 </select>
      <label for="dhfloatingSelect" style="font-family:Bold;">Department Head <span style="color:red;">*</span></label>
 
    </div>
</div>
  <div class="rightDiv">
    <div class="form-floating ">
        <input  type="text" name="dept_head_status" placeholder="x" class="form-control" readonly value="Pending"> 
  <label for="dept_head_status" style="font-family:Bold;" class="form-label">Status:</label>
</div>
</div>
  <div class="leftDiv" >
    <div class="form-floating ">
      <select name="project_manager" class="form-select" id="pmfloatingSelect" aria-label="Floating label select example" required>
   <option>----</option>
@foreach($project_managers as $key => $datas)
    <option style="font-family:Bold;" value="{{$datas->full_name}}">{{$datas->full_name}}</option>
@endforeach
  </select>
      <label for="pmfloatingSelect" style="font-family:Bold;" class="form-label">Project Manager<span style="color:red;">*</span></label>
 </div>   
</div>
 <div class="rightDiv">
    <div class="form-floating ">
  <input type="text" name="project_manager_status" placeholder="x"  class="form-control" readonly value="Pending">
  <label for="project_manager_status" style="font-family:Bold;" class="form-label">Status:</label>
</div>
</div>
  <div class="leftDiv" >
    <div class="form-floating ">
    <select name="one_docu" class="form-select" id="1dfloatingSelect" aria-label="Floating label select example" required>
    <option>----</option>
@foreach($company_approval as $key => $datas)
    <option style="font-family:Bold;" value="{{$datas->name}}">{{$datas->name}}</option>
@endforeach
  </select> 
    <label for="1dfloatingSelect" style="font-family:Bold;" class="form-label">1Document:<span style="color:red;">*</span></label>
</div>
</div>
 <div class="rightDiv">
    <div class="form-floating ">
  <input type="text" name="one_docu_status"   class="form-control" readonly value="Pending">
   <label for="one_docu_status" style="font-family:Bold;">Status:</label>
</div>
</div>
</div>  
 <div class="leftDiv">
    <div class="form-floating ">
   <input class="form-control form-control-sm" type="text" placeholder="x" name="recieved_by"  aria-label=".form-control-sm example" >     
   <label for="recieved_by" style="font-size:12px;" class="col-sm-9 col-form-label">Request Received By 
 </div>
</div>
 <div class="rightDiv">
    <div class="form-floating ">
        <input class="form-control form-control-sm" type="text" placeholder="x" name="implemented_by"  aria-label=".form-control-sm example" value="{{ Auth::user()->name }}" readonly>
        <label for="implemented_by" style="font-size:15px;" class="form-label">Request Implemented By</label>
</div>
</div>
<div class="centerdiv">
 <div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" name="notes" id="floatingTextarea2" style="height: 80px"></textarea>
  <label for="floatingTextarea2">Modification Notes:</label>
  </div>     
</div>
<input type="text" name="created_by" value="{{ Auth::user()->name }}" hidden>
<input type="text" name="role" value="{{ Auth::user()->role }}" hidden >
<input type="text" name="emp_id" value="{{ Auth::user()->id }}" hidden >
<input type="text" name="establishment" value="{{ Auth::user()->establishment }}" hidden >


    

     
<center><h2 style="font-family:Bold;font-size:25px;">CHANGE ORDER COSTING :</h2></center>



<div id="t_container">
 <div class="form-floating">
     <input class="form-control form-control-sm" type="number" placeholder="x" id="no_hours" name="no_hours" onchange="hourlyCost()"  aria-label=".form-control-sm example"required>
  <label style="font-size:15px;">No. of Hours:<span style="color:red;">*</span> </label>
</div>

 <div class="form-floating">

     <input class="form-control form-control-sm" type="number" placeholder="x" id="hourly_rate" name="hourly_rate" onchange="hourlyCost()" aria-label=".form-control-sm example" required>
  <label style="font-size:15px;">Hourly Rate:<span style="color:red;">*</span> </label>

</div>
<div class="form-floating">
   <input type='currency' class="form-control form-control-sm" id="cost" name="cost" placeholder="x"  readonly/>
   <label style="font-size:15px;">Hourly Rate:<span style="color:red;">*</span> </label>
</div>
</div>
  </div>
 </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Form   -->

    <span style="float:right;font-family:Bold;">
<input type="text" name="" id="myInputTextField"  class="form-control form-control-sm" placeholder="Search">
  </span>

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
    <th hidden>Last Updated</th>
    <th>Download</th>
  </thead>
  </tr>
  @if (is_array($participant) || is_object($participant))

@foreach($participant as $key => $data)
  <tr >
    <td>{{$data->request_no}}</td>
    <td>{{$data->requestor}}</td>
    <td>{{ \Carbon\Carbon::parse($data->request_date)->format('m-d-Y h:i:a ')}}</td>
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
  @if($data->dept_head_status=="Approved"&& $data->proj_manager_status=="Approved" && $data->one_doc_status=="Approved")
    <td> Approved </td>
    @else
    <td> Pending </td>
    @endif
@if($data->requestor_status=="Approved" && $data->co_dept_status=="Approved" && $data->co_proj_manager_status=="Approved" )
<td>Approved</td>
@else
<td>Pending</td>
@endif
    <td hidden>{{ \Carbon\Carbon::parse($data->created_at)->format('m-d-Y ')}}</td>
    <td hidden>{{ \Carbon\Carbon::parse($data->updated_at)->format('m-d-Y ')}}</td>
    <span>  <td> <center>
<!-- <a href="system_change/{{ $data->file_name }}" download="{{ $data->file_name }}" class="btn btn-primary" title="Download">
<a href="{{ route('downloadfile', $data->request_no) }}"  class="btn btn-primary"> 
   <i class="fa fa-download"> </i>
</a> -->
<a href="{{ route('SC_download', $data->id) }}" class="btn btn-primary" title="Download" style="border-radius: 50%;"> <i class="fa fa-download"> </i></a></center>
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

<form action="/edit-change" method="POST" href="" id="edit-change" enctype="multipart/form-data">
          {{ csrf_field() }}
<div class="modal fade" id="EditStaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#43A6C6;">
        <h1 class="modal-title fs-5" id="staticBackdropLabel" >Editing Request</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

     <div class="outerDiv2">
    <div class="leftDiv2">
<center><h1 style="background-color:DeepSkyBlue;font-family:Bold;font-size:25px;">REQUEST INFORMATION</h1></center>
<div class="leftDiv3">
<div class="form-floating mt-2">     
        <input class="form-control form-control-sm" type="text" name="no" id="no" aria-label=".form-control-sm example"hidden>
<input class="form-control" list="datalistOptions" name="request_date" id="request_date" readonly>
                <label for="exampleDataList" class="form-label">Request Date</label>
</div>
</div>
<div class="rightDiv3">
<div class="form-floating mt-2">
         <input class="form-control form-control-sm" type="text" name="id" placeholder="x" id="id" aria-label=".form-control-sm example"hidden>
          <input class="form-control form-control-sm" type="text" name="ticket_no"  id="ticket_no" aria-label=".form-control-sm example"readonly>
        <label for="staticEmail" class="col-sm-3 col-form-label">Ticket No</label>
</div>
        </div>

<div class="leftDiv3">
<div class="form-floating mt-2">  
<input class="form-control" list="datalistOptions" name="dept" id="dept" readonly>
                <label for="exampleDataList" class="form-label">Department Requestor:</label>
</div>
</div>
<div class="rightDiv3">
<div class="form-floating mt-2"> 
<input class="form-control" list="datalistOptions" name="requested_by" id="requested_by" readonly> 
                <label for="exampleDataList" class="form-label">Requested By:</label>
</div>
</div>
<div class="centerdiv mt-2"> 
<div class="form-floating mt-2"> 
<input class="form-control" list="datalistOptions" name="desc" id="desc" readonly>
<label for="exampleDataList" class="form-label">Description:</label>
</div>
</div>
<input class="form-control" list="datalistOptions" name="concern" id="concern"  hidden>
<input class="form-control" list="datalistOptions" name="pre_status" id="status"  hidden>
          <div class="mb-3">

</div>
<div class="centerdiv mt-2">        
<center><h2 style="background-color:DeepSkyBlue;font-family:Bold;font-size:25px;">CHANGE ORDER ACCEPTANCE:</h2></center>
</div>
<div id="outerDiv">

<div class="leftDiv" > 
<div class="form-floating mt-2">
  <input type="text" name="requestor_approval" id="requestor_approval" class="form-control" readonly>
    <label style="font-family:Bold;" class="form-label">Requestor Approval</label>
</div>
</div>
<div class="rightDiv">
<div class="form-floating mt-2">
     @if (Auth::user()->role=="Super Admin"||Auth::user()->role=="Admin")
  <select name="requestor_status"  class="form-select" id="requestor_status" aria-label="Floating label select example"  required>
    <option>----</option>
     <option value="Pending"> Pending</option>
   <option value="Approved"> Approved</option>
  <option value="Declined"> Declined</option>
   </select>
         @else
 <input type="text" name="requestor_status" id="requestor_status" class="form-control"  readonly>
 @endif
   <label  class="form-label" style="font-family:Bold;">Status:</label>
</div>
 </div>
<div class="leftDiv" > 
<div class="form-floating mt-2"> 
    <input type="text" name="co_dept_head" id="co_dept_head" class="form-control" readonly>
    <label style="font-family:Bold;" class="form-label">Department Head</label>
</div>
</div>
<div class="rightDiv">
<div class="form-floating mt-2"> 
   @if (Auth::user()->role=="Super Admin"||Auth::user()->role=="Admin")
  <select name="co_dept_status" class="form-select" id="co_dept_status" aria-label="Floating label select example" required>
    <option>----</option>
     <option value="Pending"> Pending</option>
   <option value="Approved"> Approved</option>
  <option value="Declined"> Declined</option>
   </select>
   @else
    <input type="text" name="co_dept_status" id="co_dept_status" class="form-control"  readonly>
    @endif
   <label class="form-label" style="font-family:Bold;">Status:</label>
</div>
</div>


<div class="leftDiv" > 
<div class="form-floating mt-2">
  <input type="text" name="co_proj_manager" id="co_proj_manager" class="form-control" readonly>
    <label style="font-family:Bold;" class="form-label">Project Manager</label>
</div>
</div>
<div class="rightDiv">
<div class="form-floating mt-2">
     @if (Auth::user()->role=="Super Admin"||Auth::user()->role=="Admin")
  <select name="co_proj_manager_status" class="form-select" id="co_proj_manager_status" aria-label="Floating label select example" required>
    <option>----</option>
     <option value="Pending"> Pending</option>
   <option value="Approved"> Approved</option>
  <option value="Declined"> Declined</option>
   </select>
      @else
    <input type="text" name="co_proj_manager_status" id="co_proj_manager_status" class="form-control"  readonly>
    @endif
  <label  class="form-label" style="font-family:Bold;">Status:</label>
</div>
</div>
</div>
</div>
<div class="rightDiv2">

<center>
<h1 style="background-color:DeepSkyBlue;font-family:Bold;font-size:25px;">APPROVALS</h1></center>
<div id="outerDiv">
  <div class="leftDiv" > 
  <div class="form-floating mt-2"> 
<input type="text" name="dept_head" id="dept_head" class="form-control" readonly>
    <label for="staticEmail" class="form-label" style="font-family:Bold;">Department Head </label>
<!-- <p>{{ $ldate = date('m-d-Y '); }}</p> -->
</div>
</div>
<div class="rightDiv">
<div class="form-floating mt-2">
@if (Auth::user()->role=="Super Admin"||Auth::user()->role=="Admin")
 <select name="dept_head_status" id="dept_head_status" class="form-select" aria-label="Floating label select example" required>
    <option>----</option>
     <option value="Pending"> Pending</option>
   <option value="Approved"> Approved</option>
  <option value="Declined"> Declined</option>
   </select>
   @else
 <input type="text" name="dept_head_status" id="dept_head_status" class="form-control"  readonly>


   @endif
  <label style="font-family:Bold;" class="form-label">Status:</label>
</div>
</div>
<div class="leftDiv">  
<div class="form-floating">
<input type="text" name="project_manager" id="proj_manager"   class="form-control" readonly>
<label for="proj_manager" class="form-label" style="font-family:Bold;">Project Manager</label>
</div>
</div>
<div class="rightDiv">
    <div class="form-floating"> 
  @if (Auth::user()->role=="Super Admin"||Auth::user()->role=="Admin")
    <select name="proj_manager_status" id="proj_manager_status" class="form-select" aria-label="Floating label select example" required>
    <option>----</option>
     <option value="Pending"> Pending</option>
   <option value="Approved"> Approved</option>
  <option value="Declined"> Declined</option>
   </select>
     @else
 <input type="text" name="proj_manager_status" id="proj_manager_status" class="form-control"  readonly>


   @endif
  <label  class="form-label" style="font-family:Bold;">Status:</label>
</div>
</div>

  <div class="leftDiv">    
<div class="form-floating">
  <input type="text" name="one_docu" id="one_doc" class="form-control" readonly>
    <label for="staticEmail" class="form-label" style="font-family:Bold;"> 1Document: </label>
</div>
</div>
<div class="rightDiv">    
<div class="form-floating">
     @if (Auth::user()->role=="Super Admin")
  <select name="one_doc_status" id="one_doc_status" class="form-select" aria-label="Floating label select example"  required>
    <option>----</option>
     <option value="Pending"> Pending</option>
   <option value="Approved"> Approved</option>
  <option value="Declined"> Declined</option>
   </select>
     @else
 <input type="text" name="one_doc_status" id="one_doc_status" class="form-control"  readonly>


   @endif
  <label for="staticEmail" style="font-family:Bold;" class="form-label">Status:</label>
</div>
</div>
</div>
<div class="centerdiv"> 
<div class="form-floating">
        <input class="form-control form-control-sm" type="text"  name="recieved_by" id="recieved_by"  aria-label=".form-control-sm example">
  <label for="staticEmail" class="col-sm-8 col-form-label">Modification Request Received By</label>
</div>


<div class="form-floating">
        <input class="form-control form-control-sm" type="text"  name="implemented_by" id="implemented_by" aria-label=".form-control-sm example"  readonly>
        <label for="staticEmail" class="form-label">Modification Request Implemented By</label>
</div>
</div>
<div class="centerdiv">  
<div class="form-floating">    
   
        <textarea name="notes" id="notes" class="form-control form-control-sm" aria-label=".form-control-sm example" required> 
     </textarea>  
      <label for="staticEmail" class="col-sm-5 col-form-label">Modification Notes:</label>
</div>

</div>
  

<center><h1 style="font-family:Bold;font-size:25px;">CHANGE ORDER COSTING:</h1></center>
<div id="t_container">
 <div class="form-floating">
     <input class="form-control form-control-sm" type="number" placeholder="x" id="hours" name="no_hours" onchange="hourlyCost()"  aria-label=".form-control-sm example"required>
  <label style="font-size:15px;">No. of Hours:<span style="color:red;">*</span> </label>
</div>

 <div class="form-floating">

     <input class="form-control form-control-sm" type="number" placeholder="x" id="rate" name="hourly_rate" onchange="hourlyCost()" aria-label=".form-control-sm example" required>
  <label style="font-size:15px;">Hourly Rate:<span style="color:red;">*</span> </label>

</div>
<div class="form-floating">
   <input type='currency' class="form-control form-control-sm" id="rate_cost" name="cost" placeholder="x"  readonly/>
   <label style="font-size:15px;">Hourly Rate:<span style="color:red;">*</span> </label>
</div>
</div>
</div>
</div>
      <div class="modal-footer">
<!--         <form>
    <input type="button" class="btn btn-primary" value="Print" onClick="printReport()">
</form> -->
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Request</button>
            </form>

<div id="reportPrinting">
    <div class="row pt-50">
        <div class="col-sm-10 col-sm-offset-1">
   
        </div>
    </div>
</div>


<script type="text/javascript">
    oTable = $('#datatable').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
$('#myInputTextField').keyup(function(){
      oTable.search($(this).val()).draw() ;
})
</script>
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
  $(function(){
$("table tr").dblclick(function(){
    var table=$('#datatable').DataTable();


      $tr=$(this).closest('tr');

      if($($tr).hasClass('child')){
        $tr=$tr.prev('.parent');
      }

      var data=table.row($tr).data();
      console.log(data);

      $('#ticket_no').val(data[0]);
      $('#requested_by').val(data[1]);
      $('#request_date').val(data[2]);
      $('#name').val(data[3]);
      $('#desc').val(data[4]);
      $('#dept').val(data[5]);
      $('#dept_head').val(data[6]);
      $('#proj_manager').val(data[7]);
      $('#one_doc').val(data[8]);
      $('#dept_head_status').val(data[9]);
      $('#proj_manager_status').val(data[10]);
      $('#one_doc_status').val(data[11]);
      $('#recieved_by').val(data[12]);
      $('#implemented_by').val(data[13]);
      $('#notes').val(data[14]);
      $('#requestor_approval').val(data[15]);
      $('#co_dept_head').val(data[16]);
      $('#co_proj_manager').val(data[17]);
      $('#requestor_status').val(data[18]);
      $('#co_dept_status').val(data[19]);
      $('#co_proj_manager_status').val(data[20]);
      $('#hours').val(data[21]);
      $('#rate').val(data[22]);
      $('#rate_cost').val(data[23]);
      $('#id').val(data[24]);
      // $('#edit-form').attr('action','/edit-file.update/'+data[0]);
      $('#EditStaticBackdrop').modal('show');

    });
  });
</script>
@endsection
  
   
