let taskList = document.getElementsByTagName('li');
console.log(taskList);

function changeClass() {
  for (var i = 0; i < taskList.length; i++) {
    taskList[i].addEventListener("click", checking, true);
    }
    function checking() {
      this.classList.add('done');

      let sp1= document.getElementsByClassName('done');
      let sp2 = document.getElementsByClassName('arch');
      for (var i = 0; i < sp2.length; i++) {
        parent = sp2[i].parentNode;
        parent.insertBefore(sp1[i],sp2[i]);
      }
    }
  }
