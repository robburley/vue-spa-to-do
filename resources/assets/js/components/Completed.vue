<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row" v-for="task in orderTasks">
                    <div class="col-md-12">
                        <div class="panel" v-bind:class="task.priority_class" v-on:click="toggleActive(task)">
                            <div class="panel-heading">

                                <span>
                                    {{ task.title }}
                                    <small> by {{ task.user.name }}</small>
                                </span>

                                <span class="pull-right">
                                    Created: {{ task.created_at | ago }} | Completed: {{ task.completed_at | dateFormat }}
                                </span>

                            </div>
                            <div class="panel-body" v-bind:class="{ hidden: !task.showDiv }">
                                <p>
                                    {{ task.content }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {

        data() {
            return {
                tasks: [],
                classes: {
                    3: 'panel-info',
                    2: 'panel-warning',
                    1: 'panel-danger',
                },
                filters: {}
            }
        },

        created() {
            axios.get('/tasks/complete')
                .then(({data}) => this.tasks = data);

            Event.$on('completed', (task) => this.AddTaskToList(task));
        },

        computed: {
            orderTasks() {
                let self = this;

                let tasks = _.forEach(this.tasks, function (task) {
                    Vue.set(task, 'priority_class', self.priorityClass(task.priority));
                });

                return _.reverse(_.sortBy(tasks, ['completed_at']));
            },
        },

        filters: {
            ago(date) {
                return moment(date).fromNow();
            },
            dateFormat(date) {
                return moment(date).format('D/M/Y H:m')
            }
        },

        methods: {

            toggleActive(task) {
                return Vue.set(task, 'showDiv', !task.showDiv);
            },

            AddTaskToList(task) {
                this.tasks.push(task);
            },

            priorityClass(priority){
                return this.classes[priority];
            },
        }
    }
</script>
