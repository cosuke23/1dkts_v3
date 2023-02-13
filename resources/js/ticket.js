 function ticket(ticket_id){
  var $ticket=ticket_id;
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
      $('#assign_to').val(data[1]);
      $('#ticket_title').val(data[2]);
      $('#project_name').val(data[3]);
      $('#concern').val(data[4]);
      $('#status').val(data[5]);
      $('#created_by').val(data[6]);
      $('#created_at').val(data[7]);
      $('#comment').val(data[9]);
      $('#nameofproj').text((data[3]));
      // $('#edit-form').attr('action','/edit-file.update/'+data[0]);
      $('#EditStaticBackdrop').modal('show');
      // $name=document.getElementById("project_name");
     $name= document.getElementById('assign_to').value;
    
    });
  });
}