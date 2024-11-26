@extends('layouts.master')
@push('css')
    <style>
        .chat {
            margin-top: 5rem;
            margin-bottom: 3rem;
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            /*text-align: var(--bs-body-text-align);*/
            font-family: "Nunito", sans-serif;
            font-size: 1rem;
            color: #161c2d;
            box-sizing: border-box;
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            height: var(--bs-card-height);
            word-wrap: break-word;
            background-clip: initial;
            border: 0 !important;
            margin-top: 1.5rem !important;
            background-color: #fff;
            box-shadow: 0 0 3px rgba(60, 72, 88, 0.15) !important;
            border-radius: 6px !important;
        }
        .chat .top {
            display: block;
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            /*text-align: var(--bs-body-text-align);*/
            font-family: "Nunito", sans-serif;
            font-size: 1rem;
            color: #161c2d;
            word-wrap: break-word;
            box-sizing: border-box;
            border-bottom: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color) !important;
            justify-content: space-between !important;
            padding: 1.5rem !important;
        }
        .chat .top img {
            display: inline-block;
            border: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color) !important;
            border-radius: 50% !important;
            box-shadow: 0 0 3px rgba(60, 72, 88, 0.15) !important;
        }
        .chat .top div {
            display: inline-block;
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            /*text-align: var(--bs-body-text-align);*/
            font-family: "Nunito", sans-serif;
            font-size: 1rem;
            color: #161c2d;
            word-wrap: break-word;
            box-sizing: border-box;
            overflow: hidden !important;
            margin-left: 1rem !important;
        }
        .chat .top div p {
            display: block;
            /*text-align: var(--bs-body-text-align);*/
            word-wrap: break-word;
            box-sizing: border-box;
            text-decoration: none !important;
            transition: all 0.5s ease;
            font-size: 1rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #3c4858 !important;
            font-family: var(--bs-font-sans-serif);
            line-height: 1.4;
            font-weight: 600;
        }
        .chat .top div small, .chat .top div .small {
            display: block;
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            /*text-align: var(--bs-body-text-align);*/
            font-family: "Nunito", sans-serif;
            word-wrap: break-word;
            box-sizing: border-box;
            font-size: 0.875em;
            color: #6c757d !important;
        }
        .chat .messages {
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            /*text-align: var(--bs-body-text-align);*/
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            font-family: "Nunito", sans-serif;
            font-size: 1rem;
            color: #161c2d;
            word-wrap: break-word;
            box-sizing: border-box;
            list-style: none;
            margin-bottom: 0 !important;
            padding: 1rem !important;
        }
        .chat .messages .left {
            text-align: left;
        }
        .chat .messages .right {
            text-align: right;
        }
        .chat .messages .message {
            margin-bottom: 1rem;
        }
        .chat .messages .message p {
            display: inline-flex;
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            /*text-align: var(--bs-body-text-align);*/
            font-family: "Nunito", sans-serif;
            word-wrap: break-word;
            list-style: none;
            box-sizing: border-box;
            font-size: 0.875em;
            margin: 0.25rem;
            padding: 0.5rem 1rem !important;
            color: #6c757d !important;
            background-color: rgba(var(--bs-light-rgb), 1) !important;
            border-radius: var(--bs-border-radius) !important;
        }
        .chat .messages .message img {
            display: inline-flex;
            margin: 0.25rem;
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            /*text-align: var(--bs-body-text-align);*/
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            font-family: "Nunito", sans-serif;
            font-size: 1rem;
            color: #161c2d;
            word-wrap: break-word;
            box-sizing: border-box;
            vertical-align: middle;
            border: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color) !important;
            border-radius: 50% !important;
            box-shadow: 0 0 3px rgba(60, 72, 88, 0.15) !important;
            height: 48px;
            width: 48px;
        }
        .chat .bottom {
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            /*text-align: var(--bs-body-text-align);*/
            font-family: "Nunito", sans-serif;
            font-size: 1rem;
            color: #161c2d;
            word-wrap: break-word;
            box-sizing: border-box;
            padding: 1rem 0 !important;
            border-top: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color) !important;
        }
        .chat .bottom input {
            float: left;
            display: inline-flex;
            word-wrap: break-word;
            box-sizing: border-box;
            width: 75%;
            padding: 0.375rem 0.75rem;
            font-weight: 400;
            background-color: #fff;
            background-clip: padding-box;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            border: 1px solid #e9ecef;
            font-size: 14px;
            line-height: 26px;
            border-radius: 6px;
            color: #3c4858 !important;
        }
        .chat .bottom button {
            float: right;
            display: inline-flex;
            text-align: center;
            cursor: pointer;
            border: 1px solid #484848;
            border-radius: 5px;
            margin: 3px;
            width: 2.35rem;
            height: 2.35rem;
            background: url("https://assets.edlin.app/icons/font-awesome/paper-plane/paper-plane-regular.svg") center no-repeat;
        }

        .spinme-left {
            display: inline-block;
            padding: 15px 20px;
            font-size: 14px;
            color: #ccc;
            border-radius: 30px;
            line-height: 1.25em;
            font-weight: 100;
            opacity: 0.2;
        }
        .spinner {
            margin: 0;
            width: 40px;
            text-align: center;
        }

        .spinner > div {
            width: 10px;
            height: 10px;
            border-radius: 100%;
            display: inline-block;
            -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
            animation: sk-bouncedelay 1.4s infinite ease-in-out both;
            background: rgba(0,0,0,1);
        }

        .spinner .bounce1 {
            -webkit-animation-delay: -0.32s;
            animation-delay: -0.32s;
        }

        .spinner .bounce2 {
            -webkit-animation-delay: -0.16s;
            animation-delay: -0.16s;
        }

        @-webkit-keyframes sk-bouncedelay {
            0%,
            80%,
            100% {
                -webkit-transform: scale(0)
            }
            40% {
                -webkit-transform: scale(1.0)
            }
        }

        @keyframes sk-bouncedelay {
            0%,
            80%,
            100% {
                -webkit-transform: scale(0);
                transform: scale(0);
            }
            40% {
                -webkit-transform: scale(1.0);
                transform: scale(1.0);
            }
        }
    </style>
@endpush
@section('content')
    <div class="row mt-4">
        <div class="chat">
            <!-- Chat -->
            <div class="messages">
                <div class="left message">
                    <img style="height: 24px!important; width: 24px!important;" src="{{ asset('chatgpt.svg') }}" alt="ChatGPT Logo">
                    <p>Start chatting with Chat GPT AI below!!</p>
                </div>

                <div v-for="(message, index) in messages" :key="index" :class="{ 'right message': message.isUser, 'left message': !message.isUser }">
                    <svg v-show="!message.isUser" width="24px" height="24px" viewBox="140 140 520 520"><path d="m617.24 354a126.36 126.36 0 0 0 -10.86-103.79 127.8 127.8 0 0 0 -137.65-61.32 126.36 126.36 0 0 0 -95.31-42.49 127.81 127.81 0 0 0 -121.92 88.49 126.4 126.4 0 0 0 -84.5 61.3 127.82 127.82 0 0 0 15.72 149.86 126.36 126.36 0 0 0 10.86 103.79 127.81 127.81 0 0 0 137.65 61.32 126.36 126.36 0 0 0 95.31 42.49 127.81 127.81 0 0 0 121.96-88.54 126.4 126.4 0 0 0 84.5-61.3 127.82 127.82 0 0 0 -15.76-149.81zm-190.66 266.49a94.79 94.79 0 0 1 -60.85-22c.77-.42 2.12-1.16 3-1.7l101-58.34a16.42 16.42 0 0 0 8.3-14.37v-142.39l42.69 24.65a1.52 1.52 0 0 1 .83 1.17v117.92a95.18 95.18 0 0 1 -94.97 95.06zm-204.24-87.23a94.74 94.74 0 0 1 -11.34-63.7c.75.45 2.06 1.25 3 1.79l101 58.34a16.44 16.44 0 0 0 16.59 0l123.31-71.2v49.3a1.53 1.53 0 0 1 -.61 1.31l-102.1 58.95a95.16 95.16 0 0 1 -129.85-34.79zm-26.57-220.49a94.71 94.71 0 0 1 49.48-41.68c0 .87-.05 2.41-.05 3.48v116.68a16.41 16.41 0 0 0 8.29 14.36l123.31 71.19-42.69 24.65a1.53 1.53 0 0 1 -1.44.13l-102.11-59a95.16 95.16 0 0 1 -34.79-129.81zm350.74 81.62-123.31-71.2 42.69-24.64a1.53 1.53 0 0 1 1.44-.13l102.11 58.95a95.08 95.08 0 0 1 -14.69 171.55c0-.88 0-2.42 0-3.49v-116.68a16.4 16.4 0 0 0 -8.24-14.36zm42.49-63.95c-.75-.46-2.06-1.25-3-1.79l-101-58.34a16.46 16.46 0 0 0 -16.59 0l-123.31 71.2v-49.3a1.53 1.53 0 0 1 .61-1.31l102.1-58.9a95.07 95.07 0 0 1 141.19 98.44zm-267.11 87.87-42.7-24.65a1.52 1.52 0 0 1 -.83-1.17v-117.92a95.07 95.07 0 0 1 155.9-73c-.77.42-2.11 1.16-3 1.7l-101 58.34a16.41 16.41 0 0 0 -8.3 14.36zm23.19-50 54.92-31.72 54.92 31.7v63.42l-54.92 31.7-54.92-31.7z" fill="#202123"></path></svg>

                    <div v-if="!message.isCode">
                        <p>@{{ message.content }}</p>
                    </div>
                    <div v-else>
                        <pre><code>@{{ message.content }}</code></pre>
                    </div>

                    <img v-show="message.isUser" src="https://assets.edlin.app/images/rossedlin/03/rossedlin-03-100.jpg" alt="Avatar">
                </div>
                <span v-show="isActive" class="spinme-left">
                   <div class="spinner">
                      <div class="bounce1"></div>
                      <div class="bounce2"></div>
                      <div class="bounce3"></div>
                   </div>
                </span>

            </div>
            <!-- End Chat -->

            <!-- Footer -->
            <div class="bottom">
                <div class="card-footer d-block">
                    <div class="d-flex">
                        <div class="input-group">
                            <input autofocus :disabled="isActive" ref="messageInput" v-model="prompt" id="message" type="text" class="form-control" placeholder="Type here" aria-label="Message example input">
                        </div>
                        <button :disabled="isActive" @click="chat" type="submit" class="btn bg-gradient-primary ms-2"></button>
                    </div>
                </div>
            </div>
            <!-- End Footer -->

        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                isActive: false,
                prompt:'',
                messages: []
            },
            mounted() {
                console.log('rendering vue components...');
            },
            methods: {
                chat() {
                    this.isActive = true;
                    this.$refs.messageInput.focus();

                    // Push the user's message to the messages array
                    this.messages.push({ isUser: true, content: this.prompt, isCode: false });

                    let attributes = {
                        model: 'gpt-3.5-turbo',
                        content: this.prompt
                    }

                    axios.post('/chat', attributes, {
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        }
                    })
                        .then( (response) => {
                            // Handle the response here
                            const {content, isCodeBlock } = response.data;
                            console.log('content: ', content);
                            console.log('isCode: ', isCodeBlock);

                            // Push GPT's response to the messages array
                            this.messages.push({ isUser: false, content: content, isCode: isCodeBlock });

                            //Cleanup
                            this.prompt = '';
                            $(document).scrollTop($(document).height());

                            this.isActive = false;
                            // Focus the input when it's active
                            this.$refs.messageInput.focus(); // Focus the input element
                        })
                        .catch(function(error) {
                            // Handle errors here
                            console.error('Error:', error);
                        });
                }
            }
        });
    </script>
@endpush
