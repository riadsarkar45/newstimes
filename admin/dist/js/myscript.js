$(document).ready(function(){
	$('.fa-bars').click(function(){
		$('.sidebar').toggle();
	});		

	$("#search").keyup(function() {
    	var value = this.value;

	    $("table").find("tr").each(function(index) {
	        if (!index) return;
	        var id = $(this).find("td").text();
	        $(this).toggle(id.indexOf(value) !== -1);
	    });
	});

	function slugify(text)
	{
	  return text.toString().toLowerCase()
		    .replace(/\s+/g, '-')           // Replace spaces with -
		    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
		    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
		    .replace(/^-+/, '')             // Trim - from start of text
		    .replace(/-+$/, '');            // Trim - from end of text
	}

	$('#post_name').keyup(function(){
		var post_slug = $(this).val();
		$('#post_slug').val(slugify(post_slug));
	});

	$('#select-all').click(function(event) {   
	    if(this.checked) {
	        $(':checkbox').each(function() {
	            this.checked = true;                        
	        });
	    }else{
	    	$(':checkbox').each(function() {
	            this.checked = false;                        
	        });
	    }
	});

	var list = document.getElementById("my-ui-list");
	Sortable.create(list);

});