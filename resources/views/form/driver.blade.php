<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label class="control-label" for="nameInput">Nome</label>
            {!! Form::text('name', null, 
                array('class' => 'form-control', 'id' => 'nameInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="lastnameInput">Sobrenome</label>
            {!! Form::text('lastname', null,
                array('class' => 'form-control', 'id' => 'lastnameInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="rgInput">RG</label>
            {!! Form::text('rg', null,
                array('class' => 'form-control', 'id' => 'rgInput')) !!}
        </div>
        <br>
        <br>
        <p>O usuário e senha abaixo, serão utilizados para fazer o login no aplicativo.</p>
        <div class="form-group">
            <label class="control-label" for="usernameInput">Username</label>
            {!! Form::text('username', null,
                array('class' => 'form-control', 'id' => 'usernameInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="passwordInput">Senha</label>
            {!! Form::password('password',
                array('class' => 'form-control', 'id' => 'passwordInput')) !!}
        </div>
        <button type="submit" class="btn btn-primary">ADICIONAR NOVO</button>
    </div>
</div>