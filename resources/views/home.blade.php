<x-layout>
    <x-slot:btn>
        <a href="#" class="btn btn-primary">Criar Tarefa</a>
    </x-slot:btn>
        <section class="graph">
            <div class="graph_header">
                <h2>Progresso do dia</h2>
                <div class="graph_header-line"></div>
                <div class="graph_header-date">
                    <img src="/assets/images/icon-prev.png" alt="data previa">
                    13 de Dez
                    <img src="/assets/images/icon-next.png" alt="proxima data">
                </div>
            </div>
            <div class="graph_header-subtitle">Tarefas: <strong>3/6</strong></div>
            <div class="graph-placeholder"></div>
            <div class="tasks_left_footer">
                <img src="/assets/images/icon-info.png" alt="informação">
                Restam 3 tarefas a serem realizadas
            </div>
        </section>
        <section class="list">
            <div class="list_header">
                <select class="list_header-select">
                    <option value="1">Todas as tarefas</option>
                </select>
            </div>
            <div class="task_list">
                @php
                    $tasks =[
                        ['done'=>false,'title'=>'Minha primeira tarefa','category'=>'Categoria 1'],
                        ['done'=>true,'title'=>'Minha segunda tarefa','category'=>'Categoria 2'],
                        ['done'=>false,'title'=>'Minha terceira tarefa','category'=>'Categoria 1'],    
                    ]
                @endphp
                <x-task :data=$tasks[0]/>
                <x-task :data=$tasks[1]/>
                <x-task :data=$tasks[2]/>
            </div>
        </section>

</x-layout>