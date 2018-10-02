<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label class="control-label" for="usernameInput">Username</label>
            {!! Form::text('username', null, 
                array('class' => 'form-control', 'id' => 'usernameInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="emailInput">E-mail</label>
            {!! Form::email('email', null, 
                array('class' => 'form-control', 'id' => 'emailInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="passwordInput">Senha</label>
            {!! Form::password('password',
                array('class' => 'form-control', 'id' => 'passwordInput')) !!}
        </div>
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
            <label class="control-label" for="ageInput">Idade</label>
            {!! Form::number('age', null, 
                array('class' => 'form-control', 'id' => 'ageInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="genderInput">Sexo</label>
            {!! Form::select('gender', ['Masculino' => 'Masculino', 'Feminino' => 'Feminino'], 'Masculino',['id' => 'genderInput', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="phoneInput">Telefone</label>
            {!! Form::text('phone', null, 
                array('class' => 'form-control', 'id' => 'phoneInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="cellPhoneInput">Celular</label>
            {!! Form::text('cell_phone', null, 
                array('class' => 'form-control', 'id' => 'cellPhoneInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="streetInput">Rua</label>
            {!! Form::text('street', null, 
                array('class' => 'form-control', 'id' => 'streetInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="complementInput">Complemento</label>
            {!! Form::text('complement', null, 
                array('class' => 'form-control', 'id' => 'complementInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="numberInput">Número</label>
            {!! Form::text('number', null, 
                array('class' => 'form-control', 'id' => 'numberInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="neighborhoodInput">Bairro</label>
            {!! Form::text('neighborhood', null, 
                array('class' => 'form-control', 'id' => 'neighborhoodInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="zipcodeInput">CEP</label>
            {!! Form::text('zipcode', null, 
                array('class' => 'form-control', 'id' => 'zipcodeInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="cityInput">Cidade</label>
            {!! Form::text('city', null, 
                array('class' => 'form-control', 'id' => 'cityInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="stateInput">Estado</label>
            {!! Form::text('state', null, 
                array('class' => 'form-control', 'id' => 'stateInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="fathersFirstnameInput">Nome Pai</label>
            {!! Form::text('fathers_firstname', null, 
                array('class' => 'form-control', 'id' => 'fathersFirstnameInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="fathersLastnameInput">Sobrenome Pai</label>
            {!! Form::text('fathers_lastname', null, 
                array('class' => 'form-control', 'id' => 'fathersLastnameInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="fathersPhoneInput">Telefone Pai</label>
            {!! Form::text('fathers_phone', null, 
                array('class' => 'form-control', 'id' => 'fathersPhoneInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="fathersCellPhoneInput">Celular Pai</label>
            {!! Form::text('fathers_cell_phone', null, 
                array('class' => 'form-control', 'id' => 'fathersCellPhoneInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="mothersFirstnameInput">Nome Mãe</label>
            {!! Form::text('mothers_firstname', null, 
                array('class' => 'form-control', 'id' => 'mothersFirstnameInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="mothersLastnameInput">Sobrenome Mãe</label>
            {!! Form::text('mothers_lastname', null, 
                array('class' => 'form-control', 'id' => 'mothersLastnameInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="mothersPhoneInput">Telefone Mãe</label>
            {!! Form::text('mothers_phone', null, 
                array('class' => 'form-control', 'id' => 'mothersPhoneInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="mothersCellPhoneInput">Celular Mãe</label>
            {!! Form::text('mothers_cell_phone', null, 
                array('class' => 'form-control', 'id' => 'mothersCellPhoneInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="otherFirstnameInput">Outros Nome</label>
            {!! Form::text('other_firstname', null, 
                array('class' => 'form-control', 'id' => 'otherFirstnameInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="otherLastnameInput">Outros Sobrenome</label>
            {!! Form::text('other_lastname', null, 
                array('class' => 'form-control', 'id' => 'otherLastnameInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="otherPhoneInput">Outros Telefone</label>
            {!! Form::text('other_phone', null, 
                array('class' => 'form-control', 'id' => 'otherPhoneInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="otherCellPhoneInput">Outros Celular</label>
            {!! Form::text('other_cell_phone', null, 
                array('class' => 'form-control', 'id' => 'otherCellPhoneInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="latInput">Latitude</label>
            {!! Form::text('lat', null, 
                array('class' => 'form-control', 'id' => 'latInput')) !!}
        </div>
        <div class="form-group">
            <label class="control-label" for="lngInput">Longitude</label>
            {!! Form::text('lng', null, 
                array('class' => 'form-control', 'id' => 'lngInput')) !!}
        </div>

        <button type="submit" class="btn btn-primary">ADICIONAR NOVO</button>
    </div>
</div>