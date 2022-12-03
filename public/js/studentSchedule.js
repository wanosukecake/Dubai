"use strict";

document.addEventListener('DOMContentLoaded', function() {
    let Calendar = FullCalendar.Calendar;
    let calendarEl = document.getElementById('calendar'); 
     // initialize the calendar
    let calendar = new Calendar(calendarEl, {
         plugins: [ 'interaction', 'dayGrid', 'timeGrid','list' ],
         header: {
           left: 'prev,next today',
           center: 'title',
           right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
         },
         allDaySlot: false,
         forceEventDuration : true,
         eventColor: 'lavender',
         defaultTimedEventDuration: '01:00',
         defaultView: 'dayGridMonth',
         slotDuration: '00:10:00',
         minTime : '10:00',
         maxTime : '22:10',
         locale : 'jaLocale',
         editable: true,
         selectable: true,
         allDaySlot: false,
         droppable: true, // this allows things to be dropped onto the calendar
         buttonText: {
            today:'today',
            month:'month',
            week: 'week',
            day:  'day',
            list: 'list'
         },
         eventSources: [
            '/schedule/get-schedules',
         ],
         select: function (info) {
             // カレンダーセルクリック、範囲指定された時のコールバック
             console.log('select');
         },
         eventClick: function(info) {
            //　授業詳細と予約のポップアップ
            // TODO:デフォルト以外の項目はextendedPropsから取得する。
            // スケジュールに登録された情報を表示したポップアップを表示し、
            // 登録ボタンを押下するとajaxでDBに飛ぶ処理を作る。
            $('.title').text(info.event.title)
            $('.teacher').text(info.event.extendedProps.teacher)
            $('.description').text(info.event.extendedProps.description)
            $('.profile').text(info.event.extendedProps.profile)
            $('#calendarModal').modal();
         },
         eventReceive: function(info) {
             // イベントがexternal-eventからドロップされた時のコールバック
             console.log('eventReceive');
         },
 
         eventDrop: function(info) {
             // イベントがドロップされた時のコールバック
             console.log('eventDrop');
         },
 
         eventResize: function(info) {
             // イベントがリサイズ（引っ張ったり縮めたり）された時のコールバック
             console.log('eventResize');
         },
 
        //  eventRender: function (info) {
        //    //wired listener to handle click counts instead of event type
        //    info.el.addEventListener('click', function() {
        //      clickCnt++;
        //      if (clickCnt === 1) {
        //          oneClickTimer = setTimeout(function() {
        //              clickCnt = 0;
 
        //              // SINGLE CLICK
        //              console.log('single click');
 
        //          }, 400);
        //      } else if (clickCnt === 2) {
        //          clearTimeout(oneClickTimer);
        //          clickCnt = 0;
 
        //          // DOUBLE CLICK
        //          console.log('double click');
        //      }
        //    });
        //  },
     })
   calendar.render();
   let doneFunc = function (response) {
    console.log(response)
   };
   $('.take').click(function() {
        let data = 'a';
        let url = '/schedule/save-student-schedule';
        $(this).ajaxRequest(doneFunc, data, url, 'post')
    });

 });