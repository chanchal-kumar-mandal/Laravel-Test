$(document).ready(function() {
	var date_input=$('input[name="dateOfJoinning"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
        format: 'dd-mm-yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
    })
});

function checkDelete(id){
    if(confirm('Are you sure you want to delete this record?')){
    	window.location.href = 'delete-user/'+id;
    }else{
    	return false;
    }
}