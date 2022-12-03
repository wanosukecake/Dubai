<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Search</h4>
            </div>
            <div class="row">
                <div class="card-body col-12 col-md-12 col-lg-6">
                    <div class="form-group">
                        {{ Form::label('lesson_name', 'Lesson Name') }}
                        {{ Form::text('lesson_name', isset($param['lesson_name'])? $param['lesson_name'] : null,
                            ['class' => 'form-control'])
                        }}
                    </div>
                </div>
                <div class="card-body col-12 col-md-12 col-lg-6">
                    <div class="form-group">
                        {{ Form::label('teacher_name', 'Teacher Name') }}
                        {{ Form::text('teacher_name', isset($param['teacher_name'])? $param['teacher_name'] : null,
                            ['class' => 'form-control']) 
                        }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card-body col-12 col-md-12 col-lg-3">
                    <div class="form-group">
                        {{ Form::label('start_date', 'Start Date') }}
                        {{ Form::text('start_date', isset($param['start_date'])? $param['start_date'] : null,
                            ['class' => 'form-control datepicker'])
                        }}
                    </div>
                </div>
                <div class="card-body col-12 col-md-12 col-lg-8">
                    <div class="form-group">
                        {{ Form::label('categories', 'Categories', ['class' => ''])}}
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                {{ Form::checkbox('categories[]', '1', isset($param['categories']) && in_array('1', $param['categories'])? true : false, ['class'=>'selectgroup-input'])}}
                                <span class="selectgroup-button">DANCE</span>
                            </label>
                            <label class="selectgroup-item">
                                {{ Form::checkbox('categories[]', '2', isset($param['categories']) && in_array('2',$param['categories'])? true : false, ['class'=>'selectgroup-input'])}}
                                <span class="selectgroup-button">PROGRAMING</span>
                            </label>
                            <label class="selectgroup-item">
                                {{ Form::checkbox('categories[]', '3', isset($param['categories']) && in_array('3', $param['categories'])? true : false, ['class'=>'selectgroup-input'])}}
                                <span class="selectgroup-button">ACT</span>
                            </label>
                            <label class="selectgroup-item">
                                {{ Form::checkbox('categories[]', '4', isset($param['categories']) && in_array('4', $param['categories'])? true : false, ['class'=>'selectgroup-input'])}}
                                <span class="selectgroup-button">WADAIKO</span>
                            </label>
                            <label class="selectgroup-item">
                                {{ Form::checkbox('categories[]', '5', isset($param['categories']) && in_array('5', $param['categories'])? true : false, ['class'=>'selectgroup-input'])}}
                                <span class="selectgroup-button">VOCAL</span>
                            </label>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card-body col-12 col-md-12 col-lg-8">
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary search-button">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>