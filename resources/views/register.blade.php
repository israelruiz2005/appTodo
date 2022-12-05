<x-layout page="AppTodo login">
    <x-slot:btn>
        <a href="{{route('login')}}" class="btn btn-primary">Já possui conta faça login</a>
    </x-slot:btn>
    <section id="task_section">
        <h1>Registrar-se</h1>
        @if($errors->any())
            <ul class="alert alert-error">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="{{route('user.register_action')}}">
            @csrf
            <x-form.text_input 
                name="name" 
                label="Nome" 
                placeholder="Digite seu nome" 
                required
            />
            <x-form.text_input 
                name="email"
                type="email" 
                label="E-mail" 
                placeholder="Digite seu e-mail" 
                required
            />
            <x-form.text_input 
                name="password" 
                type="password"
                label="Senha" 
                placeholder="Digite uma senha" 
                required
            />
            <x-form.text_input 
                name="password_confirmation" 
                type="password"
                label="Redigite sua senha" 
                placeholder="Redigite sua senha" 
                required
            />
                <x-form.form_button resetTxt="Limpar" submitTxt="Registrar-se" />
        </form>
    </section>

</x-layout>