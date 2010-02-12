$(document).ready(function(){

    // Allow the Edit Notes textarea to grow as the text expands
    $('textarea.notes').autogrow();

    // Sort the tables by columns
    $.tablesorter.defaults.widgets = ['zebra'];
    $('table.contacts').tablesorter({
        sortList: [[0,0]]
    });

    // Offer ability to close the messages
    $('.close').click(function(){
        $('#message').slideUp();
    });

    // Disable submit button until changes are made.
    $("#edit .submit").attr("disabled", "disabled");
    $("#edit form").keydown(function() {
        $(".submit").attr("disabled", "");
        $('span.saved').remove();
    });

    // AJAX-ify the contact edit form
	$('#edit form').ajaxForm(function() {
        $(".submit").attr("disabled", "disabled").after('<span class="saved">Saved!</span>');
    });

    // Confirm deletions
    $('.delete a').click(function(){
        if (confirm('You sure you wanna do that, boss?'))
            return true;
        else
            return false;
    });

});

