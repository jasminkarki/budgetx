<h6 class="card-header">Add notice</h6>

<div class="card-text">
	<form class="form" method="post" action="\database\add_notice.php">
		<div class="form-group">
			<label class="control-label" for="title">Title</label>
			<input class="form-control" type="text" name="title">
		</div>
		<div class="form-group">
			<label class="control-label" for="body">Body</label>
			<textarea  rows="3" class="form-control" name="body"></textarea>
		</div>
		<div class="form-group">
			<button type = "submit" class="btn btn-success" name="submit">Add</button>
		</div>
	</form>
</div>