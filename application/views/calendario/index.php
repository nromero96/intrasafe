<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Calendar</title>
    <link href="https://code.jquery.com/ui/1.12.1/themes/cupertino/jquery-ui.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet"
    	href="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.min.css">
    
    <script type="text/javascript" 
  		  src="<?php echo base_url(); ?>assets/fullcalendar/lib/moment.min.js"></script>

   <script type="text/javascript" 
  		  src="<?php echo base_url(); ?>assets/fullcalendar/lib/jquery.min.js"></script>
  		  	
    <script type="text/javascript" 
  		  src="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.min.js"></script>

    <script>
  	$(document).ready(function() {

    $('#calendar').fullCalendar({

      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
themeSystem: 'jquery-ui',
      nowIndicator:true,
	  defaultDate: moment().format('YYYY-MM-DD'),
      defaultView: 'agendaWeek',
      titleFormat: 'DD MMMM YYYY',
      navLinks: false, 
      editable: false,
      slotEventOverlap : false,
      allDaySlot: false,
      minTime: "08:00:00",
      dayNames:['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'], 
	  monthNames:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
	  buttonText:
              {
                  prev:     ' Anterior ',
                  next:     ' Siguiente ',
                  prevYear: ' &lt;&lt; ',
                  nextYear: ' &gt;&gt; ',
                  today:    'hoy',
                  month:    'mes',
                  week:     'semana',
                  day:      'día'
              },					
	  columnFormat: 'dddd D',
      eventLimit: true, // allow "more" link when too many events
      events: 'http://intranet.safesi.com/CalendarController/getCalendar'
    });

  });
  </script>
  </head>
  <body>
  	<div id="calendar"></div>
  </body>
</html>
