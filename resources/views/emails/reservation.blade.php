Hi,{{ $mailParams['user']['name'] }}

This is an e-mail notifying you of the completion of reservation for the class below.
-----------------
Lesson Name: {{ $mailParams['lesson']['lesson_name'] }}
Schedule: {{ date('Y-m-d', strtotime($mailParams['lesson']['start_date'])) }}  {{ config("const.TIME.". $mailParams['lesson']['start_time']) }}
About Lesson: {{ $mailParams['lesson']['content']  }}
-----------------

I hope you have a good time!