function incrementCount() {
  var countElement = document.getElementById("countDisplay");
  var count = parseInt(countElement.textContent);
  count++;
  countElement.textContent = count;
}

function decrementCount() {
  var countElement = document.getElementById("countDisplay");
  var count = parseInt(countElement.textContent);
  if (count > 1) {
    count--;
    countElement.textContent = count;
  }
}
