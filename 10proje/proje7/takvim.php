<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Takvim</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    .calendar {
        max-width: 600px;
        margin: 20px auto;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .calendar h2 {
        text-align: center;
        margin: 20px 0;
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }

    td {
        border: 1px solid #ddd;
    }

    .day {
        cursor: pointer;
    }

    .day:hover {
        background-color: #f9f9f9;
    }

    .selected {
        background-color: #007bff;
        color: #fff;
    }
</style>
</head>
<body>

<div class="calendar">
    <h2 id="currentMonthYear"></h2>
    <table id="calendarTable">
        <thead>
            <tr>
                <th>Pzt</th>
                <th>Sal</th>
                <th>Çar</th>
                <th>Per</th>
                <th>Cum</th>
                <th>Cmt</th>
                <th>Paz</th>
            </tr>
        </thead>
        <tbody id="calendarBody">
        </tbody>
    </table>
</div>

<script>
    function updateCalendar(year, month) {
        var firstDayOfMonth = new Date(year, month - 1, 1).getDay();
        var numDaysInMonth = new Date(year, month, 0).getDate();
        var calendarBody = document.getElementById("calendarBody");
        var calendarHTML = "";

        document.getElementById("currentMonthYear").innerText = new Date(year, month - 1).toLocaleString('default', { month: 'long', year: 'numeric' });

        for (var i = 0; i < firstDayOfMonth; i++) {
            calendarHTML += "<td></td>";
        }

        var currentDay = 1;
        for (var i = firstDayOfMonth; i < 7; i++) {
            calendarHTML += "<td class='day' onclick='selectDay(" + currentDay + ")'>" + currentDay + "</td>";
            currentDay++;
        }
        calendarHTML += "</tr>";

        while (currentDay <= numDaysInMonth) {
            calendarHTML += "<tr>";
            for (var i = 0; i < 7 && currentDay <= numDaysInMonth; i++) {
                calendarHTML += "<td class='day' onclick='selectDay(" + currentDay + ")'>" + currentDay + "</td>";
                currentDay++;
            }
            calendarHTML += "</tr>";
        }

        calendarBody.innerHTML = calendarHTML;
    }

    function selectDay(day) {
        var selectedDay = document.querySelector(".selected");
        if (selectedDay) {
            selectedDay.classList.remove("selected");
        }
        document.querySelectorAll(".day").forEach(function(element) {
            if (parseInt(element.innerText) === day) {
                element.classList.add("selected");
            }
        });
    }

    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    var currentMonth = currentDate.getMonth() + 1;

    updateCalendar(currentYear, currentMonth);
</script>

</body>
</html>
