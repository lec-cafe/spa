
var loader = function(query){

    var query = query || {};

    //var url = "./api.json";
    var url = "./api/event.php";

    var xhr = $.get(url,query);
    xhr.success(function(data){
        var $target = $("#eventList");
        $target.html("");
        data.events.forEach(function(item){
            var html = "<li><a href='"+item.event_url+"'>"+item.title+"</a></li>"
            $target.append($(html))
        })
    })

    xhr.error(function(){
        alert("読み込みに失敗しました。")
    })
    return xhr;
}

$(function(){
    loader();
});



$(function(){
    $(".pagination a").on("click",function(){
        var start = $(this).data("start")
        loader({
            start:start * $("#numberCount").val(),
            count: $("#numberCount").val(),
            keyword: $("[name=keyword]:checked").val()
        })
    })

    $("#numberCount").on("focusout",function(){
        console.log("hgohoe")
    })
})