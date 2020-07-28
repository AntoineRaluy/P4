let newPassword = document.getElementById("new-password");
let confirmPassword = document.getElementById("confirm-password");

function validatePassword(){
  if(newPassword.value != confirmPassword.value) {
    confirmPassword.setCustomValidity("Les deux champs ne correspondent pas.");
  } else {
    confirmPassword.setCustomValidity('');
  }
}

newPassword.onchange = validatePassword;
confirmPassword.onkeyup = validatePassword;