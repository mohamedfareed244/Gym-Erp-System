const salesData = {
    dateRange: "2023-03-01 to 2023-03-31",
    totalSales: 5000,
    mostSoldMemberships: ["2 Months Membership", "6 Months Membership"],
    mostSoldClasses: ["Yoga Class", "Body Attack Class"],
};

function generateReport() {

    const reportContainer = document.getElementById("report-container");
    const tableContainer = document.getElementById("tablediv");
    //---------------------------------------
    let start_date=document.getElementById("startdate").value;
    let end_date=document.getElementById("enddate").value;
    //check for inputs 
 if(start_date!=="" && end_date!==""){
    const data={"start":start_date
               ,"end":end_date
               };
               //fetching the memberships sold in this dates 
                fetch("../Controllers/SalesReport.php" ,{
                method: 'POST',
                headers: {
                  'Content-Type': 'application/json', 
                },
                body: JSON.stringify(data),
              }) .then(response => {
                if (!response.ok) {
                  throw new Error('Network response was not ok');
                }
                return response.json(); 
              })
              .then(data => {
                //inject the data in the table body 
                
               document.getElementById("memberbody").innerHTML=data.data;
               const reportContent = `
               <h2>Generated Report</h2>
               <p class="bold-title">Date Range:</p> <p> ${start_date} to ${end_date}</p>
               <p class="bold-title">Total Sales:</p> <p> EGP ${data.sum}</p>
              
           `;
           reportContainer.innerHTML = reportContent;
           tableContainer.style.display = "block";
              })
              .catch(error => {
                console.error('Error:', error);
              });
            }





   

}
