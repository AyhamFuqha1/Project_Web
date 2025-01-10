function toggleCheckbox(selectedId, otherId) {
   const set=document.getElementById(selectedId);
   const at=document.getElementById(otherId);
 
   if(set.checked){
       at.checked=false;
   }
    
}

const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});