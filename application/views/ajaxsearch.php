<!doctype html>
<html>
  <head>
    <title>YouTube Search</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<style type="text/css">
body{margin-top: 50px; margin-left: 50px}
</style>
  </head>
  <body>
<form id="form">
    <h2 align="center">Youtube Video Search List using Ajax</h2><br />
    <div class="form-group">
				<div class="col-md-10">
					<input type="text" name="search" id="search" placeholder="Enter Search Term" class="form-control" />
        </div>
        <div class="col-md-2">
          <input type="submit" value="Search" class="btn btn-danger">
        </div>
		</div>
</form>
<br>
<div class="row">
  <div class="col-md-12">
    <div id="videos"></div>
  </div>
</div>
</body>
<script>
$(document).ready(function(){
  load_data();
	function load_data(query,max_result)
	{
		$.ajax({
			url:'<?= base_url('Ajaxsearch/fetch')?>',
			method:"POST",
			data:{query:query,max_result:max_result},
			success:function(data){
       videoSearch(data,query,max_result);
			}
		})
	}

	$("#form").submit(function(event){
   event.preventDefault();
    var search=$("#search").val();
		if(search != '')
		{
			load_data(search,10);
		}
		else
		{
			load_data();exit;
		}
	});
 
   function videoSearch(key,search,maxResults){
    $("#videos").empty();
    if(search != undefined){
      
      $.get("https://www.googleapis.com/youtube/v3/search?key="+ key 
     + "&type=video&part=snippet&maxResults=" + maxResults + "&q=" + search, function(data){
       data.items.forEach(item => {
        video = `
        <iframe width="420" height="315" src="http://www.youtube.com/embed/${item.id.videoId}" frameborder="0" allowfullscreen></iframe>
        `
        $("#videos").append(video);
       });
     
     });
    }
   }
});
</script>
</html>