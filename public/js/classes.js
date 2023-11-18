function getclasses(){
let option=document.getElementById("select-coaches").value;
let postData={'key':'value'};
fetch('../Controllers/coachapi.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify(postData),
}) .then(response => response.json())
.then(data => {
    console.log('POST Response:', data);
})
.catch(error => console.error('Error:', error));

}