<!DOCTYPE html>
<html>

<head>
<style>

/*************************** Calendar Top Navigation **************************/
#calendar {
  margin: 0px auto;
  padding: 0px;
  width: 602px;
  font-family: Helvetica, "Times New Roman", Times, serif;
}
#calendar .calendar_box {
  position: relative;
  top: 0px;
  left: 0px;
  width: 100%;
  height: 40px;
  background-color: #787878;
}
#calendar .calendar_header {
  line-height: 40px;  
  vertical-align: middle;
  position: absolute;
  left: 11px;
  top: 0px;
  width: 582px;
  height: 40px;
  text-align: center;
}
#calendar .calendar_header .calendar_prev, #calendar .calendar_header .calendar_next {
  position: absolute;
  top: 0px;
  height: 17px;
  display: block;
  cursor: pointer;
  text-decoration: none;
  color: #FFF;
}
#calendar .calendar_header .calendar_title {
  color: #FFF;
  font-size: 18px;
}
#calendar .calendar_header .calendar_prev {
  left: 0px;
}
#calendar .calendar_header .calendar_next {
  right: 0px;
}
/*************************** Calendar Content Cells ***************************/
#calendar .calendar_content {
  border: 1px solid #787878;
  border-top: none;
}
#calendar .calendar_label {
  float: left;
  margin: 0px;
  padding: 0px;
  margin-top: 5px;
  margin-left: 5px;
}
#calendar .calendar_label .calendar_names {
  margin: 0px;
  padding: 0px;
  margin-right: 5px;
  float: left;
  list-style-type: none;
  width: 80px;
  height: 40px;
  line-height: 40px;
  vertical-align: middle;
  text-align: center;
  color: #000;
  font-size: 15px;
  background-color: transparent;
}
#calendar .calendar_dates {
  float: left;
  margin: 0px;
  padding: 0px;
  margin-left: 5px;
  margin-bottom: 5px;
}
/** overall width = width+padding-right **/
#calendar .calendar_dates .calendar_names, #calendar .calendar_dates .calendar_days, #calendar .calendar_dates .calendar_today {
  margin: 0px;
  padding: 0px;
  margin-right: 5px;
  margin-top: 5px;
  line-height: 80px;
  vertical-align: middle;
  float: left;
  list-style-type: none;
  width: 80px;
  height: 80px;
  font-size: 25px;
  background-color: #DDD;
  color: #000;
  text-align: center;
}
#calendar .calendar_dates .calendar_today {
  background-color: #CC6699;
}
:focus {
  outline: none;
}
.calendar_clear {
  clear: both;
}
/****/
header {
    background-color:blue;
    color:white;
    text-align:center;
    padding:5px;	 
}

section {
    background-color:lightgray;

    padding:10px;	 	 
}
footer {
    background-color:blue;
    color:white;
    clear:both;
    text-align:center;
    padding:150px;	 	 
}
/*----- Tabs -----*/
.tabs {
    background-color:lightgrey;
    width:100%;
    display:inline-block;
}
 
    /*----- Tab Links -----*/
    /* Clearfix */
    .tab-links:after {
    	
        display:block;
        clear:both;
        content:'';
    }
 
    .tab-links li {
    	background-color:lightgrey;
        margin:0px 5px;
        float:left;
        list-style:none;
    }
 
        .tab-links a {
            padding:9px 15px;
            display:inline-block;
            border-radius:3px 3px 0px 0px;
            background:lightgrey;
            font-size:16px;
            font-weight:600;
            color:blue;
            transition:all linear 0.15s;
        }
 
        .tab-links a:hover {
            background:#a7cce5;
            text-decoration:none;
        }
 
    li.active a, li.active a:hover {
        background:lightgrey;
        color:#4c4c4c;
    }
 
    /*----- Content of Tabs -----*/
    .tab-content {
        padding:15px;
        border-radius:3px;
        box-shadow:-1px 1px 1px rgba(0,0,0,0.15);
        background:lightgrey;
    }
 
        .tab {
            display:none;
        }
 
        .tab.active {
            display:block;
        }
</style>
</head>

<body>

<header>
<h1>TUTOR CENTER</h1>

</header>
<div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#Home">HOME</a></li>
        <li><a href="#Students">STUDENTS</a></li>
        <li><a href="#Tutor">TUTORS</a></li>
        <li><a href="#Schedule">SCHEDULE</a></li>
        <li><a href="#Settings">SETTINGS</a></li>
    </ul>
 
    <div class="tab-content">
        <div id="Home" class="tab active">
            <p></p>
            <p></p>
            <section>
				<h1>Schedule</h1>

				<p> Calendar </p>
				<?php
  
  class Calendar {
    /**
    ** Constructor
    **/
    public function __construct() {
      $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }
    /********************* PROPERTY ********************/
    private $dayLabels = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
    private $currentYear = 0;
    private $currentMonth = 0;
    private $currentDay = 0;
    private $currentDate = null;
    private $daysInMonth = 0;
    private $naviHref = null;
    /********************* PUBLIC **********************/
    /**
    ** print out the calendar
    **/
    public function show() {
      $year = null;
      $month = null;
      if (null == $year && isset($_GET['year'])) {
        $year = $_GET['year'];
      } elseif (null == $year) {
        $year = date("Y", time());
      }
      if (null == $month && isset($_GET['month'])) {
        $month = $_GET['month'];
      } elseif (null == $month) {
        $month = date("m", time());
      }
      $this->currentYear = $year;
      $this->currentMonth = $month;
      $this->daysInMonth = $this->_daysInMonth($month, $year);
      $content = '<div id="calendar">' . "\r\n" . '<div class="calendar_box">' . "\r\n" . $this->_createNavi() . "\r\n" . '</div>' . "\r\n" . '<div class="calendar_content">' . "\r\n" . '<ul class="calendar_label">' . "\r\n" . $this->_createLabels() . '</ul>' . "\r\n";
      $content .= '<div class="calendar_clear"></div>' . "\r\n";
      $content .= '<ul class="calendar_dates">' . "\r\n";
      $weeksInMonth = $this->_weeksInMonth($month, $year);
      // Create weeks in a month
      for ($i = 0; $i < $weeksInMonth; $i++) {
        //Create days in a week
        for ($j = 1; $j <= 7; $j++) {
          $content .= $this->_showDay($i * 7 + $j);
        }
      }
      $content .= '</ul>' . "\r\n";
      $content .= '<div class="calendar_clear"></div>' . "\r\n";
      $content .= '</div>' . "\r\n";
      $content .= '</div>' . "\r\n";
      return $content;
    }
    /********************* PRIVATE **********************/ 
    /**
    ** create the li element for ul
    **/
    private function _showDay($cellNumber) {
      if ($this->currentDay == 0) {
        $firstDayOfTheWeek = date('N', strtotime($this->currentYear . '-' . $this->currentMonth . '-01'));
        if (intval($cellNumber) == intval($firstDayOfTheWeek)) {
          $this->currentDay = 1;
        }
      }
      if (($this->currentDay != 0) && ($this->currentDay <= $this->daysInMonth)) {
        $this->currentDate = date('Y-m-d', strtotime($this->currentYear . '-' . $this->currentMonth . '-' . ($this->currentDay)));
        $cellContent = $this->currentDay;
        $this->currentDay++;
      } else {
        $this->currentDate = null;
        $cellContent = null;
      }
      $today_day = date("d");
      $today_mon = date("m");
      $today_yea = date("Y");
      $class_day = ($cellContent == $today_day && $this->currentMonth == $today_mon && $this->currentYear == $today_yea ? "calendar_today" : "calendar_days");
      return '<li class="' . $class_day . '">' . $cellContent . '</li>' . "\r\n";
    }
    /**
    ** create navigation
    **/
    private function _createNavi() {
      $nextMonth = $this->currentMonth == 12 ? 1 : intval($this->currentMonth)+1;
      $nextYear = $this->currentMonth == 12 ? intval($this->currentYear)+1 : $this->currentYear;
      $preMonth = $this->currentMonth == 1 ? 12 : intval($this->currentMonth)-1;
      $preYear = $this->currentMonth == 1 ? intval($this->currentYear)-1 : $this->currentYear;
      return '<div class="calendar_header">' . "\r\n" . '<a class="calendar_prev" href="' . $this->naviHref . '?month=' . sprintf('%02d', $preMonth) . '&amp;year=' . $preYear.'">Prev</a>' . "\r\n" . '<span class="calendar_title">' . date('Y M', strtotime($this->currentYear . '-' . $this->currentMonth . '-1')) . '</span>' . "\r\n" . '<a class="calendar_next" href="' . $this->naviHref . '?month=' . sprintf("%02d", $nextMonth) . '&amp;year=' . $nextYear . '">Next</a>' . "\r\n"  . '</div>';
    }
    /**
    ** create calendar week labels
    **/
    private function _createLabels() {
      $content = '';
      foreach ($this->dayLabels as $index => $label) {
        $content .= '<li class="calendar_names">' . $label.'</li>' . "\r\n";
      }
      return $content;
    }
    /**
    ** calculate number of weeks in a particular month
    **/
    private function _weeksInMonth($month = null, $year = null) {
      if (null == ($year)) {
        $year = date("Y", time());
      }
      if (null == ($month)) {
        $month = date("m", time());
      }
      // find number of days in this month
      $daysInMonths = $this->_daysInMonth($month, $year);
      $numOfweeks = ($daysInMonths % 7 == 0 ? 0 : 1) + intval($daysInMonths / 7);
      $monthEndingDay = date('N',strtotime($year . '-' . $month . '-' . $daysInMonths));
      $monthStartDay = date('N',strtotime($year . '-' . $month . '-01'));
      if ($monthEndingDay < $monthStartDay) {
        $numOfweeks++;
      }
      return $numOfweeks;
    }
    /**
    ** calculate number of days in a particular month
    **/
    private function _daysInMonth($month = null, $year = null) {
      if (null == ($year)) $year = date("Y",time());
      if (null == ($month)) $month = date("m",time());
      return date('t', strtotime($year . '-' . $month . '-01'));
    }
  }
  $calendar = new Calendar();
  echo $calendar->show();
?>

			</section>
        </div>
 
        <div id="Students" class="tab">
            <p>Tab #2 content goes here!</p>
            <p></p>
        </div>
        
        <div id="Tutors" class="tab">
            <p>Tab #2 content goes here!</p>
            <p></p>
        </div>
 
        <div id="Schedule" class="tab">
            <p>Tab #3 content goes here!</p>
            <p></p>
        </div>
 
        <div id="Settings" class="tab">
            <p>Tab #4 content goes here!</p>
            <p></p>
        </div>
    </div>
</div>





<footer>


</footer>

</body>
</html>
