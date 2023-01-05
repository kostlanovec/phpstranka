<html>
<head>
    <title>File Selector</title>
</head>
<body>
<input type="file" id="file-selector" />
<div id="status"></div>
<title>File Selector</title>
<script>
    $(document).ready(function() {
        $('#file-selector').on('change', function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                var contents = e.target.result;
                var newWindow = window.open();
                $(newWindow.document.body).html('<div contenteditable>' + contents + '</div>');
                var saveButton = $('<button>Save</button>');
                saveButton.css({
                    position: 'absolute',
                    bottom: 0,
                    left: 0
                });
                $(newWindow.document.body).append(saveButton);
                saveButton.click(function() {
                    var editedContents = $(newWindow.document.body).find('div').html();
                    file.lastModifiedDate = new Date();
                    file.size = editedContents.length;
                    file.type = 'text/plain';
                    file.webkitRelativePath = '';
                    file = new File([editedContents], file.name, {type: 'text/plain', lastModified: file.lastModifiedDate});
                    var a = document.createElement('a');
                    a.download = file.name;
                    a.href = URL.createObjectURL(file);
                    a.style.display = 'none';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                    URL.revokeObjectURL(a.href);
                    $('#status').text('Changes saved');
                    newWindow.close();
                });
            };
            reader.readAsText(file);
        });
    });
</script>
</body>
</html>
