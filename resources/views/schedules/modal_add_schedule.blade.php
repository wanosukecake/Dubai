<div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4><div class="modal-title" id="myModalLabel">Would you like to register your schedule?</div></h4>
            </div>
            <div class="modal-body">
                <article class="article article-style-c">
                  <div class="article-header">
                    <div class="article-image" data-background="{{asset('storage/avatar-1.png')}}">
                    </div>
                  </div>
                  <div class="article-details">
                    <div class="article-date">
                      {{ Form::label('date', 'Date', ['class' => '']) }}
                      {{ Form::label('date', 'Date', ['class' => 'date-schedule article-br']) }}
                      {{ Form::hidden('date', '', ['class' => 'date-schedule-yyyymmdd']) }}
                    </div>
                    <div class="article-title">
                      {{ Form::label('title', 'Title', ['class' => '']) }}
                      {{ Form::text('schedule[title]', null, [
                        'class' => 'form-control' . ($errors->has('schedule.title') ? ' is-invalid' : ''),
                        'required'
                      ]) }}
                    </div>
                    <div class="article-time">
                      {{ Form::label('time', 'StartTime', ['class' => '']) }}
                      {{ Form::select(
                          'schedule[time]',
                          config('const.TIME'),
                          null,
                          [
                            'class' => 'form-control' . ($errors->has('schedule.time') ? ' is-invalid' : ''),
                            'placeholder'=>'選択',
                            'required'
                          ]
                         )
                      }}
                    </div>
                    <div class="article-content">
                      {{ Form::label('content', 'Content', ['class' => '']) }}
                      {{ Form::textarea('schedule[content]', null, [
                        'class' => 'form-control' . ($errors->has('schedule.content') ? ' is-invalid' : ''),
                        'required'
                      ]) }}
                    </div>
                  </div>
                </article>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                <button type="button" class="btn btn-primary add">Add Schedule</button>
            </div>
        </div>
  </div>
</div>