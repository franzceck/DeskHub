<h1 class="text-light">Welcome to <?php echo $_settings->info('name') ?></h1>
<?php
$sched_arr = array();
require_once('inc/sess_auth.php');
?>
<hr>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div id="calendar"></div>
        </div>
    </div>
</div>
<style>
    .fc-event:hover,
    .fc-event-selected {
        color: black !important;
    }

    a.fc-list-day-text {
        color: black !important;
    }

    .fc-event:hover,
    .fc-event-selected {
        color: black !important;
        background: #FDC474;
        cursor: pointer;
    }

    .total_slots .fc-daygrid-event-dot,
    .total_slots .fc-event-time {
        display: none;
    }
    .total_slots {
        text-align: center;
    }
</style>
<?php
$stmt = <<<END
SELECT
    a.id as appointment_id,
    a.date_sched,
    a.status,
    u.id as user_id,
    u.name
FROM `appointments` a inner join `users` u on a.client_id = u.id
END;
if ($_SESSION['userdata']['role_id'] != 2) {
    $stmt .= " WHERE a.client_id = {$_SESSION['userdata']['id']}";
}
// if ($_SESSION['userdata']['role_id'] != 3) {
//     $stmt .= " WHERE a.client_id = {$_SESSION['userdata']['id']}";
// }

$sched_query = $conn->query($stmt);
$sched_arr = $sched_query->fetch_all(MYSQLI_ASSOC);

// get booking limit
$sched_set_qry = $conn->query("SELECT * FROM `schedule_settings`");
$sched_set = array_column($sched_set_qry->fetch_all(MYSQLI_ASSOC), 'meta_value', 'meta_field');
$max_bookings_per_day = $sched_set['max_bookings_per_day'];
$sched_json = json_encode($sched_arr);
?>
<script>
    function getWeekdayDesc(weekdayNum) {
        if (weekdayNum == 0)
            return 'Sunday';
        else if (weekdayNum == 1)
            return 'Monday';
        else if (weekdayNum == 2)
            return 'Tuesday';
        else if (weekdayNum == 3)
            return 'Wednesday';
        else if (weekdayNum == 4)
            return 'Thursday';
        else if (weekdayNum == 5)
            return 'Friday';
        else if (weekdayNum == 6)
            return 'Saturday';
    }
    $(function() {
        function getBookedSlots(momentDate) {
            momentDate = moment(momentDate);
            var scheds = scheds_by_date[momentDate.dayOfYear()];
            if (scheds)
                return scheds.length;
            return 0;
        }

        var max_bookings_per_day = <?php echo $max_bookings_per_day; ?>;
        $('.select2').select2()
        var Calendar = FullCalendar.Calendar;
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()
        var scheds = $.parseJSON('<?php echo ($sched_json) ?>');
        var openDays = [
            <?php
            foreach (explode(',', $sched_set['day_schedule']) as $v) {
                echo "'$v',";
            }
            ?>
            ];
        var scheds_by_date = {};
        console.log(scheds);
        scheds.forEach(sched => {
            var _date = moment(sched.date_sched).dayOfYear();
            if (scheds_by_date[_date] === undefined) {
                scheds_by_date[_date] = [];
            }
            scheds_by_date[_date].push(sched);
        });

        var calendarEl = document.getElementById('calendar');

        var calendar = new Calendar(calendarEl, {
            initialView: "dayGridMonth",
            headerToolbar: {
                right: "dayGridWeek,dayGridMonth,listDay prev,next"
            },
            buttonText: {
                dayGridWeek: "Week",
                dayGridMonth: "Month",
                listDay: "Day",
                listWeek: "Week",
            },
            themeSystem: 'bootstrap',
            //Random default events
            events: function(event, successCallback) {
                var days = moment(event.end).diff(moment(event.start), 'days')
                var events = []
                Object.keys(scheds).map(k => {
                    var bg = 'var(--primary)';
                    if (scheds[k].status == 0)
                        bg = 'var(--primary)';
                    if (scheds[k].status == 1)
                        bg = 'var(--success)';
                    if (scheds[k].status == 2)
                        bg = 'var(--danger)';
                    console.log(bg)
                    events.push({
                        id: scheds[k].appointment_id,
                        title: scheds[k].name,
                        start: moment(scheds[k].date_sched).format('YYYY-MM-DD[T]HH:mm'),
                        backgroundColor: bg,
                        borderColor: bg,
                    });
                })
                var day = moment(event.start);
                console.log(days);
                console.log(-day.diff(moment(event.end), 'days'));
                var bg = 'var(--primary)';
                for (day = moment(event.start); - day.diff(moment(event.end), 'days') > 1; day.add(1, 'days')) {
                    var max = max_bookings_per_day;
                    if (!openDays.includes(getWeekdayDesc(day.day())))
                        max = 0;
                    var open_slots = max - getBookedSlots(day);
                    events.push({
                        id: 'slots',
                        title: 'Open Slots: ' + open_slots +'/'+ max,
                        start: day.format('YYYY-MM-DD[T]HH:mm'),
                    })
                    console.log('event')
                }
                console.log(events)
                successCallback(events)

            },
            eventClick: (info) => {
                if (info.event.id == 'slots')
                    return;
                uni_modal("Appointment Details", "appointments/view_details.php?id=" + info.event.id)
            },
            eventClassNames: (info) => {
                if (info.event.id == 'slots') {
                    return 'total_slots';
                }
                return '';
            },
            editable: false,
            selectable: true,
            selectAllow: function(select) {
                console.log(moment(select.start).format('dddd'))
                if (moment().subtract(1, 'day').diff(select.start) < 0 && (moment(select.start).format('dddd') != 'Saturday' && moment(select.start).format('dddd') != 'Sunday'))
                    return true;
                else
                    return false;
            }
        });

        calendar.render();
        // $('#calendar').fullCalendar()
        $('#location').change(function() {
            location.href = "./?lid=" + $(this).val();
        })
    })
</script>
