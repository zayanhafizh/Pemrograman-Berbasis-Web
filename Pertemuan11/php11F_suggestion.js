const txtHint = document.getElementById('txtHint');

function showHint(str) {
    if (str.length == 0) {
    //Code 4a
    txtHint.innerHTML = ""
    return
    }
     // buat objek ajax
     var xhr = new XMLHttpRequest();

     // cek kesiapan ajax
     xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            var suggestions = "";
            if (response.length > 0) {
                suggestions = response.map(item => item.name).join(", ");
            } else {
                suggestions = "no suggestion";
            }
            txtHint.innerHTML = suggestions;
        }
     }
 
     //Code 4b
     xhr.open('GET', 'php11F_gethint.php?keyword=' + str, true)
     xhr.send();
 }