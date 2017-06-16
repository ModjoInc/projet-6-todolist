function Todo(tache) {
    this.tache = tache;
    this.fait = false;
}

let todos = new Array();
window.onload = init;

function init() {
  let submitButton = document.getElementById('ajouter');
  submitButton.addEventListener("click", getFormData);
  getTodoData();
}

function getTodoData() {
  const req = new XMLHttpRequest();
  req.open('GET', 'assets/todo.json');
  req.onreadystatechange = function() {
  if (this.readyState == this.DONE && this.status == 200) {
            if (this.responseText) {
                parseTodoItems(this.responseText);
                addTodosToPage();
            }
            else {
                console.log("Error: Data is empty");
            }
        }
    };
  req.send();
}

function parseTodoItems(todoJSON) {
  if (todoJSON == null || todoJSON.trim() == ""){
    return;
  }
  let todoArray = JSON.parse(todoJSON);
  if (todoArray.length == 0) {
    console.log("Erreur: la liste est vide");
    return;
  }
  for (var i = 0; i < todoArray.length; i++) {
    let todoItem = todoArray[i];
    todos.push(todoItem);
  }
  console.log("Tableau des tâches : ");
  console.log(todos);
}

function addTodosToPage() {
  let ul = document.getElementById("todoList");
  let listFragment = document.createDocumentFragment();
  for (var i = 0; i < todos.length; i++) {
    let todoItem = todos[i];
    let li = createNewTodo(todoItem);
    listFragment.appendChild(li);
  }
  ul.appendChild(listFragment);
}

function addTodoToPage(todoItem) {
  let ul = document.getElementById('todoList');
  let li = createNewTodo(todoItem);
  ul.appendChild(li);
  document.forms[0].reset();
}

function createNewTodo(todoItem) {
  let li = document.createElement("li");
  let spanTodo = document.createElement("span");
    spanTodo.innerHTML =
        todoItem.tache + "<br/> Ajoutée le : " + todoItem.date;
    let spanFait = document.createElement("span");
    if (!todoItem.fait) {
        spanFait.setAttribute("class", "pasFait");
        spanFait.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    else {
        spanFait.setAttribute("class", "fait");
        spanFait.innerHTML = "&nbsp;&#10004;&nbsp;";
    }
    li.appendChild(spanFait);
    li.appendChild(spanTodo);
  return li;
}

function getFormData() {
  let tache = document.getElementById('tache').value;
  if (checkInputText(tache, "Veuillez ajouter une tâche ;)")) {
    return;
  }
  console.log("Nouvelle tâche : " + tache);
  let todoItem = new Todo(tache);
  todos.push(todoItem);
}

function checkInputText(value, msg) {
  if (value == null || value == "") {
    alert(msg);
    return true;
  } else {
    return false;
  }
}
