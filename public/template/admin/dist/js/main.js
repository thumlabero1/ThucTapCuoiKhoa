$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function removeRow(id, url) {
    if (confirm("Are you sure")) {
        $.ajax({
            type: "DELETE",
            datatype: "JSON",
            data: { id },
            url: url,
            success: function (res) {
                if (res.error == false) {
                    alert(res.message);
                    location.reload();
                } else {
                    alert(res.message);
                }
            },
        });
    }
}
$("#upload").change(function (e) {
    const form = new FormData();
    form.append("file", $(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType: false,
        type: "POST",
        datatype: "JSON",
        data: form,
        url: "/admin/upload/services",
        success: function (res) {
            console.log(res);
            if (!res.error) {
                $("#image_review").html(
                    `<a href="${res.url}" target="_blank"><img src="${res.url}" width="100px"/></a>`
                );
                $("#file").val(res.url);
            } else {
                alert("Upload lỗi!");
            }
        },
    });
});

$(document).ready(function () {
    const charts = document.querySelectorAll(".chart");

    charts.forEach(function (chart) {
        var ctx = chart.getContext("2d");
        var myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                datasets: [
                    {
                        label: "# of Votes",
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            "rgba(255, 99, 132, 0.2)",
                            "rgba(54, 162, 235, 0.2)",
                            "rgba(255, 206, 86, 0.2)",
                            "rgba(75, 192, 192, 0.2)",
                            "rgba(153, 102, 255, 0.2)",
                            "rgba(255, 159, 64, 0.2)",
                        ],
                        borderColor: [
                            "rgba(255, 99, 132, 1)",
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 206, 86, 1)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(153, 102, 255, 1)",
                            "rgba(255, 159, 64, 1)",
                        ],
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    });

    thongke();
    var char = new Morris.Area({
        element: "chart",

        xkey: "date",
        ykeys: ["order", "sales", "quantity"],
        labels: ["Đơn hàng", "Doanh thu", "Số lượng "],
    });
    var charD = new Morris.Bar({
        element: "chartD",

        xkey: "date",
        ykeys: ["order", "sales", "quantity"],
        labels: ["Đơn hàng", "Doanh thu", "Số lượng "],
    });
    $(".select-date").change(function () {
        var time = $(this).val();
        console.log(time);
        $.ajax({
            url: "/admin/thongke",
            method: "POST",
            data: {
                time,
            },
            success: function (data) {
                char.setData(JSON.parse(data));
            },
        });
    });

    function thongke() {
        var text = "365 ngày qua";
        $("#text-date").text(text);
        $.ajax({
            url: "/admin/thongke",
            method: "POST",
            dateType: "JSON",
            success: function (data) {
                char.setData(JSON.parse(data));
                charD.setData(JSON.parse(data));
            },
        });
    }
});
