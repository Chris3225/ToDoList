$(function() {
    $('.editEntry').click(function() {
        var $this = $(this);
        var oldText = $this.parent().parent().find('p').text();
        var id = $this.parent().parent().find('#id').val();
        $this.parent().parent().find('p').empty().append('<textarea class="newDescription" cols="33">' + oldText + '</textarea>');
        $('.newDescription').blur(function() {
            var newText = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'updateEntry.php',
                data: 'description=' + newText + '&id=' + id,

                success: function(results) {
                    $this.parent().parent().find('p').empty().append(newText);
                }
            });
        });
        return false;
    });
});