var myArray = [];
var tableMember = document.getElementById("tableMember");
const url = "https://api.klubaderai.com/api/users";

$.ajax({
    method: "GET",
    url: url,
    headers: {
        Authorization:
            "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYjQ0MTcwYWEyNmYyNTZlZjYxOWU5Mjg1N2I3MmI3Y2ZmMjlhZjYwMzFjNmExMGIwNTliODQzMTA2YjQwMTEzNzU1OTJjYTNiNGJhYWQ3NmEiLCJpYXQiOjE2NDQ0NzgxNTMuMTc4MjYsIm5iZiI6MTY0NDQ3ODE1My4xNzgyNjMsImV4cCI6MTY3NjAxNDE1My4xMTUyNjksInN1YiI6IjIxIiwic2NvcGVzIjpbXX0.WkvV1C-Fb7ForxHe1i8aN9g2KFwykVAZRNcabwQjsOvEQpzIQ91AJRSzIDq2zE9KtmSaJNOuiPsyf__Z14ogh1LyUAdzF9-N41O-NBrypSRelEK86iIo_OdYPsS7wNcmymrPIFgMq90lVHhHuUJYX6p-JL_DrgGOuvJarS2sLqn_Jb0JP-vK64ePuNKjPtJJWy3mAI_7V8LCAnl95j-YqCgkutxJXCqJ28K3vdEZ4R8TQhwDcWw2R2FmxNM3SJmnaPbi-ps20UC_SIjnyXsep1pg1eez9sO7q-l3RxvU32Zf4MUG5ksM_x-mtmFZZOV-A2gIJ7MzuvCUMPn6cFKnYrWdDan3WsGvx9N0gLlFIrXap5ZtlZpmjfREOJI5k91AN3u6N2n8fu9JBA5E0hGdWXi428sukmkxgQrBE2X89oxmWpuVUMjjNlRVeAFVyMbILNfflSMIN1tRSogkjE06hYYARWteRufmO2Ot313IUTnIY6Q1mn1JdmU6ZTaTmGnopvisK6GObcTtmgwSubIxQfQYmEFeCV2D030TRH_HR53LmQ-X3rOJochNMhM1rPH76Wdg6N_UVEySfSFnS8efec51PNurWE5Kx8laBuFfHb104RFevHW_t6VDxsafXvZ2mMzkZmq2Snvt1y7xTWjb5E9OAuV39HnRPbyfeV4lYqM",
    },
    success: function (response) {
        myArray = response.data;
        buildTable(myArray);
        console.log(myArray);
    },
});

function buildTable(data) {
    for (var i = 0; i < data.length; i++) {
        var row = `<tr data-id=${data[i].id}>
			    <td>${data[i].id}</td>
			    <td>${data[i].name}</td>
                <td>${data[i].tempat_lahir}</td>
                <td>${data[i].tanggal_lahir}</td>
                <td>${data[i].email}</td>
                <td>${data[i].nohp}</td>
			    <td>${data[i].alamat}</td>
                <td>${data[i].expired}</td>
                <td>${data[i].token}</td>
                <td></td>
                <td>
                    <button class="button-29" role="button">Update</button>
                    <button id="deleteMember" class="button-30" role="button">Delete</button>
                </td>
			</tr>`;
        tableMember.innerHTML += row;
    }
}

tableMember.addEventListener("click", (e) => {
    e.preventDefault();
    let deleteButtonisPressed = e.target.id == "deleteMember";

    var myHeaders = new Headers();
    myHeaders.append(
        "Authorization",
        "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYjQ0MTcwYWEyNmYyNTZlZjYxOWU5Mjg1N2I3MmI3Y2ZmMjlhZjYwMzFjNmExMGIwNTliODQzMTA2YjQwMTEzNzU1OTJjYTNiNGJhYWQ3NmEiLCJpYXQiOjE2NDQ0NzgxNTMuMTc4MjYsIm5iZiI6MTY0NDQ3ODE1My4xNzgyNjMsImV4cCI6MTY3NjAxNDE1My4xMTUyNjksInN1YiI6IjIxIiwic2NvcGVzIjpbXX0.WkvV1C-Fb7ForxHe1i8aN9g2KFwykVAZRNcabwQjsOvEQpzIQ91AJRSzIDq2zE9KtmSaJNOuiPsyf__Z14ogh1LyUAdzF9-N41O-NBrypSRelEK86iIo_OdYPsS7wNcmymrPIFgMq90lVHhHuUJYX6p-JL_DrgGOuvJarS2sLqn_Jb0JP-vK64ePuNKjPtJJWy3mAI_7V8LCAnl95j-YqCgkutxJXCqJ28K3vdEZ4R8TQhwDcWw2R2FmxNM3SJmnaPbi-ps20UC_SIjnyXsep1pg1eez9sO7q-l3RxvU32Zf4MUG5ksM_x-mtmFZZOV-A2gIJ7MzuvCUMPn6cFKnYrWdDan3WsGvx9N0gLlFIrXap5ZtlZpmjfREOJI5k91AN3u6N2n8fu9JBA5E0hGdWXi428sukmkxgQrBE2X89oxmWpuVUMjjNlRVeAFVyMbILNfflSMIN1tRSogkjE06hYYARWteRufmO2Ot313IUTnIY6Q1mn1JdmU6ZTaTmGnopvisK6GObcTtmgwSubIxQfQYmEFeCV2D030TRH_HR53LmQ-X3rOJochNMhM1rPH76Wdg6N_UVEySfSFnS8efec51PNurWE5Kx8laBuFfHb104RFevHW_t6VDxsafXvZ2mMzkZmq2Snvt1y7xTWjb5E9OAuV39HnRPbyfeV4lYqM"
    );
    var deleteRequest = {
        method: "Delete",
        headers: myHeaders,
        redirect: "follow",
    };

    id = e.target.parentElement.parentElement.dataset.id;
    if (deleteButtonisPressed) {
        fetch(`${url}/${id}`, deleteRequest)
            .then((res) => res.json())
            .then(location.reload());
    }
});
