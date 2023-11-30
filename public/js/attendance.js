function save(date){
let form =document.getElementsByClassName("checkboxes");
let hiddens=document.getElementsByClassName("hiddens");
let formData = new FormData();
for(let i=0;i<form.length;i++){
    formData.append(form[i].name, form[i].value);
    // g.appendChild(form[i].cloneNode(true));
}
for(let i=0;i<hiddens.length;i++){
    formData.append(hiddens[i].name, hiddens[i].value);
    
}

formData.append("date", date);

    fetch("../Controllers/attendance.php", {
        method: "POST",
        body: formData
    }).then(response => response.json())
    .then(data => {
        console.log("Response from server:", data);
       
    })
    .catch(error => {
        console.error("Error:", error);
    });



}