$(document).ready(function() {
    $(".blue").click(function(){
        $("link").attr("href", "media/css/blue.css");
        return false;
    });
    $(".green").click(function(){
        $("link").attr("href", "media/css/green.css");
        return false;
    });
    $(".red").click(function(){
        $("link").attr("href", "media/css/red.css");
        return false;
    });
	
	$('#confirm').click(function(){
	if(confirm("Are you sure you want to delete this article?")){
		submit()
	} else {
		
	}
	return false;
	});

});