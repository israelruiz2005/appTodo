<x-layout page="AppTodo login">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">Home</a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Editar Tarefa</h1>
        <form method="POST" action="{{route('task.edit_action')}}">
            @csrf
           
            <x-form.text_input name="id" type="hidden" value="{{$task->id}}"/>
            <x-form.checkbox_input 
                name="is_done"
                label="Tarefa finalizada?"
                checked="{{$task->is_done}}"
            />
            <x-form.text_input 
                name="title" 
                label="Titulo da tarefa" 
                placeholder="Digite o titulo da tarefa" 
                required
                value="{{$task->title}}"/>
            <x-form.text_input 
                name="due_date" 
                label="Data de realização" 
                type="datetime-local" 
                value="{{$task->due_date}}"/>
            <x-form.select_input 
                name="category_id" 
                label="Categoria">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                    @if($category->id == $task->category_id)
                            selected
                        @endif
                    >{{$category->title}}</option>
                @endforeach
            </x-form.select_input>
            <x-form.textarea_input 
                name="description" 
                label="Descrição da tarefa" 
                placeholder="Digite uma descrição para a tarefa"
                value="{{$task->description}}"/>
            <x-form.form_button resetTxt="Limpar" submitTxt="Atualizar Tarefa" />
        </form>
    </section>

</x-layout>