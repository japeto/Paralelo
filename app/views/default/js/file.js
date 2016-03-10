$('form').submit(function (e) {
    var fd = new FormData();
    fd.append('file', $('#file')[0].files[0]);
    $.ajax({
        cache: false,
        beforeSend: function (xhr) {
            xhr.setRequestHeader("Cache-Control", "no-cache");
            xhr.setRequestHeader("pragma", "no-cache");
        },
        url: 'http://www.codekraken.com/testing/pointify/test.php?callback=?',
        data: fd,
        dataType: "json",
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (data) {
            console.log(data);
        },
        error: function (data) {
            console.log(data);
        }
    });
    e.preventDefault();
});