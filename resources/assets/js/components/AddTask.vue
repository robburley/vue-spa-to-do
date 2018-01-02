<template>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add Task
                    <button class="btn btn-info btn-xs pull-right" v-text="buttonText" @click="togglePanel"></button>
                </div>
                <div class="panel-body" v-show="showPanel">
                    <form @submit.prevent="onSubmit">

                        <div class="form-group" v-bind:class="{ 'has-error': form.errors.get('title') }">
                            <label class="form-label">Title</label>

                            <input type="text" name="title" class="form-control" v-model="form.title"/>

                            <span class="text-danger" v-if="form.errors.get('title')"
                                  v-text="form.errors.get('title')"></span>
                        </div>

                        <div class="form-group" v-bind:class="{ 'has-error': form.errors.get('content') }">
                            <label class="form-label">Content</label>

                            <textarea name="content" cols="30" rows="10" class="form-control"
                                      v-model="form.content"></textarea>

                            <span class="text-danger" v-if="form.errors.get('content')"
                                  v-text="form.errors.get('content')"></span>
                        </div>

                        <div class="form-group" v-bind:class="{ 'has-error': form.errors.get('priority') }">
                            <label class="form-label">Priority</label>

                            <select name="priority" class="form-control" v-model="form.priority">
                                <option value="3">Low</option>
                                <option value="2">Medium</option>
                                <option value="1">High</option>
                            </select>

                            <span class="text-danger" v-if="form.errors.get('priority')"
                                  v-text="form.errors.get('priority')"></span>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success pull-right">Add</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    title: '',
                    content: '',
                    priority: 3
                }),
                showPanel: false,
            }
        },

        computed: {
            buttonText(){
                return this.showPanel
                    ? 'Hide'
                    : 'Show';
            }
        },

        methods: {
            onSubmit() {
                this.form.post('/tasks').then(task => this.$emit('added', task));
            },
            togglePanel() {
                this.showPanel = !this.showPanel;
            }
        }
    }
</script>
