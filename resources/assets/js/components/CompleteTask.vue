<template>
    <button class="btn btn-xs btn-success"  style="margin-right: 10px;" v-on:click="complete" >
        <i class="glyphicon glyphicon-ok"></i>
    </button>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    id: this.task.id,
                }),
            }
        },
        props: [
          'task'
        ],
        methods: {
            complete() {
                this.form.post('/tasks/' + this.task.id + '/complete').then(task => Event.$emit('completed', task));
            }
        }
    }
</script>
