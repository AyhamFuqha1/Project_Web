function toggleCheckbox(selectedId, otherId) {
   const set=document.getElementById(selectedId);
   const at=document.getElementById(otherId);
 
   if(set.checked){
       at.checked=false;
   }
    
}
