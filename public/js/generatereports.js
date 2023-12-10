const salesData = {
    dateRange: "2023-03-01 to 2023-03-31",
    totalSales: 5000,
    mostSoldMemberships: ["2 Months Membership", "6 Months Membership"],
    mostSoldClasses: ["Yoga Class", "Body Attack Class"],
};

function generateReport() {
    let start_date=document.getElementById("startdate").value;
    let end_date=document.getElementById("enddate").value;
 if(start_date!=="" && end_date!==""){
    const data={"start":start_date
               ,"end":end_date
               };
               console.log(`the date to be fgiytched ${data.start}`);
                fetch("../Controllers/API/SalesReport.php" ,{
                method: 'POST',
                headers: {
                  'Content-Type': 'application/json', // Adjust content type based on your API requirements
                  // Add any other headers as needed
                },
                body: JSON.stringify(data),
              }) .then(response => {
                if (!response.ok) {
                  throw new Error('Network response was not ok');
                }
                return response.text(); // Assuming the response is in JSON format
              })
              .then(data => {
                console.log('Success:', data);
              })
              .catch(error => {
                console.error('Error:', error);
              });
            }
    const reportContainer = document.getElementById("report-container");
    const tableContainer = document.getElementById("tablediv");

    const reportContent = `
        <h2>Generated Report</h2>
        <p class="bold-title">Date Range:</p> <p> ${salesData.dateRange}</p>
        <p class="bold-title">Total Sales:</p> <p> EGP ${salesData.totalSales}</p>
        <p class="bold-title">Most Sold Memberships: </p> <p> ${salesData.mostSoldMemberships.join(", ")}</p>
    `;

    reportContainer.innerHTML = reportContent;
    tableContainer.style.display = "block";

}
