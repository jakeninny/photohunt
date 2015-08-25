@if(count($errors) > 0)
       <div class="alert alert-danger">There were problems with your form. Please fix them.</div>
@endif
     
     <div class="form-group {{ $errors->has('title') ? 'has-error text-danger' : '' }}">
       <label for="title" class="col-sm-2 control-label">Mission Title</label>
       <div class="col-sm-10">
         {!! Form::text('title', $mission->title, ['class' => 'form-control']) !!}
         @include('partials.error-help-block', ['field' => 'title'])
       </div>
     </div>

     <div class="form-group {{ $errors->has('description') ? 'has-error text-danger' : '' }}">
       <label for="description" class="col-sm-2 control-label">Description</label>
       <div class="col-sm-10">
         {!! Form::textarea('description', $mission->description, ['class' => 'form-control', 'rows' => '5']) !!}
         @include('partials.error-help-block', ['field' => 'description'])
       </div>
     </div>

     <div class="form-group {{ $errors->has('image') ? 'has-error text-danger' : '' }}">
       <label for="image" class="col-sm-2 control-label">Answer Image</label>
       <div class="col-sm-10">
         {!! Form::file('image', ['class' => 'form-control', 'rows' => '5']) !!}
         @include('partials.error-help-block', ['field' => 'image'])
       </div>
     </div>