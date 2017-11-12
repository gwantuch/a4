   <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo BASE_URL?>views/js/jquery.js"></script>
    <script src="<?php echo BASE_URL?>views/js/bootstrap.min.js"></script>
	
<?php if($user->isAdmin()) { ?>
    <script src="<?php echo BASE_URL?>application/plugins/tinyeditor/tiny.editor.packed.js"></script>
    <script>
			var editor = new TINY.editor.edit('editor', {
				id: 'tinyeditor',
				width: 584,
				height: 175,
				cssclass: 'tinyeditor',
				controlclass: 'tinyeditor-control',
				rowclass: 'tinyeditor-header',
				dividerclass: 'tinyeditor-divider',
				controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
					'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
					'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
					'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|'],
				footer: true,
				fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
				xhtml: true,
				cssfile: 'custom.css',
				bodyid: 'editor',
				footerclass: 'tinyeditor-footer',
				toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
				resize: {cssclass: 'resize'}
			});
			

		</script>
		
<?php } ?>

		<script>
			
			$(document).ready(function() {
				$('.post-loader').click(function(event) {
					event.preventDefault();
					var el = $(this);
					
					$.ajax({
						url:el.attr('href'),
						method:'GET',
						success:function(data) {
							el.parent().append(data);
							el.remove();
						},
					});
				});
				$('.zip-submit').submit(function(event) {
					console.log('prevent default');
					event.preventDefault();
					var el = $(this);
					$.ajax({
						url:'<?php echo BASE_URL; ?>ajax/get_weather/'.concat($('#zip').val()),
						method:'POST',
						success:function(data) {
							$('#wx .page-header h1').text('Weather For '.concat($('#zip').val()));
							$('#wo').remove();
							el.parent().append(data);
						},
					});
				});
			});
			
		</script>
  </body>
</html>