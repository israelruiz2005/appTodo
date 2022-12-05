<x-layout page="AppTodo login">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">Home</a>
    </x-slot:btn>
    <section id="task_section">
        <h1>Criar Tarefa</h1>
        <form method="POST" action="{{route('task.create_action')}}">
            @csrf
            <x-form.text_input name="title" label="Titulo da tarefa" placeholder="Digite o titulo da tarefa" required/>
            <x-form.text_input name="due_date" label="Data de realização" type="datetime-local"/>
            <x-form.select_input name="category_id" label="Categoria">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </x-form.select_input>
            <x-form.textarea_input name="description" label="Descrição da tarefa" placeholder="Digite uma descrição para a tarefa"/>
            <x-form.form_button resetTxt="Limpar" submitTxt="Criar Tarefa" />
        </form>
    </section>
</x-layout>