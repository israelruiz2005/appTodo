<x-layout page="AppTodo login">
    <x-slot:btn>
        <a href="{{route('register')}}" class="btn btn-primary">Registre-se</a>
        <a href="{{route('home')}}" class="btn btn-primary">Home</a>
    </x-slot:btn>
    <section id="task_section">
        <h1>Faça o login</h1>
            @if($errors->any())
                <ul class="alert alert-error">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{route('user.login_action')}}">
                @csrf

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

                <x-form.form_button resetTxt="Limpar" submitTxt="Login" />
        </form> 
    </section>           
</x-layout>