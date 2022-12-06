<x-layout>
    <x-slot:btn>
        <a href="{{route('tasks.create')}}" class="btn btn-primary">Criar Tarefa</a>
        <a href="{{route('logout')}}" class="btn btn-primary">Sair</a>
    </x-slot:btn>
        <section class="graph">
            <div class="graph_header">
                <h2>Progresso do dia</h2>
                <div class="graph_header-line"></div>
                <div class="graph_header-date">
                    <a href="{{route('home',['date'=>$date_prev_button])}}"><img src="/assets/images/icon-prev.png" alt="data previa"></a>
                    {{$date_as_string}}
                    <a href="{{route('home',['date'=>$date_next_button])}}"><img src="/assets/images/icon-next.png" alt="proxima data"></a>
                </div>
            </div>
            <div class="graph_header-subtitle">Tarefas: <strong>{{$tasks_count}}/{{$undone_tasks_count}}</strong></div>
            <div class="graph-placeholder"></div>
            <div class="tasks_left_footer">
                <img src="/assets/images/icon-info.png" alt="informação">
                Restam {{$undone_tasks_count}} tarefas a serem realizadas
            </div>
        </section>
        <section class="list">
            <div class="list_header">
                <select class="list_header-select" onChange="changeTaskStatusFilter(this)">
                    <option value="all_task">Todas as tarefas</option>
                    <option value="task_pending">Tarefas pendentes</option>
                    <option value="task_done">Tarefas realizadas</option>
                </select>
            </div>
            <div class="task_list">
                @foreach($tasks as $task)
                 <x-task :data=$task/>
                @endforeach
            </div>
        </section>

    <script>
        function changeTaskStatusFilter(e) {
            
            if(e.value =='task_pending'){
                showAllTasks();
                document.querySelectorAll('.task_done').forEach(function(element){
                    element.style.display = 'none';
                })
            } else if (e.value == 'task_done'){
                showAllTasks();
                document.querySelectorAll('.task_pending').forEach(function(element){
                    element.style.display = 'none';
                })
            } else {
                showAllTasks();
            }
        }

        function showAllTasks() {
            document.querySelectorAll('.task').forEach(function(element){
                    element.style.display = 'block';
                })
        }
    </script>
    <script>
        async function taskUpdate(element) {
            let status = element.checked;
            let taskId = element.dataset.id;
            let url = '{{route('task.update')}}';
            let rawResult = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json',
                    'accept': 'application/json'
                },
                body: JSON.stringify({status, taskId, _token: '{{ csrf_token() }}'})
            });
            result = await rawResult.json();
            if(!result.success){
                element.checked = !status;
                alert('Falha na atualização!');
            }
        }
    </script>
</x-layout>