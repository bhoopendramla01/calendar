<?php

class Calendar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("calendar");
        $this->load->model("CalendarModel");
    }

    public function calendar()
    {
        $year = date("Y");
        $month = date("m");
        if ($this->uri->segment(3) != "" && $this->uri->segment(4) != "") {
            $year = $this->uri->segment(3);
            $month = $this->uri->segment(4);
        }

        $event = $this->CalendarModel->all($month);
        // print_r($event);
        $data = array();
        foreach ($event as $value) {

            $time = strtotime($value['date']);
            $day = date("d", $time);
            //$data[$value['date']] = $value['event_name'];
            $result = array();
            $result['day'] = $day;
            $result['event'] = $value['event_name'];
            array_push($data, $result);
        };

        $startDay = date("w", strtotime(date($year . '-' . $month . '-01')));
        $totDays = date("t", strtotime(date($year . '-' . $month . '-01')));
        $monthName = date("F", strtotime(date($year . '-' . $month . '-01')));

        if ($data != "") {
            $this->load->view('calendar', array('daysInMonth' => $totDays, 'startDay' => $startDay, 'monthName' => $monthName, 'year' => $year, 'month' => $month, 'events' => $data));
        } else {
            $this->load->view('calendar', array('daysInMonth' => $totDays, 'startDay' => $startDay, 'monthName' => $monthName, 'year' => $year, 'month' => $month));
        }
    }
}
