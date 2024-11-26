@extends('layouts.master')
@push('css')
    <style>
        .action-icon {
            font-size: 1.438rem;
            cursor: pointer;
        }
    </style>
@endpush
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Todo list </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Apps</a></li>
                <li class="breadcrumb-item active" aria-current="page">Todo list</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card px-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <h4 class="card-title">Todo list</h4>
                        </div>
                        <div class="col-12 col-md-8 d-flex justify-content-end">
                            <ul class="list-item">
                                <li class="list-inline-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input v-model="selectedSort" @change="fetchTasks" type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="newest"> Newest <i class="input-helper"></i>
                                        </label>
                                    </div>
                                </li>
                                <li class="list-inline-item mr-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input v-model="selectedSort" @change="fetchTasks" type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="oldest"> Oldest <i class="input-helper"></i></label>
                                    </div>
                                </li>

                                <li class="list-inline-item">|</li>

                                <li class="list-inline-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input v-model="selectedComplete" @change="fetchTasks" type="radio" class="form-check-input" name="completedRadios" id="membershipRadios3" value="completed"> Completed <i class="input-helper"></i>
                                        </label>
                                    </div>
                                </li>
                                <li class="list-inline-item mr-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input v-model="selectedComplete" @change="fetchTasks" type="radio" class="form-check-input" name="completedRadios" id="membershipRadios4" value="incomplete"> Incomplete <i class="input-helper"></i></label>
                                    </div>
                                </li>
                                <li class="list-inline-item">|</li>
                                <li class="list-inline-item">
                                    <div class="form-check form-check-inline form-check-primary">
                                        <label class="form-check-label">
                                            <input v-model="selectedComplete" @change="fetchTasks" type="radio" class="form-check-input" name="completedRadios" id="membershipRadios5" value="all"> All <i class="input-helper"></i></label>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="add-items d-flex">
                        <input @keyup.enter="saveTask"
                               v-model="task" type="text"
                               class="form-control todo-list-input"
                               placeholder="What do you need to do today or tomorrow?"
                        >
                        <button @click="saveTask" class="add btn btn-lg bg-primary font-weight-bold todo-list-add-btn text-white" id="add-task">Add</button>
                    </div>
                    <div v-if="loading" class="dot-opacity-loader">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div v-cloak class="list-wrapper">
                        <ul v-for="(task, index) in tasks" class="d-flex flex-column-reverse todo-list">
                            <li :class="task.completed ? 'completed': ''" class="d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input @click="updateTask(task.id, index)" :checked="task.completed" @click="completeNow" class="checkbox" type="checkbox"> @{{ task.title }} <i class="input-helper"></i>
                                    </label>
                                </div>
                                <div>
                                    <i @click="editTask(task, index)" class="action-icon mdi mdi-lead-pencil" :class="task.completed ? 'text-primary':''"></i>
                                    <i @click="deleteTask(task.id)" class="action-icon remove mdi mdi-close-circle-outline" :class="task.completed ? 'text-primary':''"></i>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div ref="taskModal" class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="goalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="goalModalLabel">Edit Task</h5>
                    <button @click="onModalClosed" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Task name:</label>
                        <input ref="taskTitleInput" type="text" @keyup.enter="updateTaskTitle" v-model="task_edit.title" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-rounded" data-bs-dismiss="modal">Close</button>
                    <button @click="updateTaskTitle" type="button" class="btn btn-primary btn-rounded">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        new Vue({
            el: '#app',
            data: {
                loading: true,
                tasks: [],
                task: '',
                task_edit: {
                    id: '',
                    title: '',
                    index: ''
                },
                sort: {
                    completed: true,
                    all: true
                },
                selectedSort: 'newest',
                selectedComplete: 'all'
            },
            mounted() {
                this.fetchTasks();
            },
            computed: {
                sortTest() {
                    return {
                        newest: this.selectedSort === "newest",
                        oldest: this.selectedSort === "oldest",
                        completed: this.selectedComplete === "completed",
                        incomplete: this.selectedComplete === "incomplete",
                        all: this.selectedComplete === "all",
                    };
                },
            },
            methods: {
                async fetchTasks() {
                    try {
                        let attributes = {
                            filter: this.sortTest
                        };

                        const response = await axios.get('/tasks?', {params: attributes});
                        this.tasks = response.data;
                        this.loading = false;
                    } catch (error) {
                        // Handle errors here
                        console.error('Error:', error);
                    }
                },
                editTask (task, index) {
                    this.task_edit.id = task.id;
                    this.task_edit.index = index;
                    this.task_edit.title = task.title;

                    $(this.$refs.taskModal).modal('show');

                    setTimeout(() => {
                        this.$refs.taskTitleInput.focus();
                    }, 1000);
                },
                onModalClosed() {
                    this.task_edit = {
                        id: '',
                        title: '',
                        index: ''
                    }
                },
                saveTask() {
                    let attributes = {
                        title: this.task
                    }

                    axios.post('/tasks', attributes).then( (response) => {
                        this.tasks.unshift({...response.data});
                        this.task = '';
                    }).catch(function(error) {
                        // Handle errors here
                        console.error('Error:', error);
                    })
                },
                async updateTaskTitle () {
                    const task = this.tasks[this.task_edit.index];
                    task.title = this.task_edit.title;

                    let attributes = {
                        title: this.task_edit.title
                    }

                    try {
                        await axios.put(`/tasks/${this.task_edit.id}`, attributes);
                        $(this.$refs.taskModal).modal('hide');
                    } catch (error) {
                        console.error('Error:', error);
                    }
                },
                async updateTask(id, index) {
                    const task = this.tasks[index];
                    task.completed = !task.completed;

                    let attributes = {
                        completed: task.completed
                    }

                    try {
                        const response = await axios.put(`/tasks/${id}`, attributes);
                        console.log('Response:', response.data);
                    } catch (error) {
                        console.error('Error:', error);
                    }
                },
                async deleteTask(id) {
                    try {
                        const userConfirmed = window.confirm('Are you sure you want to delete this task?');
                        if (!userConfirmed) { return; }

                        const response = await axios.delete(`/tasks/${id}`);
                        this.tasks = this.tasks.filter((task) => {
                            return task.id !== id;
                        });

                        console.log('res: ', response.data);
                    } catch (error) {
                        console.error('Error:', error);
                    }
                }
            }
        });
    </script>
@endpush
