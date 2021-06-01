//Create, Read, Update, and Delete Data DOM grapping 
/*document.getElementById('button').addEventListener('click', createData); //Create*/
document.getElementById('button').addEventListener('click', getData); //Read
document.getElementById('button').addEventListener('click', updateData); //Update
/*document.getElementById('button').addEventListener('click', deleteData); //Delete*/

//CRUD functions

//Create API Data
function createData() {
    var xhr = new XMLHttpRequest();
    var fd = new FormData(create_form);
    
    xhr.open('POST', 'api/expense', true);

    xhr.onload = function(){
        if(this.status == 200){
            var response = JSON.parse(this.responseText);
            console.log(response);
        } else {
            console.log("error")
        }
    }

    xhr.send(fd);
}

var create_form = document.getElementById("create_form");

create_form.addEventListener("submit", function (event) {
    event.preventDefault();
    createData();
})

//Read API Data
function getData() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'api/expense', true);

    xhr.onload = function(){
        if(this.status == 200){
            var info = JSON.parse(this.responseText);
            console.log(info);
        }
    }

    xhr.send();

}

//Update API Data
function updateData() {
    var xhr = new XMLHttpRequest();
    var fd = new FormData(update_form);
    var uri = 'api/expense/13';
    
    xhr.open('POST', uri, true);

    xhr.onload = function(){
        if(this.status == 200){
            var response = JSON.parse(this.responseText);
            console.log(response);
            console.log(uri);
        } else {
            console.log("error")
        }
    }

    xhr.send(fd);
}

var update_form = document.getElementById("update_form");

update_form.addEventListener("submit", function (event) {
    event.preventDefault();
    updateData();
})

//Delete API Data
function DeleteData() {
    var xhr = new XMLHttpRequest();
    var uri = 'api/expense/14';
    
    xhr.open('DELETE', uri, true);

    xhr.onload = function(){
        if(this.status == 200){
            var response = JSON.parse(this.responseText);
            console.log(response);
            console.log(uri);
        } else {
            console.log("error")
        }
    }

    xhr.send();
}

var update_form = document.getElementById("delete_button");

update_form.addEventListener("click", function (event) {
    event.preventDefault();
    DeleteData();
})