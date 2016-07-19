
var loader = function(query){
    return xhr;
}

$(function(){
    var app = new Vue({
        el: "#app",
        data: {
            keyword: "leccafe",
            events: []
        },
        created: function(){
            var url = "./api/event.php";
            var xhr = $.get(url,{
                keyword: "leccafe"
            });
            xhr.success(function(response){
                app.events = response.events
            })
        }
    })
});