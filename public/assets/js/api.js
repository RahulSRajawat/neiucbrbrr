$("#add").on("submit", function (e) {
    e.preventDefault();
    var page = $(this).attr("action");
    // $(".btn-sbmit").attr("disabled", "disabled");
    $.ajax({
        url: page,
        type: "POST",
        data: new FormData(this),
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function (result) {
            $(".btn-sbmit").attr("disabled",false);
            if (result["status"] == "errors") {
                var html = '<ul>';
                for (let index = 0; index < result["messages"].length; index++) {
                    const element = result["messages"][index];
                    html += '<li>' + element + '</li>';
                }
                html += '</ul>';
                toastr["error"](html);
            } else {
                toastr[result["status"]](result["msg"]);
            }
            if (result['status'] == "success") {
                $("#add").trigger("reset");
                $("html, body").animate({ scrollTop: 0 }, 1000);
                if(result["refid"] !="" && result["ackno"] !=""){
                    $("#recharge-prepaid-modal").modal("show");
                    $("#recharge-prepaid-modal table tbody").html("<tr><td>"+result["refid"]+"</td><td>"+result["ackno"]+"</td></tr>")
                }
            }
        }
    });
});