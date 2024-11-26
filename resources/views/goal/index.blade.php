@extends('layouts.master')
@push('css')
@endpush
@section('content')
    <div class="page-header flex-wrap">
        <div class="header-left">
            <h3 class="page-title"> Goals </h3>
        </div>
        <div class="header-right d-flex flex-wrap mt-md-2 mt-lg-0">
            <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" data-bs-toggle="modal" data-bs-target="#goalModal">
                <i class="mdi mdi-plus-circle"></i> Add goal
            </button>
        </div>
    </div>
    <div class="d-none page-header">
        <h3 class="page-title"> Goals </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Apps</a></li>
                <li class="breadcrumb-item active" aria-current="page">Goals</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Be the best version of your own self</h4>
                    <p class="card-description">Your goal list</p>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Progress</th>
                                <th>Deadline</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-cloak v-for="goal in goals">
                                <td v-text="goal.title"></td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" :style="'width:'+ goal.progress +'%'" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" v-text="goal.progress + '%'"></div>
                                    </div>
                                </td>
                                <td v-text="goal.target_date"></td>
                                <td>
                                    <div class="form-group">
                                        <button @click="deleteGoal(goal.id)" type="button" class="btn btn-danger btn-rounded btn-sm">
                                            <i style="font-size: 15px!important;" class="mdi mdi-delete"></i>
                                        </button>
                                        <button @click="showModal(goal)" type="button" class="btn btn-primary btn-rounded btn-sm">
                                            <i style="font-size: 15px!important;" class="mdi mdi-border-color"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div v-if="loading" class="dot-opacity-loader">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div ref="goalModal" class="modal fade" id="goalModal" tabindex="-1" role="dialog" aria-labelledby="goalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="goalModalLabel">@{{ edit ? 'Update Goal':'New Goal' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" v-model="goal.title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" v-model="goal.description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="target_date">Target Date:</label>
                        <input type="date" name="target_date" id="target_date" v-model="goal.target_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="progress">Progress:</label>
                        <input type="number" name="progress" id="progress" v-model="goal.progress" class="form-control" min="0" max="100">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-rounded" data-bs-dismiss="modal">Close</button>

                    <button v-if="!edit" type="button" @click="saveGoal" class="btn btn-primary btn-rounded">Save Goal</button>
                    <button v-else type="button" @click="updateGoal(goal.id)" class="btn btn-primary btn-rounded">Update Goal</button>
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
                edit: false,
                goals:[],
                goal: {
                    title: '',
                    description: '',
                    target_date: '',
                    progress: ''
                }
            },
            mounted() {
                this.fetchGoals();
            },
            methods: {
                async fetchGoals() {
                    try {
                        const response = await axios.get('/goals');
                        this.goals = response.data;
                        this.loading = false;
                    } catch (error) {
                        console.error('Error:', error);
                    }
                },
                saveGoal() {
                    let attributes = {
                        title: this.goal.title,
                        description: this.goal.description,
                        target_date: this.goal.target_date,
                        progress: this.goal.progress,
                    }

                    axios.post('/goals', attributes).then( (response) => {
                        console.log('response: ', response);

                        this.goals.push({...response.data});
                        this.hideModal();
                    }).catch(function(error) {
                        // Handle errors here
                        console.error('Error:', error);
                    })
                },
                updateGoal(id) {
                    let attributes = {
                        title: this.goal.title,
                        description: this.goal.description,
                        target_date: this.goal.target_date,
                        progress: this.goal.progress,
                    }

                    axios.put(`/goals/${id}`, attributes).then( (response) => {
                        console.log('response: ', response);

                        this.hideModal();
                    }).catch(function(error) {
                        // Handle errors here
                        console.error('Error:', error);
                    })
                },
                deleteGoal(id) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {

                            axios.delete(`/goals/${id}`).then( (res) => {
                                Swal.fire(
                                    'Deleted!',
                                    'Your goal has been deleted.',
                                    'success'
                                )

                                this.goals = this.goals.filter((goal) => {
                                    return goal.id !== id;
                                });
                            }).catch(function(error) {
                                // Handle errors here
                                console.error('Error:', error);
                            });
                        }
                    })
                },
                hideModal() {
                    this.goal = '';
                    this.edit = false;
                    $(this.$refs.goalModal).modal('hide');
                },
                showModal(goal) {
                    this.edit = true;
                    this.goal = goal;

                    $(this.$refs.goalModal).modal('show');
                }
            }
        });
    </script>
@endpush
