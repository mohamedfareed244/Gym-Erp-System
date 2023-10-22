const salesData = {
    dateRange: "2023-03-01 to 2023-03-31",
    totalSales: 5000,
    mostSoldMemberships: ["2 Months Membership", "6 Months Membership"],
    mostSoldClasses: ["Yoga Class", "Body Attack Class"],
};

function generateReport() {
    const reportContainer = document.getElementById("report-container");
    const tableContainer = document.getElementById("tablediv");

    const reportContent = `
        <h2>Generated Report</h2>
        <p class="bold-title">Date Range:</p> <p> ${salesData.dateRange}</p>
        <p class="bold-title">Total Sales:</p> <p> EGP ${salesData.totalSales}</p>
        <p class="bold-title">Most Sold Memberships: </p> <p> ${salesData.mostSoldMemberships.join(", ")}</p>
        <p class="bold-title">Most Sold Classes: </p> <p> ${salesData.mostSoldClasses.join(", ")}</p>
    `;

    reportContainer.innerHTML = reportContent;
    tableContainer.style.display = "block";

}
