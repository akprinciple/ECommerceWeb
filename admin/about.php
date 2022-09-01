<?php
			include 'inc/session.php';
            $msg = "";
            if (isset($_POST['submit'])) {
                $content = mysqli_real_escape_string($connect, $_POST['content']);
                $date = date('D d M Y');
                $update = "UPDATE pages SET content = '{$content}', date = '{$date}' WHERE page_title = 'about us'";
                $u_query = mysqli_query($connect, $update);
                if ($u_query) {
                   $msg = "<div class='font-weight-bold p-2 text-center text-success'>Page successfully Updated</div>";
                }
                else{
                    $msg = "<div class='font-weight-bold p-2 text-center text-danger'>Input Error</div>";
                }
            }
?>
<!DOCTYPE html>
<html>
<head>
	<title>About Us Page | <?php 
        $link = mysqli_query($connect, "SELECT * FROM links WHERE id = 7");
        $links = mysqli_fetch_array($link);
        echo $links['link'];
     ?></title>
	<?php include 'inc/link.php'; ?>
</head>
<body>
<div class="row mx-0">
		<?php include 'inc/sidebar.php'; ?>
<div class="col-md-10">
			<h4 class="border-bottom p-2 font-weight-bold text-dark">Manage About Us Page</h4>
<div class="p-3 float-right">
	 <b class=""> Last update:</b> <?php
$sql = "SELECT * FROM pages WHERE page_title = 'about us'";
$query = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($query)) {
echo $row['date'];
} 
?>
</div>
<div class="clearfix"></div>
	<div class="col-md-9 m-auto">
        <?php echo $msg; ?>

        <h3>Edit Page Content</h3>
	<form method="post" enctype="multipart/form-data">
		
		<div class="mt-3">
			
			<textarea class="form-control" name="content" id="area">
                    <?php
    $sql = "SELECT * FROM pages WHERE page_title = 'about us'";
    $query = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($query)) {
        echo $row['content'];
    }
?>                        
            </textarea>
		</div>
        <button type="submit" name="submit" class="btn btn-success col-md-6 mt-3 float-right">Update</button>
	</form>
</div>

</div>
</div>
</div>
</body>
</html>

<script src='tinymce/js/tinymce/tinymce.min.js'></script>
<script type="text/javascript">
	
tinymce.init({
    selector: '#area',
    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: "30s",
    autosave_prefix: "{path}{query}-{id}-",
    autosave_restore_when_empty: false,
    autosave_retention: "2m",
    image_advtab: true,
    /*content_css: '//www.tiny.cloud/css/codepen.min.css',*/
    link_list: [
        { title: 'My page 1', value: 'https://www.codexworld.com' },
        { title: 'My page 2', value: 'https://www.xwebtools.com' }
    ],
    image_list: [
        { title: 'My page 1', value: 'https://www.codexworld.com' },
        { title: 'My page 2', value: 'https://www.xwebtools.com' }
    ],
    image_class_list: [
        { title: 'None', value: '' },
        { title: 'Some class', value: 'class-name' }
    ],
    importcss_append: true,
    file_picker_callback: function (callback, value, meta) {
        /* Provide file and text for the link dialog */
        if (meta.filetype === 'file') {
            callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
        }
    
        /* Provide image and alt text for the image dialog */
        if (meta.filetype === 'image') {
            callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
        }
    
        /* Provide alternative source and posted for the media dialog */
        if (meta.filetype === 'media') {
            callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
        }
    },
    templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
        { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
        { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 250,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_noneditable_class: "mceNonEditable",
    toolbar_mode: 'sliding',
    contextmenu: "link image imagetools table",
});
</script>