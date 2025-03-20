function readTextFile(file, callback) {
    var rawFile = new XMLHttpRequest();
    rawFile.overrideMimeType("application/json");
    rawFile.open("GET", file, true);
    rawFile.onreadystatechange = function() {
        if (rawFile.readyState === 4 && rawFile.status == "200") {
            callback(rawFile.responseText);
        }
    }
    rawFile.send(null);
}

var json_data = []

//usage:
readTextFile("/json/chat.json", function(text){
    var data = JSON.parse(text);
    json_data = data

    var message_array = []
    for (i in json_data) {
    let cdata = json_data[i]
    let data_string = ''
    if (cdata['type'] == 'user') {
        data_string = `<p> &lt<span class="name" style="color: ${cdata['color']}">${cdata['user']}</span>&gt : ${cdata['message']}</p>`;
    }
    else if (cdata['type'] == 'system_user') {
        data_string = `<br> <p>&gt <span class="name" style="color: ${cdata['color']}">${cdata['user']}</span> ${cdata['message']}</p> <br>`;
    }
    message_array.push(data_string)
    }
    var full_chat = "";
    for (i in message_array) {
        full_chat += (message_array[i]);
    }
    document.getElementById('msgboard').innerHTML = full_chat;
});

