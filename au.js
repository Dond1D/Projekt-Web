const toggleBtn = document.getElementById("toggle-menu");
const sideMenu = document.querySelector(".side-menu");

toggleBtn.addEventListener("click", function () {
  sideMenu.classList.toggle("show-menu");
});



document.getElementById("save-button").addEventListener("click", function () {
  let text = document.getElementById("text").innerHTML;
  localStorage.setItem("content", text);
});

window.onload = function () {
  let savedContent = localStorage.getItem("content");
  if (savedContent) {
    document.getElementById("text").innerHTML = savedContent;
  }
};
