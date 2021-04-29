document.getElementById('button').addEventListener('click', getData);

//Get API Data
function getData() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost:8000/api/expense', true);

    xhr.onload = function(){
        if(this.status == 200){
            var info = JSON.parse(this.responseText);
            console.log(info);
        }
    }

    xhr.send();

}