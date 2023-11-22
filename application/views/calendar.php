<!DOCTYPE html>
<html lang="en">

<head>
    <title>Simple Calendar</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
</head>

<body>
    <h2><span style="color:blue; font-size:22px"> Calendar By </span><span style="font-weight:bold"> Bhoopendra Singh Dollop</span></h2>
    <div style="padding:1px">
        <select name="year" id="year">
            <!-- <option value="">Year</option> -->
            <?php for ($i = 1900; $i <= 2099; $i++) { ?>
                <option <?php echo $i == $year ? 'selected' : "" ?> value="<?php echo $i; ?>"><?php echo $i ?></option>
            <?php } ?>
        </select>
        <select name="month" id="month">
            <!-- <option value="">Month</option> -->
            <?php for ($i = 1; $i <= 12; $i++) { ?>
                <option <?php echo $i == $month ? 'selected' : "" ?> value="<?php echo $i; ?>"><?php echo $i ?></option>
            <?php } ?>
        </select>
        <!-- <span>Month</span> -->
        <button onclick="Search();" class="btn btn-primary btn-sm">Search</button>
    </div>
    <div id="calendar">
        <table border="0" cellpadding="4" cellspacing="0">

            <tr>
                <th style="text-align:center; font-size: 20px; cursor: pointer;" onclick="PreviousMonth(<?php echo $year ?>, <?php echo $month ?> );">&lt;&lt;</th>
                <th colspan="5" style="text-align:center; font-size: 20px;"><?php echo $monthName; ?>&nbsp;<?php echo $year; ?></th>
                <th style="text-align:center; font-size: 20px; cursor: pointer;" onclick="NextMonth(<?php echo $year ?>, <?php echo $month ?> );">&gt;&gt;</th>
            </tr>

            <tr>
                <td style="color:red">Sun</td>
                <td>Mon</td>
                <td>Tue</td>
                <td>Wed</td>
                <td>Thu</td>
                <td>Fri</td>
                <td>Sat</td>
            </tr>
            <tr>
                <?php
                for ($i = 0; $i < $startDay; $i++) {
                    echo '<td></td>';
                }

                for ($day = 1; $day <= $daysInMonth; $day++) {
                    $evntName = '';
                    if ($events != '') {
                        foreach ($events as $key => $event) {
                            if ($event['day'] == $day) {
                                $evntName .= $event['event'] . ' ';
                            }
                        }
                    }
                    if ($evntName != "") {
                        echo '<td style="color:red; font-weight:bold; word-wrap: break-word; width:200px;">' . $day . '<br>' . $evntName . '</td>';
                    } else {
                        echo '<td class="day">' . $evntName . $day . '</td>';
                    }

                    if (($i + $day) % 7 == 0) {
                        echo '<tr></tr>';
                    }
                }

                ?>

            </tr>

            <tr>

            </tr>

        </table>
    </div>

</body>

</html>

<script>
    function PreviousMonth(getYear, getMonth) {
        // alert();
        var month = getMonth;
        var year = getYear;
        if (getMonth == 1) {
            month = 12;
            year = getYear - 1;
        } else {
            month = getMonth - 1;
        }
        window.location.href = "<?php echo base_url(); ?>index.php/Calendar/calendar/" + year + '/' + month;
    }

    function NextMonth(getYear, getMonth) {
        // alert();
        var month = getMonth;
        var year = getYear;
        if (getMonth == 12) {
            month = 1;
            year = getYear + 1;
        } else {
            month = getMonth + 1;
        }
        window.location.href = "<?php echo base_url(); ?>index.php/Calendar/calendar/" + year + '/' + month;
    }

    function Search() {
        var e = document.getElementById("year");
        var year = e.options[e.selectedIndex].value;

        var m = document.getElementById("month");
        var month = m.options[m.selectedIndex].value;

        window.location.href = "<?php echo base_url(); ?>index.php/Calendar/calendar/" + year + '/' + month;
    }
</script>