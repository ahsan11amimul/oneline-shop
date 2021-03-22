$(document).ready(function()
{ 
	userlist();
	productList();
	categoryList();
	test();
	test1();
	test2();
	updatePrice();
	updateAmount();
	deleteProduct();
	
    

});

function userlist()
{
	
		$.ajax(
		{
			url  :"admin_action.php",
			type :"POST",
			data  :  {user:1},
			success : function(data)
			{
				$("#user_list").html(data);
			}
		});
	
}
function productList()
	{
		$.ajax(
		{
			url  :"admin_action.php",
			type :"POST",
			data  :  {product:1},
			success : function(data)
			{
				$("#product_list").html(data);
			}
		});
	}
	function categoryList()
	{
		$.ajax(
		{
			url  :"admin_action.php",
			type :"POST",
			data  :  {category:1},
			success : function(data)
			{
				$("#category_list").html(data);
			}
		});
	}
	function test()
{
	$("body").delegate(".user2","click",function(event){
		event.preventDefault();
		var pid=$(this).attr('Pro_id');
		$.ajax(
		{
			url  :"admin_action.php",
			type :"POST",
			data  :  {get_selected_product:1,pro_id:pid},
			success : function(data)
			{
				$("#get_product").html(data);
			}
		});

	})
}
function test1()
{
	$("body").delegate(".user3","click",function(event){
		event.preventDefault();
		var pid=$(this).attr('Cat_id');
		$.ajax(
		{
			url  :"admin_action.php",
			type :"POST",
			data  :  {get_selected_category:1,pro_id:pid},
			success : function(data)
			{
				$("#get_product").html(data);
			}
		});

	})
}
function test2()
{
	$("body").delegate(".user1","click",function(event){
		event.preventDefault();
		var user_id=$(this).attr('User_id');
		$.ajax(
		{
			url  :"admin_action.php",
			type :"POST",
			data  :  {get_selected_users:1,user_i:user_id},
			success : function(data)
			{
				$("#get_user").html(data);
			}
		});

	})
}

function updatePrice()
{
	$("body").delegate("#update_Price","click",function(event)
	{
     event.preventDefault();
     var p_id=$(this).attr('pid');
     var pri=$(".up_pri").val();
     $.ajax(
		{
			url  :"admin_action.php",
			type :"POST",
			data  :  {update_price:1, pro_id:p_id,price:pri},
			success : function(data)
			{
				alert(data);
			}
		});
    
	});
}
function updateAmount()
{
	$("body").delegate("#update_Amount","click",function(event)
	{
     event.preventDefault();
     var p_id=$(this).attr('pid');
     var pri=$(".up_am").val();
     $.ajax(
		{
			url  :"admin_action.php",
			type :"POST",
			data  :  {update_amount:1, pro_id:p_id,amount:pri},
			success : function(data)
			{
				alert(data);
			}
		});
    
	});
}
function deleteProduct()
{
	$("body").delegate("#delete_product","click",function(event)
	{
     event.preventDefault();
     var p_id=$(this).attr('pid');
     
     $.ajax(
		{
			url  :"admin_action.php",
			type :"POST",
			data  :  {delete_pro:1, pro_id:p_id},
			success : function(data)
			{
				alert(data);
			}
		});
    
	});
}


	
