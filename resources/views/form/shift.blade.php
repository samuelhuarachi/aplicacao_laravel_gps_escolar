<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label class="control-label" for="nameInput">Título</label>
            {!! Form::text('name', null, 
                array('class' => 'form-control', 'id' => 'nameInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="activeInput">Ativo?</label>
            {!! Form::checkbox('active', null, null) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="annotationInput">Anotações</label>
            {!! Form::textarea('annotation', null, array('rows' => '3', 'class' => 'form-control', 'id' => 'annotationInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="startInput">Início</label>
            {!! Form::text('start_at', null, 
                array('class' => 'form-control time', 'id' => 'startInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="finishInput">Fim</label>
            {!! Form::text('finish_at', null, 
                array('class' => 'form-control time', 'id' => 'finishInput')) !!}
        </div>
        
        <button type="submit" class="btn btn-primary">ADICIONAR NOVO</button>
    </div>
</div>