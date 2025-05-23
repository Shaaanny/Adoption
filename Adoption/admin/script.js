
function showFlash(message, type = 'success') {
  const flash = document.getElementById("flashMessage");
  const content = document.getElementById("flashContent");

  flash.className = `alert alert-${type} position-fixed top-0 end-0 m-3`;
  content.textContent = message;
  flash.classList.remove("d-none");

  setTimeout(() => flash.classList.add("d-none"), 3000);
}

function deleteUser(id) {
  if (!confirm("Are you sure you want to delete this user?")) return;

  const formData = new FormData();
  formData.append("id", id);

  fetch("delete_user.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      showFlash(data.message, "danger");
      users = users.filter(u => u.id !== data.id);
      renderTables();
    } else {
      showFlash(data.message, "danger");
    }
  });
}

