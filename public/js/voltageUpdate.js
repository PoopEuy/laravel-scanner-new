let vstatus = voltage_data.v_status;
let irstatus = voltage_data.ir_status;
console.log("vstatus :" + vstatus);
console.log("irstatus :" + irstatus);

if (vstatus == "Pass") {
    document.getElementById("vstatus").style.color = "green";
} else {
    document.getElementById("vstatus").style.color = "red";
}

if (irstatus == "Pass") {
    document.getElementById("irstatus").style.color = "green";
} else {
    document.getElementById("irstatus").style.color = "red";
}

var cookies_last;
var dataUpdate = document.getElementById("updated_at").value;
var dataView1 = document.getElementById("dataMuncul1");
var dataView2 = document.getElementById("dataMuncul2");

getCookie();

function getCookie() {
    var cookies = document.cookie
        .split(";")
        .map((cookie) => cookie.split("="))
        .reduce(
            (accumulator, [key, value]) => ({
                ...accumulator,
                [key.trim()]: decodeURIComponent(value),
            }),
            {}
        );

    cookies_last = cookies.dataUpdateCookie;
    console.log("last Cookies = " + cookies_last);

    if (dataUpdate > cookies_last) {
        //Do something..
        // alert("Data Muncul!");
        dataView1.style.display = "block";
        dataView2.style.display = "block";
        noData.style.display = "none";
    } else {
        // alert("Data tidak Muncul!");
        dataView1.style.display = "none";
        dataView2.style.display = "none";
        noData.style.display = "block";
    }

    cetakCookies();
}

function cetakCookies() {
    var now = new Date();
    var time = now.getTime();
    time += 3600 * 1000;
    now.setTime(time);
    document.cookie =
        "dataUpdateCookie=" +
        dataUpdate +
        "; expires=" +
        now.toUTCString() +
        "; path=/";

    console.log("cookies = " + document.cookie);
}

setTimeout(function () {
    window.location.reload(1);
}, 2000);
