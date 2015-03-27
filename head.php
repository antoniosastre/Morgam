<meta charset="utf-8">
<link href="css/smoothness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/jquery-ui-1.10.4.custom.min.js"></script>
<link rel="stylesheet" href="style.css">
<link href="js/video-js/video-js.css" rel="stylesheet">
<script src="js/video-js/video.js"></script>
<script src="js/tag-it.js" type="text/javascript" charset="utf-8"></script>
<link href="css/jquery.tagit.css" rel="stylesheet" type="text/css">
<?php include 'config.php' ?>
<script type="text/javascript">
	
	$(function(){
            var sampleTags = ['c++', 'java', 'php', 'coldfusion', 'javascript', 'asp', 'ruby', 'python', 'c', 'scala', 'groovy', 'haskell', 'perl', 'erlang', 'apl', 'cobol', 'go', 'lua'];



    $(document).ready(function() {
            $('.input_tags').tagit({
                availableTags: sampleTags,
                allowSpaces: true
            });
    });

    });
</script>