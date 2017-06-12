//charger le fichier "data.json"

let req = new XMLHttpRequest();
req.open('GET', 'assets/todo.json');
req.onload = function() {
  if (req.status >= 200 && req.status < 400) {
    let data = JSON.parse(req.responseText);

    console.log(data);
  } else {
    //error
  }
};
