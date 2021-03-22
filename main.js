$(document).ready(function()
{   cat();
	product();
	test();
	search();
	signup();
	login();
	cart();
	order();
	check();
	see();
	clear();
	change();
	option1();
	option2();
	option3();
	
	function cat()
	{
		$.ajax(
		{
			url  :"action.php",
			type :"POST",
			data  :  {category:1},
			success : function(data)
			{
				$("#get_category").html(data);
			}
		});
	}
	

});
function product()
	{
		$.ajax(
		{
			url  :"action.php",
			type :"POST",
			data  :  {product:1},
			success : function(data)
			{
				$("#get_product").html(data);
			}
		});
	}
function test()
{
	$("body").delegate(".category","click",function(event){
		event.preventDefault();
		var cid=$(this).attr('cid');
		$.ajax(
		{
			url  :"action.php",
			type :"POST",
			data  :  {get_selected_product:1,cat_id:cid},
			success : function(data)
			{
				$("#get_product").html(data);
			}
		});

	})
}
function search()
{
	$("#search").click(function()
{
 var key=$("#keys").val();
 alert(key);
 if(key!="")
 {  
 	$.ajax(
		{
			url  :"action.php",
			type :"POST",
			data  :  {search:1, name:key},
			success : function(data)
			{
				$("#get_product").html(data);
			}
		});

 }
});
}
function signup()
{
	$("#sign").click(function(event)
	{
		event.preventDefault();
	
		$.ajax(
		{
			url  :"register.php",
			type :"POST",
			data  :  $("form").serialize(),
			success : function(data)
			{
				
				
				$("#sign_up_msg").html(data);
			}
		});

	});
}
function login()
{
	$("#login").click(function(event)
	{
		event.preventDefault();
		var user=$("#username").val();
		var pass=$("#password").val();
		
	
		$.ajax(
		{
			url  : "login.php",
			type : "POST",
			data  :  { userlogin:1, user_name:user, user_pass:pass},
			success : function(data)
			{
				if(data=="success")
				{
					window.location.href="profile.php";
				}
				
				else
					{
						alert(data);
					}
				
			}
		});

	});
	
}
function cart()
{
	$("body").delegate("#p_cart","click",function(event)
	{
     event.preventDefault();
     var p_id=$(this).attr('pid');
     $.ajax(
		{
			url  :"action.php",
			type :"POST",
			data  :  {addProduct:1, pro_id:p_id},
			success : function(data)
			{
				$("#product_msg").html(data);
			}
		});
    
	});
}
function order()
{
	$("#cart_container").click(function(event)
	{
		event.preventDefault();
		
		  $.ajax(
		{
			url  :"action.php",
			type :"POST",
			data  :  {get_cart:1},
			success : function(data)
			{
				$("#cart_product").html(data);
			}
		});
		
	
		

	});
	
}

function check()
{ 
	$.ajax({
			url  : "action.php",
			type : "POST",
			data  :  {check:1},
			success : function(data)
			{
				$("#check_out").html(data);
		
			}
		});
}

function see()
{
	$("body").delegate(".quantity","keyup",function(event){
		event.preventDefault();
		var pid=$(this).attr('pid');
		
		var qty=$("#quantity-"+pid).val();
		var price=$("#price-"+pid).val();
		var total=qty*price;
		$("#total-"+pid).val(total);

	})
}

function clear()
{
	$("body").delegate(".remove","click",function(event){
		event.preventDefault();
		var r_id=$(this).attr('remove_id');
		$.ajax({
         url  :"action.php",
         type : "POST",
         data : { removeFromCart:1, removeId:r_id},
         success :function(data)
         {
         	$("#delete_msg").html(data);

         }
		});
		

	});
}
function change()
{
	$("body").delegate(".update","click",function(event){
		event.preventDefault();
		var pid=$(this).attr('update_id');
        var qty=$("#quantity-"+pid).val();
		var pri=$("#price-"+pid).val();
		var tot=$("#total-"+pid).val();
		$.ajax({
         url  :"action.php",
         type : "POST",
         data : { updateCart:1, updateId:pid,quantity:qty,price:pri,total:tot},
         success :function(data)
         {
         	$("#delete_msg").html(data);

         }
		});
		
		
		

	});
}
function option1()
{
	$("body").delegate(".total_amount","click",function(event){
		event.preventDefault();
		
		$.ajax({
         url  :"user_option.php",
         type : "POST",
         data : { opt1:1},
         success :function(data)
         {
         $("#user_msg").html(data);

         }
		});
		

	});
}
function option2()
{
	$("body").delegate(".total_balance","click",function(event){
		event.preventDefault();
		
		$.ajax({
         url  :"user_option.php",
         type : "POST",
         data : { opt2:1},
         success :function(data)
         {
        alert(data);

         }
		});
		

	});
}
function option3()
{
	$("body").delegate(".order_now","click",function(event){
		event.preventDefault();
		
		$.ajax({
         url  :"user_option.php",
         type : "POST",
         data : { opt3:1},
         success :function(data)
         {
        alert(data);

         }
		});
		

	});
}
	