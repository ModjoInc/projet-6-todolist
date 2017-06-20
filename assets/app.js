
//fonction de définition de la tâche et du statu
function Todo(tache) {
    this.tache = tache;
    this.fait = false;
}
//définition de l'objet todos en tableau vide
let todos = new Array();
window.onload = init;
//définition de la fonction d'initialisation
function init() {
  let submitButton = document.getElementById('ajouter');
  submitButton.addEventListener("click", getFormData);
  getTodoData();
}
//définition de la fonction qui va aller chercher le contenu du fichier Json
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
//définition de la fonction qui va parser le contenu du Json
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
//ajout de l'ensemble des tâches à la page sous format de liste
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
//ajout de la nouvelle tâche
function addTodoToPage(todoItem) {
  let ul = document.getElementById('todoList');
  let li = createNewTodo(todoItem);
  ul.appendChild(li);
  document.forms[0].reset();
}
//création d'un nouvel élément liés à la nouvelle tâche selon le statut
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
//ajout au fichier Json
function getFormData() {
  let tache = document.getElementById('tache').value;
  if (checkInputText(tache, "Veuillez ajouter une tâche ;)")) {
    return;
  }
  console.log("Nouvelle tâche : " + tache);
  let todoItem = new Todo(tache);
  todos.push(todoItem);
}
//validation du champs ajouter
function checkInputText(value, msg) {
  if (value == null || value == "") {
    alert(msg);
    return true;
  } else {
    return false;
  }
}
