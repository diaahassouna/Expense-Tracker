//Create, Read, Update, and Delete Data DOM grapping 
document.getElementById('button').addEventListener('click', createData); //Create
document.getElementById('button').addEventListener('click', getData); //Read
/*document.getElementById('button').addEventListener('click', updateData); //Update
document.getElementById('button').addEventListener('click', deleteData); //Delete*/

//CRUD functions

//Create API Data
function createData() {
    var xhr = new XMLHttpRequest();
    var fd = new FormData(form);
    
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

    var form = document.getElementById("create_form");

    form.addEventListener("submit", function (event) {
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