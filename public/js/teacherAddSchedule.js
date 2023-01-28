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
            // '/schedule/get-schedules',
         ],
         select: function (info) {
             // カレンダーセルクリック、範囲指定された時のコールバック
             console.log('select');
             // スケジュール登録ポップアップ
             $('.date-schedule').text(info.start.toDateString())
             $('.date-schedule-yyyymmdd').val(formatDateYyyyMmDd(info.start));
             $('#calendarModal').modal();
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
     })
   calendar.render();

   $('.add').click(function() {
    let doneFunc = function (response) {
        if (!alert('You have completed!')) {
            $('#calendarModal').modal('hide');
        }
    };
    
    let scheduleDate = $('.date-schedule-yyyymmdd').val();
    let scheduleTitle = $('input[name="schedule[title]"]').val();
    let scheduleTime = $('[name="schedule[time]"] option:selected').val();
    let scheduleContent = $('textarea[name="schedule[content]"]').val();
    let scheduleData = {
        'start_date': scheduleDate,
        'lesson_name': scheduleTitle,
        'start_time': scheduleTime,
        'content': scheduleContent
    };

    let url = '/schedule/update';
    $(this).ajaxRequest(doneFunc, scheduleData, url, 'post')
    });
 });