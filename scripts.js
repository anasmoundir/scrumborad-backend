function fillMyForm(id) {
  console.log(id);

  // getting data trought attribut
  document.getElementById("task-id").value = id;
  let title = document.getElementById(id + "hello").getAttribute("data-btn");
  theDate = document.getElementById(id + "date").getAttribute("data-btn");
  description = document.getElementById(id + "description").getAttribute("data-description");
  type = document.getElementById(id + "type").getAttribute("data-type");
  priority = document.getElementById(id + "priority").getAttribute("data-priority");
  statius = document.getElementById(id + "status").getAttribute("data-stat");
  if (type == 2) {
    document.getElementById("task-type-feature").checked = true;
  } else if (type == 1) {
    document.getElementById("task-type-bug").checked = true;
  }

  //fill the form
  document.getElementById("task-date").value = theDate;
  document.getElementById("task-title").value = title;
  document.getElementById("task-description").value = description;
  document.getElementById("task-status").value = statius;
  document.getElementById("task-priority").value = priority;
}

function emptyMyForm() {
  document.getElementById("form-task").reset();
}
