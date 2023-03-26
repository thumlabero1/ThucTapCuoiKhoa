$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    $('.delete-menu').click(function(e) {
        e.preventDefault();
        var menuId = $(this).data('id');
        deleteMenu(menuId);
    });
});

function deleteMenu(menuId) {
    $.ajax({
        url: '/admin/menus/delete/' + menuId,
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(result) {
            // Refresh the page to show updated data
            location.reload();
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
}

