@extends('layouts.master')
@push('css')
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <style>
        /* Summernote Additional CSS */
        .note-editable{
            background: #fff;
        }
        .note-btn.dropdown-toggle:after {
            content: none;
        }
        .note-btn[aria-label="Help"]{
            display: none;
        }

        .note-editor .note-toolbar .note-color-all .note-dropdown-menu, .note-popover .popover-content .note-color-all .note-dropdown-menu{
            min-width: 185px;
        }
        /* Customize Summernote editor */
        .note-editor {
            /* Your custom styles here */
        }

        .note-editable {
            /* Your custom styles here */
        }

        /* Toolbar customization */
        .note-toolbar {
            /* Your custom styles here */
        }

        /* Buttons customization */
        .note-btn {
            /* Your custom styles here */
        }
    </style>
@endpush
@section('content')
<div class="page-header flex-wrap">
    <div class="header-left">
        <h5 class="m-0 pr-3">AI Instructions</h5>
        <p class="m-0">Here are the AI instructions for generating motivations and inspirations.</p>
    </div>
    <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
        <div class="d-flex align-items-center">
            <a href="#">
                <p class="m-0 pe-3">AI Instruct</p>
            </a>
            <a class="ps-3 me-4" href="#">
                <p class="m-0">ADE-00234</p>
            </a>
        </div>
        <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
            <i class="mdi mdi-plus-circle"></i> Add  </button>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="d-none card-title">AI Instructions</h4>
                <p class="card-description">Please give detailed instructions to AI for better generated response results</p>
                <form class="forms-sample">
                    <div class="form-group">
                        <label>Coach or Professional Name:</label>
                        <input ref="coach" v-model="instruct.coach_name" type="text" class="form-control form-control-lg" placeholder="Coach" aria-label="Coach">
                    </div>

                    <div class="form-group">
                        <label>Topic</label>
                        <input v-model="instruct.topic" type="text" class="form-control form-control-lg" placeholder="Topic" aria-label="Topic">
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Format</label>
                        <textarea class="d-none form-control zero-margin-textarea" id="exampleTextarea1" rows="15"></textarea>
                        <div class="d-none" id="summernote"></div>
                    </div>

                    <button @click="saveAiInstruction" type="button" class="btn btn-primary me-2"> Submit </button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- first row starts here -->
<div class="row d-none">
    <div class="col-xl-9 stretch-card grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between flex-wrap">
                    <div>
                        <div class="card-title mb-0">Sales Revenue</div>
                        <h3 class="font-weight-bold mb-0">$32,409</h3>
                    </div>
                    <div>
                        <div class="d-flex flex-wrap pt-2 justify-content-between sales-header-right">
                            <div class="d-flex me-5">
                                <button type="button" class="btn btn-social-icon btn-outline-sales">
                                    <i class="mdi mdi-inbox-arrow-down"></i>
                                </button>
                                <div class="ps-2">
                                    <h4 class="mb-0 font-weight-semibold head-count"> $8,217 </h4>
                                    <span class="font-10 font-weight-semibold text-muted">TOTAL SALES</span>
                                </div>
                            </div>
                            <div class="d-flex me-3 mt-2 mt-sm-0">
                                <button type="button" class="btn btn-social-icon btn-outline-sales profit">
                                    <i class="mdi mdi-cash text-info"></i>
                                </button>
                                <div class="ps-2">
                                    <h4 class="mb-0 font-weight-semibold head-count"> 2,804 </h4>
                                    <span class="font-10 font-weight-semibold text-muted">TOTAL PROFIT</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-muted font-13 mt-2 mt-sm-0"> Your sales monitoring dashboard template. <a class="text-muted font-13" href="#"><u>Learn more</u></a>
                </p>
                <div class="flot-chart-wrapper">
                    <div id="flotChart" class="flot-chart">
                        <canvas class="flot-base"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 stretch-card grid-margin">
        <div class="card card-img">
            <div class="card-body d-flex align-items-center">
                <div class="text-white">
                    <h1 class="font-20 font-weight-semibold mb-0"> Get premium </h1>
                    <h1 class="font-20 font-weight-semibold">account!</h1>
                    <p>to optimize your selling prodcut</p>
                    <p class="font-10 font-weight-semibold"> Enjoy the advantage of premium. </p>
                    <button class="btn bg-white font-12">Get Premium</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- image card row starts here -->
<div class="row d-none">
    <div class="col-sm-4 stretch-card grid-margin">
        <div class="card">
            <div class="card-body p-0">
                <img class="img-fluid w-100" src="{{asset('theme/assets/images/dashboard/img_1.jpg')}}" alt="" />
            </div>
            <div class="card-body px-3 text-dark">
                <div class="d-flex justify-content-between">
                    <p class="text-muted font-13 mb-0">ENTIRE APARTMENT</p>
                    <i class="mdi mdi-heart-outline"></i>
                </div>
                <h5 class="font-weight-semibold"> Cosy Studio flat in London </h5>
                <div class="d-flex justify-content-between font-weight-semibold">
                    <p class="mb-0">
                        <i class="mdi mdi-star star-color pe-1"></i>4.60 (35)
                    </p>
                    <p class="mb-0">$5,267/night</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 stretch-card grid-margin">
        <div class="card">
            <div class="card-body p-0">
                <img class="img-fluid w-100" src="{{asset('theme/assets/images/dashboard/img_2.jpg')}}" alt="" />
            </div>
            <div class="card-body px-3 text-dark">
                <div class="d-flex justify-content-between">
                    <p class="text-muted font-13 mb-0">ENTIRE APARTMENT</p>
                    <i class="mdi mdi-heart-outline"></i>
                </div>
                <h5 class="font-weight-semibold"> Victoria Bedsit Studio Ensuite </h5>
                <div class="d-flex justify-content-between font-weight-semibold">
                    <p class="mb-0">
                        <i class="mdi mdi-star star-color pe-1"></i>4.83 (12)
                    </p>
                    <p class="mb-0">$6,144/night</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 stretch-card grid-margin">
        <div class="card">
            <div class="card-body p-0">
                <img class="img-fluid w-100" src="{{asset('theme/assets/images/dashboard/img_3.jpg')}}" alt="" />
            </div>
            <div class="card-body px-3 text-dark">
                <div class="d-flex justify-content-between">
                    <p class="text-muted font-13 mb-0">ENTIRE APARTMENT</p>
                    <i class="mdi mdi-heart-outline"></i>
                </div>
                <h5 class="font-weight-semibold">Fabulous Huge Room</h5>
                <div class="d-flex justify-content-between font-weight-semibold">
                    <p class="mb-0">
                        <i class="mdi mdi-star star-color pe-1"></i>3.83 (15)
                    </p>
                    <p class="mb-0">$5,267/night</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- last row starts here -->
<div class="row">
    <div class="col-sm-12 col-md-12 col-xl-12 stretch-card grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="card-title mb-2">
                    <div class="row">
                        <div class="col-6">
                            Upcoming AI Instructions List (@{{ instructions.length }})
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="toggleSwitch" v-model="isChecked">
                                <label class="form-check-label" for="toggleSwitch">Send random</label>
                            </div>
                        </div>
                    </div>
                </div>


                <div v-for="(instruction, index) in instructions" class="d-flex border-bottom py-3" :class="index < 1 ? 'border-top' : ''">
                    <div class="form-check"><i class="mdi mdi-clock menu-icon"></i></div>
                    <div class="ps-2 flex-grow-1">
                        <span class="font-12 text-muted" v-text="instruction.created_at"></span>
                        <p class="m-0 text-black" v-html="instruction.instruction"></p>
                    </div>
                    <div class="ps-2">
                        <button class="btn btn-danger btn-sm" @click="deleteInstruction(instruction.id)">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <!-- Bootstrap JS -->
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                loading: true,
                edit: false,
                instructions:[],
                instruct: {
                    coach_name:'',
                    topic:'',
                    instruction:''
                },
                isChecked: false
            },
            watch: {
                isChecked() {
                    this.updateSwitchState();
                }
            },
            mounted() {
                this.$refs.coach.focus();
            },
            created() {
                try {
                    axios.get('/admin/ai-instructions').then((response) => {
                        this.instructions = response.data;
                        this.loading = false;
                    });
                } catch (error) {
                    console.error('Error:', error);
                }
            },
            methods: {
                updateSwitchState() {
                    axios.post('/motivation-randomizer', { isChecked: this.isChecked })
                      .then(response => {
                          console.log('resp: ', response);
                      })
                      .catch(error => {
                        console.log('error: ', error);
                      });
                },
                initSummernote() {
                    $('#summernote').summernote({
                        placeholder: 'Instructions...',
                        tabsize: 2,
                        height: 400
                    });
                },
                formattedInstruction(instruction) {
                    if (Array.isArray(instruction)) {
                        console.log('array: ')
                        return instruction.map(line => line.replace(/\n/g, '<br>')).join('<br>');
                    } else {
                        return instruction;
                    }
                },
                saveAiInstruction() {
                    let attributes = {
                        coach_name: this.instruct.coach_name,
                        topic: this.instruct.topic,
                        instruction: `Compose a motivational short email 200-300 words about a given [TOPIC] by [MOTIVATIONAL SPEAKER]: TOPIC = ${this.instruct?.topic}, MOTIVATIONAL SPEAKER = ${this.instruct?.coach_name}.`
                    }

                    axios.post('/admin/ai-instructions', attributes).then( (response) => {

                        this.instructions.unshift({...response.data});
                        this.instruction = '';
                        this.$refs.instructInput.focus();
                    }).catch(function(error) {
                        // Handle errors here
                        console.error('Error:', error);
                    })
                },
                deleteInstruction(id) {
                    try {
                        const userConfirmed = window.confirm('Are you sure you want to delete this instruction?');
                        if (!userConfirmed) { return; }

                        axios.delete(`/admin/ai-instructions/${id}`).then(() => {

                            this.instructions = this.instructions.filter((instruct) => {
                                return instruct.id !== id;
                            });
                        });
                    } catch (error) {
                        console.error('Error:', error);
                    }
                }
            }
        });
    </script>
@endpush
