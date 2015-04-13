
$('.table-hover tr').click(function() {
    var code = $(this).data("code");
    var nextMin = $(this).data("next-min");
    if (confirm("Do you want to bid " + nextMin + " on " + code + "?")){
	    $.ajax({        
	    	url: 'ajax.php',      
	        data: {'action': "add_new_module", 
	        		 'bid': nextMin, 
	         		 'code': code},
	        dataType: "html",
	        success: function(data) {
	            console.log("post success \n" + data);  
	            location.reload(true);
	        },
	        error: function(XMLHttpRequest, textStatus, errorThrown)  {
	            console.log("Status: " + textStatus);
	        }    	
	    });	
    }
    
});