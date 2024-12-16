function SubmitHandler(event) {
 
  event.preventDefault();
  const errormessage=document.getElementById("errorMessages");
  errormessage.innerHTML=""


  const name = document.getElementById("name").value.trim();
  const description = document.getElementById("description").value.trim();
  const fileInput = document.getElementById("img");
  const year =document.getElementById("year").value.trim();
  const errors = [];
  if (name.length < 5) {
    errors.push("Name should be at least 5 characters.");
  }
  if (description.length < 10) {
    errors.push("Description should be at least 10 characters.");
  }
  if (!/^\d{4}$/.test(year)){
    errors.push("Please enter a valid 4-digit year (e.g., 2024).");
 }
  if (fileInput.files.length === 0) {
    errors.push("Please upload an image.");
  } 

  else {
    const file = fileInput.files[0];
    const allowedTypes = ["image/jpeg", "image/png", "image/gif"];
    if (!allowedTypes.includes(file.type)) {
      errors.push("Invalid file type. Only JPEG, PNG, or GIF are allowed.");
    }
  }

  if (errors.length > 0) {
    errorMessages.innerHTML = errors.join("<br>");
    return;
  }

  alert("Form submitted successfully!");
  event.target.submit(); 
}

function clearErrors(modalid){
  const modal=document.getElementById(modalid);
   
  const errorMessages = modal.querySelector("#errorMessages");

  if (errorMessages) {
    errorMessages.innerHTML = ""; 
}


modal.querySelectorAll("input, textarea").forEach((input) => {
    input.value = "";
});
}
