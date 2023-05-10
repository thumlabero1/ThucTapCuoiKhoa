$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
function loadMore(e) {
    const page = $("#page").val();
    $.ajax({
        type: "POST",
        dataType: "JSON",
        data: { page },
        url: "/services/load-product",
        success: function (res) {
            console.log(res);
            if (res.html != "") {
                $("#loadProduct").append(res.html);
                $("#page").val(+page + 1);
            } else {
                $("#button-loadMore").css("display", "none");
            }
        },
    });
}
