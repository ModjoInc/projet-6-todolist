const req = new XMLHttpRequest();

req.open('GET', 'assets/todo.json');

req.send();

let myData;

req.onload = function() {
  let data = JSON.parse(req.responseText);
  myData = data;
}

if( myData ) {
  for (var i = 0; i < myData.length; i++) {
    console.log(myData[i]);
  }
}
