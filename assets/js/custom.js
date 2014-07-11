var editor = ace.edit("editor");
editor.setTheme("ace/theme/twilight");
editor.getSession().setMode("ace/mode/php");
editor.getSession().setUseSoftTabs(true);
editor.getSession().setTabSize(4);
editor.setReadOnly(readonly); 
$("#submitBtn").hide();
editor.on("change", function() { $("#submitBtn").show(); });
$("#submitBtn").on("click", function() {
	$.post( "libs/ajax/new-paste.php", { paste: editor.getValue() }) 
	.done(function( data ) {
		if(data.response==1) {
			window.location = "index.php?paste="+data.url;
		} else {
			alert("My server is acting up, please notify me!");
		}
});

});