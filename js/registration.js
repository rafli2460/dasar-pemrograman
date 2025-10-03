const registerBtn = document.getElementById("registerBtn").value
const resetBtn = document.getElementById("resetBtn").value;

resetBtn.addEventListener("click", function (e) {
  e.preventDefault();
  form.reset();
});
