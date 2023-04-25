function getJobs(id)
{
    let value=id.value;
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
            if (xhttp.readyState === XMLHttpRequest.DONE)
            {
                if (xhttp.status === 200)
                {   
                    let results = JSON.parse(this.responseText);
                    document.getElementById("results").innerHTML=printTable(results);
                }
            }
        }
        let url="./adminDashboardOnServer.php?flexRadioDefault="+value;
        
        xhttp.open("GET", url, true);
        xhttp.send();
}

function printTable(arr)
{
    let output=`<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Job ID</th>
            <th scope="col">Job Title</th>
            <th scope="col">Customer Phone Number</th>
            <th scope="col">Customer Name</th>
        </tr>
    </thead>
    <tbody>`;
    let count = 0;
    for (let row of arr)
    {
        count++;
        jobID=row["jobID"];
        jobTitle=row["jobTitle"];
        customerPhoneNumber=row["customerPhoneNumber"];
        customerName=row["customerName"];
        output+= `</td><td>${count}</td><td>${jobID}</td><td>${jobTitle}</td><td>${customerPhoneNumber}</td><td>${customerName}</td></tr>`;
    }
    output+= `</tbody></table>`;
    return output;
}