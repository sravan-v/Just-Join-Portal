$(document).ready(function () {
    $('#employer').DataTable({
        "scrollX": true,
        data: dataSet,
        columns: [
            { title: "id" },
            { title: "Name" },
            { title: "Designation" },
            { title: "Organization Type" },
            { title: "Organization Name" },
            { title: "Phone Number" },
            { title: "Email" },
            { title: "Address" },
            { title: "Employee Category" },
            { title: "Employee Job type" },
            { title: "No. of positons" },
            { title: "Employee Gender" },
            { title: "Employee Experience" },
            { title: "Min. Salary" },
            { title: "Max. Salary" }
        ]
    });
});