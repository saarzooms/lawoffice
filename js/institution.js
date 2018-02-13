$(document).ready(function(){
load_table();
	//insert into staff_master
	$(document).on("submit","#institution_form",function(e){
		e.preventDefault();
		var name=document.getElementById('name').value;
		var number=document.getElementById('number').value;
		var note=document.getElementById('note').value;
		
		$.ajax({
			
			type:"post",
			url:"ajax/institution_data.php",
			data:{'name':name,'number':number,'note':note},
			success:function(data)
			{
					//alert(data);
				$('#msg').fadeIn('slow',function(){
				$('#msg').html(data);
				$('#msg').delay(1000).fadeOut();
				})		
				//$().toastmessage('showSuccessToast',data);
				clear_form();
				load_table();
			}
		});
		
	});
	//edit staff data
	$(document).on("click","#btn_view",function(e){
		e.preventDefault();
		var edit_id=$(this).attr('value');
		$.ajax({
			
				type:"post",
				url:"ajax/institution_data.php",
				data:{'edit_id':edit_id},
				success:function(data)
				{
					//alert(data);
					var arr=eval(data);
					
						
					$("#name").val(arr[0]);
					$("#number").val(arr[1]);
					$("#note").val(arr[2]);
					
					$("#btn_update").val(arr[3]);		
				
					$("#btn_update").removeAttr('disabled');
					$("#btn_insert").attr('disabled','disabled');
				}
			});
		
	});
	//update into staff_master
	$(document).on("click","#btn_update",function(e){
		e.preventDefault();
		
		var id=document.getElementById('btn_update').value;
			
		if(id!='0')
		{
			var name=document.getElementById('name').value;
			var number=document.getElementById('number').value;
			var note=document.getElementById('note').value;	
			//alert(dept);
			$.ajax({
			
			type:"post",
			url:"ajax/institution_data.php",
			data:{'update_id1':id,'name1':name,'number1':number,'note1':note},
			success:function(data)
			{
					//alert(data);
				$('#msg').fadeIn('slow',function(){
				$('#msg').html(data);
				$('#msg').delay(1000).fadeOut();
				})	
				//$().toastmessage('showSuccessToast',data);
				clear_form();
				load_table();
				$("#btn_update").val('0');
				$("#btn_insert").removeAttr('disabled');
				$("#btn_update").attr('disabled','disabled');	
			}
		});	
		}			
							
							//$("#update_party").val(party_edit_id);
		
		
	});
	//delete data from staff_master
	$(document).on("click","#btn_delete",function(e){
		e.preventDefault();
		if(confirm('Are you sure to delete it?'))
		{
			var del_id = $(this).attr('value');
			//alert(del_id);
			$.ajax({
			
				type:"post",
				url:"ajax/institution_data.php",
				data:{'del_id':del_id},
				success:function(data)
				{
					load_table();
					$('#msg').fadeIn('slow',function(){
					$('#msg').html(data);
					$('#msg').delay(1000).fadeOut();
				})	
					//$().toastmessage('showSuccessToast',data);
				}
			});
		}
	});	
});
function clear_form()
{
	$('#name').val('');
	$('#number').val('');
	$('#note').val('');
}
function load_table()
{
	var dl='all';
		$.ajax({ 
				type: "POST",
				url:"ajax/institution_data.php",
				data:{'dl':dl},
				success: function(data)
				{
					//alert("gsdfgpjn");
					$("#t_body").html(data);	
					$('#example').DataTable({scrollX: true});
	
					
				}
		});
}