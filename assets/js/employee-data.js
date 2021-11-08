$(document).ready(function () {
    $('#employee').DataTable({
        "scrollX": true,
        data: dataSet,
        columns: [
            { title: "id" },
            { title: "Applying for" },
            { title: "First Name" },
            { title: "Last Name" },
            { title: "Father" },
            { title: "DOB" },
            { title: "Gender" },
            { title: "Address" },
            { title: "Phone Number" },
            { title: "Aadhar" },
            { title: "Looking for" },
            { title: "Job Type" },
            { title: "Experience" },
            { title: "Present Organization" },
            { title: "Present Salary" },
            { title: "Expected Salary" }
        ]
    });
});