<?php include('header.php');
include('user_details.php');
?>

<!-- <!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Notebook editor</title>
		<script src="ckeditor/ckeditor.js"></script>
	</head> -->

<body>
	<center>
		<h1 style="padding: 20px"> Notes <h1>
	</center>

	<div class="container">
		<form method="post" action="notes_add.php" id="#addnote" enctype="multipart/form-data">

			<!-- TITLE AND TAG TEXTBOXES -->
			<div class="row mx-5 px-4 justify-content-center">
				<div class="form-row">
					<div class="col">
						<input class="mr-2 form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" type="text" name="note_Title" placeholder="Note Title" required>
					</div>
					<div class="col">
						<input class="ml-0 form-control text-truncate border-primary border-top-0 border-left-0 border-right-0 rounded-0" type=" text" name="note_Tags" placeholder="Tags (separated by a comma)">
					</div>
				</div>
			</div>

			<!-- RICHTEXT EDITOR -->
			<br>
			<div class="row justify-content-center my-1">
				<?php include("texteditor/text_editor.php"); ?>
			</div>
			<input type="hidden" name="user_ID" value="<?php echo (isset($user_ID) ? $user_ID : ''); ?>" />

			<div class="row justify-content-center my-1">
				<button type="button" class="btn btn-sm text-secondary" name="cancel" value="cancel" onClick="window.location.href='notes.php';">
					<!-- x icon -->
					<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
						<path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
					</svg>
					Cancel
				</button>
				<button type="submit" name="submit" class="btn btn-sm text-primary">
					<!-- check/floppy icon -->
					<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						<path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" />
						<path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z" />
						<path fill-rule="evenodd" d="M8 6a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 10.293V6.5A.5.5 0 0 1 8 6z" />
					</svg>
					Save
				</button>
			</div>
		</form>
		<div>

</body>

</html>