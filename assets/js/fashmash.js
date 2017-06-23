$("#ranka1").on("click", function(){
    $("#or").hide();
    $("#ranka2").hide();
    rank(1);
});

$("#ranka2").on("click", function(){
    $("#or").hide();
    $("#ranka1").hide();
    rank(0);
});

function rank(i) {
    $.ajax({
        url: 'process/rank.php',
        type: 'post',
        data: {
            stu1: $("#rankimg1").val(),
            stu2: $("#rankimg2").val(),
            id: i
        },
        success: function() {
            window.location.reload();
        }
    });
}