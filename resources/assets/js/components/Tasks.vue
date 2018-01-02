<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <add-task @added="AddTaskToList"></add-task>

                <div class="row" v-for="task in orderTasks">
                    <div class="col-md-12">
                        <div class="panel" v-bind:class="task.priority_class">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-1">
                                        <complete-task v-bind:task="task"></complete-task>
                                    </div>
                                    <div class="col-xs-11" v-on:click="toggleActive(task)">
                                        <span>
                                            {{ task.title }}
                                            <small> by {{ task.user.name }}</small>
                                        </span>

                                        <span class="pull-right">
                                            {{ task.created_at | ago }}
                                        </span>
                                    </div>
                                </div>
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

            <filter-tasks></filter-tasks>

        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    import AddTask from './AddTask';
    import FilterTasks from './FilterTasks';
    import CompleteTask from './CompleteTask';

    export default {
        components: {
            AddTask,
            FilterTasks,
            CompleteTask,
        },

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

            axios.get('/tasks/incomplete')
                .then(({data}) => this.tasks = data);

            Event.$on('filtered', (filters) => this.addFilters(filters));

            Event.$on('completed', (task) => this.removeTask(task));
        },

        filters: {
            ago(date) {
                return moment(date).fromNow();
            },
        },

        computed: {
            orderTasks() {
                let self = this;

                let tasks = _.forEach(this.tasks, function (task) {
                    Vue.set(task, 'priority_class', self.priorityClass(task.priority));
                });

                _.forEach(this.filters, function (value, col) {
                    if (value != 0) {
                        tasks = _.filter(tasks, [col, parseInt(value)]);
                    }
                });


                return _.sortBy(tasks, ['priority', 'created_at']);
            },
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

            addFilters(filters) {
                return this.filters = filters;
            },
            removeTask(task) {
                this.tasks = this.tasks.filter(function (item) {
                    return task.id !== item.id;
                });
            }
        }
    }
</script>
