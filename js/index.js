$(document).ready(function(){
var hr=new Date().getHours();	
var mn=new Date().getMinutes();
//alert('hi');
var time=(parseInt(hr)*60)+parseInt(mn);
alert(parseInt(hr)+" "+parseInt(hr)*60+" "+parseInt(mn)+" "+time);
if(time<1100)
{
	//$('#rep_not_sub').html('');
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
{//alert("rep_data");
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
	
	//alert(inte);
//setInterval( alert('interval:'+inte), inte*1000);
//setTimeout( alert('interval:'+inte), inte*1000);
var t=window.setTimeout(function(){rep_data()},inte*1000);
}