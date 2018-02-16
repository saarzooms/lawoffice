$(document).ready(function(){
var hr=new Date().getHours();	
var mn=new Date().getMinutes();
//$('#rep_not_sub').html('');
var time=(parseInt(hr)*60)+parseInt(mn);
//alert(parseInt(hr)+" "+parseInt(hr)*60+" "+parseInt(mn)+" "+time);
if(time<1080)
{
	//alert('hi');
	$('#rep_not_sub').show();
	myFunction(hr,mn);
}	
else
{
	$('#rep_not_sub').show();
	rep_data();
}


});

function rep_data()
{
	$.ajax({
			
			type:"post",
			url:"ajax/index_data.php",
			data:{'id':'id'},
			success:function(data)
			{
				//alert(data);
				$('#not_sub_rep').html(data);
				$('#rep_not_sub').show();
					//alert(data);
				
			}
		});
}

function myFunction(hrs,min) 
{
	var h=parseInt(hrs);
	var m=parseInt(min);
	var inte=((18*60)-(h*60+m))*60;
	
	//alert(inte*1000);
setInterval(rep_data(), inte*1000);
}