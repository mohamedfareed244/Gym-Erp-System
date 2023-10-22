const salesData = {
    dateRange: "2023-03-01 to 2023-03-31",
    totalSales: 5000,
    mostSoldMemberships: ["2 Months Membership", "6 Months Membership"],
    mostSoldClasses: ["Yoga Class", "Body Attack Class"],
};

function generateReport() {
    const reportContainer = document.getElementById("report-container");

    const reportContent = `
        <h2>Sales Report</h2>
        <p>Date Range: ${salesData.dateRange}</p>
        <p>Total Revenue: $${salesData.totalSales}</p>
        <p>Most Sold Memberships: ${salesData.mostSoldMemberships.join(", ")}</p>
        <p>Most Sold Classes: ${salesData.mostSoldClasses.join(", ")}</p>
    `;

    reportContainer.innerHTML = reportContent;
}
