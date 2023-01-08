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
                    </div>
                    <div class="article-title">
                      {{ Form::label('title', 'Title', ['class' => '']) }}
                      {{ Form::text('schedule[title]', null, [
                        'class' => 'form-control' . ($errors->has('schedule.title') ? ' is-invalid' : ''),
                        'required'
                      ]) }}
                    </div>
                    <div class="article-content">
                      {{ Form::label('content', 'Content', ['class' => '']) }}
                      {{ Form::textarea('schedule[content]', null, [
                        'class' => 'form-control' . ($errors->has('schedule.content') ? ' is-invalid' : ''),
                        'required'
                      ]) }}
                    </div>
                    <div class="article-content">
                      {{ Form::label('content', 'Content', ['class' => '']) }}
                      {{ Form::textarea('schedule[content]', null, [
                        'class' => 'form-control' . ($errors->has('schedule.content') ? ' is-invalid' : ''),
                        'required'
                      ]) }}
                    </div>
                    <div class="article-user">
                      <div class="article-user-details">
                        <div class="user-detail-name">
                          <span class="teacher"></span>
                        </div>
                        <div class="text-job profile"></div>
                      </div>
                    </div>
                  </div>
                </article>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                <button type="button" class="btn btn-primary take">受講する</button>
            </div>
        </div>
  </div>
</div>