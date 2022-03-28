// Dropdown profile
const profileBtn = document.querySelector('.profile-btn');
const profileDropdown = document.querySelector('.profile-dropdown');

profileBtn.addEventListener('click', () => {
  profileDropdown.classList.toggle('active-dropdown');
});

window.addEventListener('mouseup', (e) => {
  if(e.target != profileDropdown) {
    profileDropdown.classList.remove('active-dropdown');
  }
});

//final prace additional
const finalPrice = document.querySelector('.final-price');
const finalPriceInput = document.getElementById('final_price');
let num = finalPrice.innerHTML.replace(/,/g, '');
num = parseFloat(num.replace("IDR ", ''));
finalPriceInput.value = num;

function addPrice(clicked){
  let checkBox = document.getElementById(clicked);

  if(checkBox.checked == true){
    num += 10000;
  }else {
    num -= 10000;
  }
  
  finalPrice.innerHTML = 'IDR ' + num.toLocaleString();
  finalPriceInput.value = num;
  console.log(finalPriceInput.value);
}

//inputted File
function uploadFile(target) {
  document.querySelector(".order__upload-filename").innerHTML = target.files[0].name;
}

//check password confirmation
function validatePassword() {
  const password = document.getElementById("password");
  const confirmPassword = document.getElementById("password-confirm");

  if (password.value != confirmPassword.value) {
    confirmPassword.setCustomValidity("Password doesn't match!");
  } else {
    confirmPassword.setCustomValidity("");
  }
}